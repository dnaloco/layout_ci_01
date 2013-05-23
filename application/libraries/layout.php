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
	
	private $widgets = array();
	
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
	// Permite até dois níveis
	public function set_menu($menu=array()) 
	{
		foreach($menu as $menu_anchor => $menu_title) 
		{
			if (!is_array($menu_title)) 
			{
				$this->menu[] ='<li>' . anchor($menu_anchor, $menu_title) . '</li>';				
			} 
			else 
			{
				$this->menu[] = '<li>' . anchor($menu_anchor, $menu_title[0]);
				array_shift($menu_title);
				$this->menu[] = '<ul>';
				foreach($menu_title as $sec_menu_anchor => $sec_menu_title)
				{
					$this->menu[] = '<li>' . anchor($sec_menu_anchor, $sec_menu_title) . '</li>';
				}
				$this->menu[] = '</ul></li>';
			}	
		}
	}	
	
	public function set_widgets($widgets=array()) 
	{
		$this->widgets = $widgets;
	}
	
	public function render($view_page, $params=array())
	{
		$params['title_page'] = $this->title;
		$params['description_page'] = $this->description;
		$params['menu'] = $this->menu;
		
		if(is_array($this->widgets) && count($this->widgets) >= 1) 
		{
			foreach($this->widgets as $widget_key => $widget)
			{
				$view = $this->get_theme() . $widget;
				$params[$widget_key] = $this->CI->load->view($view, $params, true);
			}
		}

		$this->CI->load->view($this->get_theme() . 'header', $params);
		$this->CI->load->view($this->get_theme() . 'nav', $params);
		$this->CI->load->view($this->get_theme() . $view_page, $params);
		$this->CI->load->view($this->get_theme() . 'footer', $params);

	}
}
