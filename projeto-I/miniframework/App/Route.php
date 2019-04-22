<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);
		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'indexController',
			'action' => 'login'
		);
		$routes['cadastro'] = array(
			'route' => '/cadastro',
			'controller' => 'indexController',
			'action' => 'cadastro'
		);
		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
		);
		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);
		

		// rota para teste de cadastro de produtos 
		$routes['produtos'] = array(
			'route' => '/cadastroProduto',
			'controller' => 'indexController',
			'action' => 'cadastroProduto'
		);
		$routes['registrarProduto'] = array(
			'route' => '/registrarProduto',
			'controller' => 'indexController',
			'action' => 'registrarProduto'
		);
		$routes['listarProduto'] = array(
			'route' => '/listarProduto',
			'controller' => 'indexController',
			'action' => 'listarProduto'
		);

		$this->setRoutes($routes);
	}

}

?>