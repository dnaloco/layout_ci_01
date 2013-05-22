<?php 

if(!defined('BASEPATH')) exit('no direct script access allowed');

/**
 * Class that will render the view
 * 
 * @version 1.0
 * @since 05/2013
 * @license GPL
 * @author Arthur Santos Costa
 * @package Application
 * @subpackage libraries
 *
 */

class Layout
{
	/**
	 * 
	 * CI get_instance() of Codeigniter
	 * @var private
	 * @see __construct()
	 */
	private $CI;
	
	private $theme = 'default';
	
	/**	 
	 * @var private
	 * @see set_title()
	 */
	private $title = '';
	 
	 /**
	  * @var private
	  * @see set_description()
	  */
	private $description = '';
	
	private $layouts = array();
	
	private $includes = array();
	
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->set_theme($this->theme);
	}
	public function set_title($string)
	{
		$this->title = $string;
	}
	
	public function set_theme($theme) {
		$this->theme = 'themes/' . $theme . '/';
	}
	
	public function get_theme() {
		return $this->theme;
	}
	
	public function set_description($string)
	{
		$this->description = $string;
	}

	public function render($view_page, $params=array(), $layouts=array(), $default=TRUE)
	{
		$params['title_page'] = $this->title;
		$params['description_page'] = $this->description;
		
		if(is_array($layouts) && count($layouts) >= 1) 
		{
			foreach($layouts as $layout_key => $layout)
			{
				$params[$layout_key] = $this->CI->load->view($layout, $params, true);
			}
		}
		
		if($default)
		{
			$this->CI->load->view($this->get_theme() . 'header', $params);
			$this->CI->load->view($this->get_theme() . 'nav', $params);
			echo "<div id='#main_content'>";
			$this->CI->load->view($this->get_theme() . $view_page, $params);
			echo "</div>";
			$this->CI->load->view($this->get_theme() . 'footer', $params);
		}
		else 
		{
			$this->CI->load->view($this->get_theme() . $view_page, $params);
		}
	}
}
