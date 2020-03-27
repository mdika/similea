<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {
	
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
	
	public function getAllUsers(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('username_users','asc');
		
		$query = $this->db->get();
		
		if($query->num_rows() != 0)
		{
			return $query->result();
			// return $query->result_array();
		}
		else
		{
			return false;
		}
    }
	
	public function getAllAdmins(){
		$this->db->select('*');
		$this->db->from('admins');
		$this->db->order_by('username_admins','asc');
		
		$query = $this->db->get();
		
		if($query->num_rows() != 0)
		{
			return $query->result();
			// return $query->result_array();
		}
		else
		{
			return false;
		}
    }
	
	public function getByIdUsers($username){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username_users',$username);
		$this->db->order_by('username_users','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	public function getByIdAdmins($username){
		$this->db->select('*');
		$this->db->from('admins');
		$this->db->where('username_admins',$username);
		$this->db->order_by('username_admins','asc');
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	function get_password_users($username)
	{
		$this->db->select('password_users');
		$this->db->from('users');
		$this->db->where('username_users', $username);
		
		return $this->db->get()->row()->password_users;		
	}
	
	function get_password_admins($username)
	{
		$this->db->select('password_admins');
		$this->db->from('admins');
		$this->db->where('username_admins', $username);
		
		return $this->db->get()->row()->password_admins;		
	}
	
	public function change_password_users($username, $oldpassword, $newpassword1, $newpassword2)
    {	
		$password = $this->get_password_users($username);
		$newpassword;
		
		if (md5($oldpassword) == $password && $newpassword1 == $newpassword2){			
			$username_users = $username;		
			$password_users = $newpassword1;
			
			$pw = array('password_users' => md5($password_users)); 
			
			$this->db->where('username_users', $username_users);
			$this->db->update('users', $pw);
			
			return true;
		} else {
			return false;
		}
    }
	
	public function change_password_admins($username, $oldpassword, $newpassword1, $newpassword2)
    {	
		$password = $this->get_password_admins($username);
		$newpassword;
		
		if (md5($oldpassword) == $password && $newpassword1 == $newpassword2){			
			$username_admins = $username;		
			$password_admins = $newpassword1;
			
			$pw = array('password_admins' => md5($password_admins)); 
			
			$this->db->where('username_admins', $username_admins);
			$this->db->update('admins', $pw);
			
			return true;
		} else {
			return false;
		}
    }
	
	public function reset_password_users($username)
    {	
		$username_users = $username;		
		$password_users = $username;
			
		$pw = array('password_users' => md5($password_users)); 
			
		$this->db->where('username_users', $username_users);
		$this->db->update('users', $pw);
    }
	
	public function reset_password_admins($username)
    {	
		$username_admins = $username;		
		$password_admins = $username;
			
		$pw = array('password_admins' => md5($password_admins)); 
			
		$this->db->where('username_admins', $username_admins);
		$this->db->update('admins', $pw);
    }
}