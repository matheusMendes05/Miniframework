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

		// rotas para Produtos
		public function cadastroProduto(){
			$this->render('cadastroPoduto');
		}
		// metodo de cadastro de produto
		public function registrarProduto(){
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			$produto = Container::getModel('Produto');
			$produto->__set('nomeProduto',$_POST['descProduto']);
			$produto->__set('quantidadeProduto', $_POST['qtdProduto']);
			$produto->__set('valorProduto', $_POST['valorProduto']);

			if($produto->validarCadastroProduto()){
				$produto->salvar();
				$this->render('cadastroProdutoSucesso');
			}else{
				$this->render('cadastroPoduto');
			}

			
		}
		// metodo que lista o produto
		public function listarProduto(){

			$produto = Container::getModel('Produto');
			$this->render('listaProduto');
		
			
		}



			
		





}


?>