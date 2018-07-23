<?php
namespace Core\Components\User;
use Core\Lib\BaseView;
use Core\Lib\Request;
use Core\Helper\Form;



class viewCity extends BaseView
{
  /**
   * Строит форму ввода города
   */

  function buildCityForm ($data){
  //    var_dump($data);
    $cityForm = new Form ('userCity');
    $cityForm->addFild('hidden', 'controller', '1' , '', 'City');
    $cityForm->addFild('hidden', 'do',  '2' , '', 'createCity');
    $cityForm->addFild('text', 'city_name','city_name' , 'Ваш город', $data['city_name']);
    $dataForm = $cityForm->getForm();
    $dataForm.= '<a href="' . $_SERVER['PHP_SELF'] . '?controller=City&do=doUpdateCity"> Изменить </a>';
    $this->put ($dataForm, 'content');
  }



}
