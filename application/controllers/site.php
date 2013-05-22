<?php

if(!defined('BASEPATH')) exit ('no direct script access allowed');

/**
 * 
 */
class Site extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		//layout view[string], paramas[array], widgets[array], default[boolean]
		$this->layout->set_title('Home');
		$this->layout->set_description('Lorem ipsum dolor sit amet, consectetur adipisicing.');
		$this->layout->render('site/home.php',array(),array('novidades'=>'sidebar/novidades'));
	}
}
