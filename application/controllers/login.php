<?php

if(!defined('BASEPATH')) exit('no direct script access allowed.');

class Login extends CI_Controller
{

	public function validate_credentials()
	{
		$this->load->model('membership_model', 'membership');
		$query = $this->membership->validate();

		if($query) // if the user's credentials validated...
		{
			$data = array(
				'username' 		=> $this->input->post('username'),
				'is_logged_in' 	=> TRUE
			);
			
			$this->session->set_userdata($data);
			redirect($this->input->post('url_atual'));
		}
		else
		{
			$data['is_logged_in'] = FALSE;
			$this->session->set_userdata($data);
			redirect($this->input->post('url_atual'));
		}
	}
	
	public function deslogar()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('is_logged_in');
		redirect($this->input->post('url_atual'));
	}
}