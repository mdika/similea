<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model("monev_beasiswa/monev_model");
	}
	
	public function index()
	{	
		if($this->is_user())
		{
			redirect('user/monev_beasiswa/hasil');
		}
	}
}