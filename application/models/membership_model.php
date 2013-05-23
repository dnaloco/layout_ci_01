<?php 

if(!defined('BASEPATH')) exit ('no direct script access allowed');

/**
 * 
 */
class Membership_model extends CI_Model {
	
	public function validate()
	{
	  $this->db->where('username', $this->input->post('username'));
	  $this->db->where('password', md5($this->input->post('password')));
	  $query = $this->db->get('membership');
	  
	  if(1 == $query->num_rows)
	  {
	  	return true;
	  }
	}
}
