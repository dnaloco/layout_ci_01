<?php 

if(!defined('BASEPATH')) exit ('no direct script access allowed');

/**
 * 
 */
class Artigos extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->layout->set_menu(
			array(
				'site' => 'Home',
				'site/sobre' => 'Sobre',
				'site/servicos' => 'Servicos',
				'artigos' => array (
					'Artigos',
					'artigos/Novidades' => 'Novidades',
					'artigos/Curiosidades' => 'Curiosidades',
					'artigos/Noticias' => 'Noticias'
				),
			
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
	
	public function index($value='')
	{
	  	$this->layout->set_title('Artigos');
		$this->layout->set_description('Página de Artigos.');
		
		$data = array(
			'nome' => 'Arthur Santos Costa',
			'idade' => '28 anos',
			'url_atual' => $this->uri->segment(1) . '/' . $this->uri->segment(2)
		);
		
		$this->layout->render('artigos/artigos.php',$data);
	}
}
