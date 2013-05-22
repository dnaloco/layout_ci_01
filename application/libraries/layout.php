<?php 

if(!defined('BASEPATH')) exit('no direct script access allowed');

class Layout
{
	private $CI;
	
	private $theme;

	private $title = '';
	 
	private $description = '';
	
	private $layouts = array();
	
	private $includes = array();
	
	private $menu = array();
	
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->set_theme($this->theme);
		$this->set_theme('default');
	}
	public function set_title($string)
	{
		$this->title = $string;
	}
	
	public function set_theme($theme) {
		$this->theme = $theme . '/';
	}
	
	public function get_theme() {
		return $this->theme;
	}
	
	public function set_description($string)
	{
		$this->description = $string;
	}
	
	public function set_menu($menu=array()) 
	{
		foreach($menu as $menu_anchor=>$menu_title) 
		{
			$this->menu[] = anchor($menu_anchor, $menu_title);
		}
	}
	
	public function get_menu() 
	{
		return $this->menu;
	}
	
	public function render($view_page, $params=array(), $widgets=array(), $default=TRUE)
	{
		$params['title_page'] = $this->title;
		$params['description_page'] = $this->description;
		$params['menu'] = $this->get_menu();
		
		if(is_array($widgets) && count($widgets) >= 1) 
		{
			foreach($widgets as $widget_key => $widget)
			{
				$view = $this->get_theme() . $widget;
				$params[$widget_key] = $this->CI->load->view($view, $params, true);
			}
		}

		if($default)
		{
			$this->CI->load->view($this->get_theme() . 'header', $params);
			$this->CI->load->view($this->get_theme() . 'nav', $params);
			$this->CI->load->view($this->get_theme() . $view_page, $params);
			$this->CI->load->view($this->get_theme() . 'footer', $params);
		}
		else 
		{
			$this->CI->load->view($this->get_theme() . $view_page, $params);
		}
	}
}
