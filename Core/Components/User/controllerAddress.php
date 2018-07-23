<?php
namespace Core\Components\User;

use Core\Lib\BaseController;
use Core\Lib\Request;


/**
 * Управляет текущим пользователем и его возможностями
 *
 * - Блюдо
 */
class controllerAddress extends BaseController
{

  public $dataForm; // HTML код нашей формы
  public $view; // Экземпляр view
  public $model; // Экземпляр view

  function __construct(){
    $this->view = new viewAddress();
    $this->model = new modelAddress();
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


    function echoAddressForm (){
      $data = $this->model->getData();
      $this->view->buildAddressForm($data);
    }

    /*function update (){
      // тут меняется
      $data ['city_name'] = Request::get('city_name');
      $res =  $this->model->update ($data);
      if ($res['error'] == 0) {
        $this->model->saveUserToSession ($this->model->city_id, $data);
        $out['msg'] = 'Данные обновлены';
        $this->view->put ($out, 'content');
      }else {
        $out['error'] = 'Ошибка';
        $this->view->put ($out, 'content');

      }
      $data['id'] =$this->model->city_id;
      $this->view->buildCityForm($data);


    }*/


}
