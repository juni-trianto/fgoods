<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('M_divisi');   

		

	}

	public function index()
	{

		$hasil = $this->M_divisi->data();
		$data = array (
						'hasil' => $hasil,
                        'title' => 'Division Data',
						'css' => 'content/divisi/css',
						'content' => 'content/divisi/index',
						'script' => 'content/divisi/script'

						) ;
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$data = array (
						'title' => 'Add a Division',
						'action' => base_url('divisi/input'),
						'id_divisi' => '',
                        'kode_divisi' => set_value('kode_divisi'),
                        'nama_divisi' => set_value('nama_divisi'),
						'css' => 'content/divisi/css',
						'content' => 'content/divisi/form',
						'script' => 'content/divisi/script'

						) ;
		$this->load->view('template', $data);
	}

	public function input ()
	{
		$config_validasi = array(
    	
            array(
                    'field' => 'kode_divisi',
                    'label' => 'Kode Divisi',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'nama_divisi',
                    'label' => 'Nama Divisi',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),

	    );

	    $this->form_validation->set_rules($config_validasi);
	 if ($this->form_validation->run() == FALSE) {
	    
	        $this->tambah(); 

	    }
	    else
	    {


	    	$data = array( 
                'kode_divisi' => $this->input->post('kode_divisi'),
                'nama_divisi' => $this->input->post('nama_divisi'),
                'id_user'     => $this->session->userdata('id_user'),
                'nama_user'     => $this->session->userdata('nama')
            );
            $this->M_divisi->input($data);
    		$this->session->set_flashdata('pesan','Disimpan');
            redirect(base_url('divisi'));
	    }
	}

    public function detail($id)
    {
        $row = $this->M_divisi->detail($id) ;
        $data = array (
                        'title' => 'Division Data Details',
                        'id_divisi' => $row->id_divisi,
                        'kode_divisi' => $row->kode_divisi,
                        'nama_divisi' => $row->nama_divisi,
                        'css' => 'content/divisi/css',
                        'content' => 'content/divisi/detail',
                        'script' => 'content/divisi/script'
                        ) ;
        $this->load->view('template', $data) ;
    }

    public function edit($id)
    {
        $row = $this->M_divisi->detail($id) ;
        $data = array (
                        'title' => 'Edit Category Data',
                        'action' => base_url('divisi/update'),
                        'id_divisi' => $row->id_divisi,
                        'kode_divisi' => $row->kode_divisi,
                        'nama_divisi' => $row->nama_divisi,
                        'css' => 'content/divisi/css',
                        'content' => 'content/divisi/form',
                        'script' => 'content/divisi/script'
                        ) ;
        $this->load->view('template', $data) ;
    }


    
    public function update()
    {
        $id = $this->input->post('id_divisi') ;
                
        $config_validasi = array(
        
            array(
                    'field' => 'kode_divisi',
                    'label' => 'Division Code',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),

            array(
                    'field' => 'nama_divisi',
                    'label' => 'Nama Divisi',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),

        );

                $this->form_validation->set_rules($config_validasi);
             if ($this->form_validation->run() == FALSE) {
                
                    $this->edit($id); 
            
                }
                else{ 

                
                        $data = array(
                                        'kode_divisi' => $this->input->post('kode_divisi'),
                                        'nama_divisi' => $this->input->post('nama_divisi'),
                                        'id_user'     => $this->session->userdata('id_user'),
                                        'nama_user'     => $this->session->userdata('nama')
                                    );
                        $this->M_divisi->update($id, $data);
                        $this->session->set_flashdata('pesan','Di Update');
                        redirect(base_url('divisi'));
              }
    }



    public function hapus($id)
    {
        $this->M_divisi->hapus($id);   
        $this->session->set_flashdata('pesan','Dihapus');
        redirect(base_url('divisi'));             
        
        
    }

    


	
}
