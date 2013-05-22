<?php

if(!defined('BASEPATH')) exit ('no direct script access allowed');

/**
 * 
 */
class Site extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->layout->set_menu(
			array(
				'site' => 'Home',
				'site/teste' => 'Teste'
			)
		);
	}
	
	public function index()
	{
		//layout view[string], paramas[array], widgets[array], default[boolean]
		$this->layout->set_title('Home');
		$this->layout->set_description('Lorem ipsum dolor sit amet, consectetur adipisicing.');
		
		$data = array(
			'nome' => 'Arthur Santos Costa',
			'idade' => '28 anos'
		);
		
		$widgets = array (
			'novidades' => 'widget/novidades',
		);
		
		$this->layout->render('site/home.php',$data, $widgets);
	}
	
	public function teste()
	{
		$this->layout->set_title('Teste');
		$this->layout->render('site/teste.php');
	}
}
