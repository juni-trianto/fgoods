<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('M_auth');	
		$this->load->library('user_agent');
		

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

		$login = $this->M_auth->login1($username);

		
	    if ($login == 1) {	 

        	$row = $this->M_auth->data_login1($username);
        	$id_user = $row->id_user ;
			$rows = $this->M_auth->akses_menu($id_user);
        	$level = $row->level ;
			// $pswd = base64_decode($row->password);
			$pswd = $row->password;
			// var_dump($pswd);
			// die;
			if($pswd == $password )
			{
				
				$cek_user_login = $this->M_auth->cek_user_login($id_user) ;

			
				if($cek_user_login > 0)
				{
					$this->session->set_flashdata('pesan','ilegal');
					redirect(base_url('auth')) ;				
				}

				else
					{
						
						
										
						if($row->level == "3")
						{
							$data = array(
							'logged' => TRUE,
												'id_user' => $row->id_user,
												'nama' => $row->nama,
												'username' => $row->username,
												'email' => $row->email,
												'level' => $row->level,
												'in' => $rows->akses_in,
												'out' => $rows->akses_out,
												'ng' => $rows->akses_ng,
												'semua' => $rows->akses_semuatr,
												'item' => $rows->akses_item,
												'divisi' => $rows->akses_divisi,
												'mix' => $rows->akses_mix,
												
											);
							
						}else
						{
							$data = array(
												'logged' => TRUE,
												'id_user' => $row->id_user,
												'nama' => $row->nama,
												'username' => $row->username,
												'email' => $row->email,
												'level' => $row->level,
											);
						}
					$this->session->set_userdata($data);	
						$data = array(
								'login' => 'Off' 

	                );

	                $this->M_auth->set_login($id_user, $data);

	                $data2 = array(
	                    'keterangan' => 'Login'

	                );
	                $this->M_auth->input_log($data2);

						$this->session->set_flashdata('pesan','success');
						redirect(base_url('dashboard')) ;
						
					}
			}else{
				$this->session->set_flashdata('pesan', 'password-salah');
				redirect(base_url('auth'));
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


        $data2 = array(
            'keterangan' => 'Logout'

        );
        $this->M_auth->input_log($data2);
		$this->session->sess_destroy();
		redirect (base_url('auth'));
	}



	function reset ()
	{
		
		$data = array(
                    'login' => 'Off' 

                );
        $this->M_auth->reset_login( $data);
        redirect (base_url('auth'));
	}



}
