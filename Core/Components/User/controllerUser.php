<?php
namespace Core\Components\User;

use Core\Lib\BaseController;
use Core\Lib\Request;


/**
 * Управляет текущим пользователем и его возможностями
 *
 * - Блюдо
 */
class controllerUser extends BaseController
{

  public $dataForm; // HTML код нашей формы
  public $view; // Экземпляр view
  public $model; // Экземпляр view

  function __construct(){
    $this->view = new viewUser();
    $this->model = new modelUser();

    /**
     * Перехватываю передачу данных в контроллер
     */
    //var_dump (Request::$data);
//    echo 'start controller';
    if(       Request::get('controller') == 'User' &&
              Request::get('do') == 'loginUser' )
              {
                //echo 'start doLogin';
                $res = $this->model->doLogin (Request::get ('email'), Request::get('pswd')  );
              }
    if(       Request::get('controller') == 'User' &&
              Request::get('do') == 'logout' )
              {
              $res = $this->model->doLogout ();
              }





    if ($this->model->isLogin() )
      $this->view->buildWelcome ();
    else
      $this->view->buildForm ();
  }

  /**
   * Создаем пользователя
   */
   function create(){
     $data = Request::$data['_GET'];
     // Проверки полученных данных с формы
     $res = $this->model->create($data);
     $this->view->put ($res, 'content');
   }

   /**
    * Создаем пользователя
    */
    function echoRegisterForm(){
//      $data = Request::$data['_GET'];
//      // Проверки полученных данных с формы
//      $res = $this->model->create($data);
      $this->view->buildRegisterForm();
    }

    function echoEditForm (){
      $data = $this->model->getData();
      $this->view->buildEditForm($data);
    }

    function update (){
      $data ['nikname'] = Request::get('nikname');
      $data ['pswd'] = Request::get('pswd');
      $res =  $this->model->update ($data);
      if ($res['error'] == 0) {
        $this->model->saveUserToSession ($this->model->user_id, $data);
        $out['msg'] = 'Данные обновлены';
        $this->view->put ($out, 'content');
      }else {
        $out['error'] = 'Ошибка';
        $this->view->put ($out, 'content');

      }
      $data['id'] =$this->model->user_id;
      $this->view->buildEditForm($data);


    }


}
