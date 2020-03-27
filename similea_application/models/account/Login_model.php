<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
		
	function login_users($username, $password)
	{
		$this->db->where('username_users', $username);
		$this->db->where('password_users', md5($password));
		$query = $this->db->get('users');
		
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function login_admins($username, $password)
	{
		$this->db->where('username_admins', $username);
		$this->db->where('password_admins', md5($password));
		$query = $this->db->get('admins');
		
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}