<?php

if(!defined('BASEPATH')) exit ('no direct script access allowed');

/**
 * 
 */
class Admin extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->layout->set_menu(
			array(
				'site' => 'Home',
				'site/sobre' => 'Sobre',
				'site/servicos' => 'Servicos',
				'admin' => 'Admin',
				'site/contato' => 'Contato'
			)
		);
		
		$widgets = array (
			'novidades' => 'widget/novidades',
			'login'		=> 'widget/login',
		);
		
		$this->layout->set_widgets($widgets);
	}
	
	public function index()
	{
		$this->layout->set_title('Página Administrativa');
		$this->layout->set_description('Página RESTRITA');
		$data['url_atual'] = $this->uri->segment(1) . '/' . $this->uri->segment(2);	
	 	$this->layout->render('admin/admin.php', $data);
	}
}
