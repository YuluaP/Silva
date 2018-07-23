<?php
namespace Core\Components\User;
use Core\Lib\BaseView;
use Core\Lib\Request;
use Core\Helper\Form;



class viewAddress extends BaseView
{
  /**
   * Строит форму ввода города
   */

  function buildAddressForm ($data){
  //    var_dump($data);
    $addressForm = new Form ('userAddress');
    $addressForm->addFild('hidden', 'controller', '1' , '', 'Address');
    $addressForm->addFild('hidden', 'do',  '2' , '', 'createAddress');
    $addressForm->addFild('text', 'street','street' , 'Улица', $data['street']);
    $addressForm->addFild('text', 'house','house' , 'Дом', $data['house']);
    $addressForm->addFild('text', 'flat','flat' , 'Квартира', $data['flat']);
    $dataForm = $addressForm->getForm();
    $dataForm.= '<a href="' . $_SERVER['PHP_SELF'] . '?controller=Address&do=doUpdateAddress"> Изменить </a>';
    $this->put ($dataForm, 'content');
  }



}
