<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('M_auth');	

		

	}

	public function index()
	{
		$data = array (

						'css' => 'content/pengguna/css',
						'content' => 'content/pengguna/index',
						'script' => 'content/pengguna/script'

						) ;
		$this->load->view('login', $data);
	}

	public function authentifikasi ()
	{

        $username = $this->input->post('username') ;
        $password = $this->input->post('password') ;

		$login = $this->M_auth->login($username, $password);
		
	    if ($login == 1) {	

        	$row = $this->M_auth->data_login($username, $password);
        	$id_user = $row->id_user ;
        	$level = $row->level ;
			$cek_user_login = $this->M_auth->cek_user_login($id_user) ;
			if($cek_user_login > 0)
			{
				$this->session->set_flashdata('pesan','refused');
                redirect(base_url('auth')) ;				
			}

			else
			{
				$data = array(
	                                'logged' => TRUE,
	                                'id_user' => $row->id_user,
	                                'nama' => $row->nama,
	                                'username' => $row->username,
	                                'email' => $row->email,
	                                'level' => $row->level,
	                            );
	            $this->session->set_userdata($data);
	            $data = array(
                    'login' => 'On'  
                );

                $this->M_auth->set_login($id_user, $data);

                $this->session->set_flashdata('pesan','success');
                redirect(base_url('dashboard')) ;
			}
		
	    }
	    else
	    {
	        $this->session->set_flashdata('pesan','denied');
	        redirect(base_url('auth'));
	    }
	}

	function logout()
	{	
		$id_user = $this->session->userdata('id_user') ;
		$data = array(
                    'login' => 'Off'  
                );

        $this->M_auth->set_login($id_user, $data);
		$this->session->sess_destroy();
		redirect (base_url('auth'));
	}

}
