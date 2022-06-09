<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');	
	}

	public function logon()
	{
		if($this->session->userdata('username') == '') {
			redirect(base_url('auth'));
		}
		/*else
		{
			$id = $this->session->userdata('id_user') ;
			$row = $this->M_user->detail($id);
			$level = $row->level ;
			if($level != 'User') {
				redirect(base_url('error404'));
			}
		}*/
	}
	
}
