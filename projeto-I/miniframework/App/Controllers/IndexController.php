<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {
		$this->render('index');
	}
	public function login(){
		$this->render('login');
	}
	public function cadastro(){
		$this->render('registrar');
	}
	public function registrar(){	
		//teste ; debug
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		//receber dados do formulario
		$usuario = Container::getModel('Usuario');
		$usuario->__set('nome',$_POST['nome']);
		$usuario->__set('email',$_POST['email']);
		$usuario->__set('senha',$_POST['senha']);

		if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) ==0){	
				
			$usuario->salvar();
			$this->render('cadastro');

			}else{
				$this->render('registrar');
			}
		}





}


?>