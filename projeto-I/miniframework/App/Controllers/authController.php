<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

public function autenticar(){
    echo 'ocorreu  tudo bem';

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    $usuario = Container::getModel('Usuario');
    $usuario->__set('email', $_POST['email']);
    $usuario->__set('senha', $_POST['senha']);

    echo '<pre>';
    print_r($usuario);
    echo '</pre>';

    $retorno = $usuario->autenticar();
   
    echo '<pre>';
    print_r($usuario);
    echo '</pre>';
}


}


?>