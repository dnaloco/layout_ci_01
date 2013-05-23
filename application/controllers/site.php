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
	
	public function _remap($method)
	{
		if($method == 'test')
			echo "TESTE";
		else
			$this->$method();
	}
	
	public function index()
	{
		//layout view[string], paramas[array], widgets[array], default[boolean]
		$this->layout->set_title('Home');
		$this->layout->set_description('Página Principal.');
		
		$data = array(
			'nome' => 'Arthur Santos Costa',
			'idade' => '28 anos',
			'url_atual' => $this->uri->segment(1) . '/' . $this->uri->segment(2)
		);
		
		$this->layout->render('site/home.php',$data);
	}
	
	public function sobre()
	{
		$this->layout->set_title('Sobre Mim');
		$this->layout->set_description('Informações sobre a minha pessoa');
		$data['url_atual'] = $this->uri->segment(1) . '/' . $this->uri->segment(2);
	  	$this->layout->render('site/sobre.php', $data);
	}
	
	public function servicos()
	{
		$this->layout->set_title('Serviços');
		$this->layout->set_description('Informações sobre o meu trabalho');
		$data['url_atual'] = $this->uri->segment(1) . '/' . $this->uri->segment(2);
	  	$this->layout->render('site/servicos.php', $data);
	}
	
	public function contato()
	{
		$this->layout->set_title('Contato');
		$this->layout->set_description('Uma página para os usuários entrarem em contato comigo');
		$data['url_atual'] = $this->uri->segment(1) . '/' . $this->uri->segment(2);
	  	$this->layout->render('site/contato.php', $data);
	}	
}
