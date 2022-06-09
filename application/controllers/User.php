<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('M_user');   

		

	}

	public function index()
	{

		$hasil = $this->M_user->data();
		$data = array (
						'hasil' => $hasil,
                        'title' => 'User Data',
						'css' => 'content/user/css',
						'content' => 'content/user/index',
						'script' => 'content/user/script'

						) ;
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array (
						'title' => 'Menambahkan user',
						'action' => base_url('user/input'),
						'id_user' => '',
                        'nip' => set_value('nip'),
                        'nama' => set_value('nama'),
                        'username' => set_value('username'),
                        'email' => set_value('email'),
                        'password' => set_value('password'),
                        'dept' => set_value('dept'),
                        'alamat' => set_value('alamat'),
                        'jenis_kelamin' => set_value('jenis_kelamin'),
                        'domisili' => set_value('domisili'),
                        'tgl_join' => set_value('tgl_join'),
                        'tempat_lahir' => set_value('tempat_lahir'),
						'lv' => set_value('level'),
                        'tanggal_lahir' => set_value('tanggal_lahir'),
                        'agama' => set_value('agama'),
                        'wa' => set_value('wa'),
						'css' => 'content/user/css',
						'content' => 'content/user/form',
						'script' => 'content/user/script'

						) ;
		$this->load->view('template', $data);
	}

	public function input ()
	{
		$config_validasi = "";
		if($level != "User")
		{
			/*jika bukan user maka hanya perlu divalidasi nip nama username password dan dept*/
$config_validasi = array(

             array(
                    'field' => 'nip',
                    'label' => 'NIP',
                    'rules' => 'callback_periksa_nip'
            ),
        
            array(
                    'field' => 'nama',
                    'label' => 'nama',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),

             array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'callback_periksa_username'
            ),

             array(
                 
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'dept',
                    'label' => 'dept',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'level',
                    'label' => 'Pilih Type User',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
        
	    );
		}else
		{
			/*jika user maka perlu divalidasi sprti dibawah ada post akses menunya*/ 
$config_validasi = array(

             array(
                    'field' => 'nip',
                    'label' => 'NIP',
                    'rules' => 'callback_periksa_nip'
            ),
        
            array(
                    'field' => 'nama',
                    'label' => 'nama',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),

             array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'callback_periksa_username'
            ),

             array(
                 
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'dept',
                    'label' => 'dept',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'level',
                    'label' => 'Pilih Type User',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
        
			array(
                    'field' => 'in',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'out',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'ng',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'semua',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'item',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'divisi',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'mix',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
           array(
                    'field' => 'in',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'out',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'ng',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'semua',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'item',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'divisi',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
			
			array(
                    'field' => 'mix',
                    'label' => 'Pilih Ya atau Tidak ',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s ',
                    ),
            ),
	    );

		}
		
	    $this->form_validation->set_rules($config_validasi);
		if ($this->form_validation->run() == FALSE) 
		{
	        $this->tambah(); 
	    }
	    else
	    {

			$level = $this->input->post('level');
						
				if($level == "Admin")
				{
					$level = "001";
				}else
					if($level == "Super User")
					{
						$level = "002";
					}
					else
						if($level == "User")
						{
							$level = "003";
						}
						
	    	$data = array( 
							'nip' => $this->input->post('nip'),
							'nama' => $this->input->post('nama'),
							'username' => $this->input->post('username'),
							'password' => base64_encode($this->input->post('password')),
							'level' => $level,
						    'dept' => $this->input->post('dept')
						);
						
            $this->M_user->input($data);
    		
			
			/* Hapus dan insert Akses Menu */
			$id_user="";
			$cari_id = $this->M_user->cek_id_nip($this->input->post('nip'));
			
				$id_user=$cari_id->id_user;
			
			
			$data_aksesmenu = array(
                                        'id_user' 		=> $id_user,
                                        'akses_in' 		=> $this->input->post('in'),
                                        'akses_out' 	=> $this->input->post('out'),
                                        'akses_ng' 		=> $this->input->post('ng'),
                                        'akses_semuatr' => $this->input->post('semua'),
										'akses_item' 	=>  $this->input->post('item'),
                                        'akses_divisi' 	=>  $this->input->post('divisi'),
                                        'akses_mix' 	=>  $this->input->post('mix')
                                    );
									
			$this->M_user->hapus_akses($id_user);
			$this->M_user->insert_akses($data_aksesmenu);
						
			/*--------------------------*/
			
            redirect(base_url('user'));
	    }
	}

    public function detail($id)
    {
        $row = $this->M_user->detail($id) ;
        $data = array (
                        'title' => 'Detail Data user',
                        'nip' => $row->nip,
                        'nama' => $row->nama,
                        'username' => $row->username,
                        'email' => $row->email,
                        'alamat' => $row->alamat,
                        'dept' => $row->dept,
                        'jenis_kelamin' => $row->jenis_kelamin,
                        'domisili' => $row->domisili,
                        'tgl_join' => $row->tgl_join,
                        'tempat_lahir' => $row->tempat_lahir,
                        'tanggal_lahir' => $row->tanggal_lahir,
                        'agama' => $row->agama,
                        'wa' => $row->wa,
                        'css' => 'content/user/css',
                        'content' => 'content/user/detail',
                        'script' => 'content/user/script'
                        ) ;
        $this->load->view('template', $data) ;
    }

    public function edit($id)
    {
        $row = $this->M_user->detail($id) ;
        $menu = $this->M_user->view_menu($id) ;
        $data = array (
                        'title' => 'Edit User Data',
                        'action' => base_url('user/update'),
                        'id_user' => $row->id_user,
                        'nip' => $row->nip,
                        'nama' => $row->nama,
                        'username' => $row->username,
                        'email' => $row->email,
                        'password' => base64_decode($row->password),
                        'alamat' => $row->alamat,
                        'dept' => $row->dept,
                        'jenis_kelamin' => $row->jenis_kelamin,
                        'domisili' => $row->domisili,
                        'tgl_join' => $row->tgl_join,
                        'tempat_lahir' => $row->tempat_lahir,
                        'tanggal_lahir' => $row->tanggal_lahir,
                        'agama' => $row->agama,
						'lv' => $row->level,
                        'wa' => $row->wa,

                        'in' => $menu->akses_in,
                        'out' => $menu->akses_out,
                        'ng' => $menu->akses_ng,
                        'semuatr' => $menu->akses_semuatr,
                        'item' => $menu->akses_item,
                        'divisi' => $menu->akses_divisi,
                        'mix' => $menu->akses_mix,
                        
                        'css' => 'content/user/css',
                        'content' => 'content/user/form',
                        'script' => 'content/user/script'
                        ) ;
        $this->load->view('template', $data) ;
    }


    
    public function update()
    {
        $id = $this->input->post('id_user') ;
                
        $config_validasi = array(

             array(
                    'field' => 'nip',
                    'label' => 'Nip',
                    'rules' => 'callback_periksa_edit_nip'
            ),
        
            array(
                    'field' => 'nama',
                    'label' => 'nama',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),

             array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'callback_periksa_edit_username'
            ),
			
			array(
					'field' => 'dept',
					'label' => 'dept',
					'rules' => 'required',
					'errors' => array(
					'required' => '%s harap di isi',
					),
				),
														
			array(
					'field' => 'level',
					'label' => 'Pilih Type User ',
					'rules' => 'required',
					'errors' => array(
										'required' => '%s ',
									),
				),
															
        
        );

             $this->form_validation->set_rules($config_validasi);
             if ($this->form_validation->run() == FALSE) {
                
                    $this->edit($id); 
            
             }
                else{ 
						$level = $this->input->post('level');
						
						if($level == "Admin")
						{
							$level = "001";
							$this->M_user->hapus_akses($id);
						}else
							if($level == "Super User")
							{
								$level = "002";
								$this->M_user->hapus_akses($id);
							}
							else
							if($level == "User")
							{
								$config_validasi = array(

															 array(
																	'field' => 'nip',
																	'label' => 'Nip',
																	'rules' => 'callback_periksa_edit_nip'
															),
														
															array(
																	'field' => 'nama',
																	'label' => 'nama',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s harap di isi',
																	),
															),

															 array(
																	'field' => 'username',
																	'label' => 'Username',
																	'rules' => 'callback_periksa_edit_username'
															),
														
														 
															array(
																	'field' => 'dept',
																	'label' => 'dept',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s harap di isi',
																	),
															),
														
														
															array(
																	'field' => 'level',
																	'label' => 'Pilih Type User ',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s ',
																	),
															),
															
															array(
																	'field' => 'in',
																	'label' => 'Pilih Ya atau Tidak ',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s ',
																	),
															),
															
															array(
																	'field' => 'out',
																	'label' => 'Pilih Ya atau Tidak ',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s ',
																	),
															),
															
															array(
																	'field' => 'ng',
																	'label' => 'Pilih Ya atau Tidak ',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s ',
																	),
															),
															
															array(
																	'field' => 'semua',
																	'label' => 'Pilih Ya atau Tidak ',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s ',
																	),
															),
															
															array(
																	'field' => 'item',
																	'label' => 'Pilih Ya atau Tidak ',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s ',
																	),
															),
															
															array(
																	'field' => 'divisi',
																	'label' => 'Pilih Ya atau Tidak ',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s ',
																	),
															),
															
															array(
																	'field' => 'mix',
																	'label' => 'Pilih Ya atau Tidak ',
																	'rules' => 'required',
																	'errors' => array(
																			'required' => '%s ',
																	),
															),
														);
								$level = "003";
									/* Hapus dan insert Akses Menu */
						
						$data_aksesmenu = array(
                                        'id_user' 		=> $id,
                                        'akses_in' 		=> $this->input->post('in'),
                                        'akses_out' 	=> $this->input->post('out'),
                                        'akses_ng' 		=> $this->input->post('ng'),
                                        'akses_semuatr' => $this->input->post('semua'),
										'akses_item' 	=> $this->input->post('item'),
                                        'akses_divisi' 	=> $this->input->post('divisi'),
                                        'akses_mix' 	=> $this->input->post('mix')
                                    );
									
						$this->M_user->hapus_akses($id);
						$this->M_user->insert_akses($data_aksesmenu);
						
						/*--------------------------*/
							}
                
                        $data = array(
                                        'nip' => $this->input->post('nip'),
                                        'nama' => $this->input->post('nama'),
                                        'username' => $this->input->post('username'),
                                        'password' => base64_encode($this->input->post('password')),
                                        'level' => $level,
                                        'dept' => $this->input->post('dept')
                                    );
                        $this->M_user->update($id, $data);
                        redirect(base_url('user'));
              }
    }


    
    public function konfirmasi()
    {
        $id = $_POST['id']; 
        $row = $this->M_user->detail($id) ;
        $data = array (
                        'title' => 'Action alert',
                        'id_user' => $row->id_user
                        ) ;
        $this->load->view('content/user/konfirmasi', $data);
        
    }

    public function hapus($id)
    {
        $this->M_user->hapus($id);   
        $this->session->set_flashdata('pesan','<div class="alert alert-danger " role="alert">Fitur Hapus Data masih dalam perbaikan</div>');
        redirect(base_url('user'));             
        
        
    }


    /* =======================================================================================================================================*/


    function periksa_email($email){

                        
                $cek = $this->M_user->cek_email($email);

                if ($email == '') :

                        $this->form_validation->set_message('periksa_email', 'Masukkan Email');
                        return FALSE;
                elseif ($cek > 0) :

                        $this->form_validation->set_message('periksa_email', 'Email sudah digunakan');
                        return FALSE;

                elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) :

                        $this->form_validation->set_message('periksa_email', 'Email tidak diizinkan');
                        return FALSE;
                
                else :
                
                        return TRUE;
                endif ;

        }



    function periksa_edit_email($email){

                        
                $id = $this->input->post('id_user') ;
                $row = $this->M_user->detail($id) ;
                $lama = $row->email ;
                $baru = $email ;
                $cek = $this->M_user->cek_edit_email($lama, $baru) ;

                if ($email == '') :

                        $this->form_validation->set_message('periksa_edit_email', 'Masukkan Email');
                        return FALSE;
                elseif ($cek > 0) :

                        $this->form_validation->set_message('periksa_edit_email', 'Email tidak diizinkan');
                        return FALSE;
                
                else :
                
                        return TRUE;
                endif ;

        }

    


    function periksa_username($username){

                        
                $cek = $this->M_user->cek_username($username);

                if ($username == '') :

                        $this->form_validation->set_message('periksa_username', 'Masukkan Username');
                        return FALSE;
                elseif ($cek > 0) :

                        $this->form_validation->set_message('periksa_username', 'Username sudah digunakan');
                        return FALSE;
                
                else :
                
                        return TRUE;
                endif ;

        }

    

    function periksa_edit_username($username){

                        
                $id = $this->input->post('id_user') ;
                $row = $this->M_user->detail($id) ;
                $lama = $row->username ;
                $baru = $username ;
                $cek = $this->M_user->cek_edit_username($lama, $baru) ;

                if ($username == '') :

                        $this->form_validation->set_message('periksa_edit_username', 'Masukkan Username');
                        return FALSE;
                elseif ($cek > 0) :

                        $this->form_validation->set_message('periksa_edit_username', 'Username tidak diizinkan');
                        return FALSE;
                
                else :
                
                        return TRUE;
                endif ;

        }

    


    function periksa_nip($nip){

                        
                $cek = $this->M_user->cek_nip($nip);

                if ($nip == '') :

                        $this->form_validation->set_message('periksa_nip', 'Masukkan NIP');
                        return FALSE;
                elseif ($cek > 0) :

                        $this->form_validation->set_message('periksa_nip', 'NIP sudah ada');
                        return FALSE;
                
                else :
                
                        return TRUE;
                endif ;

        }

    

    function periksa_edit_nip($nip){

                        
                $id = $this->input->post('id_user') ;
                $row = $this->M_user->detail($id) ;
                $lama = $row->nip ;
                $baru = $nip ;
                $cek = $this->M_user->cek_edit_nip($lama, $baru) ;

                if ($nip == '') :

                        $this->form_validation->set_message('periksa_edit_nip', 'Masukkan NIP');
                        return FALSE;
                elseif ($cek > 0) :

                        $this->form_validation->set_message('periksa_edit_nip', 'NIP sudah ada');
                        return FALSE;
                
                else :
                
                        return TRUE;
                endif ;

        }
	
}
