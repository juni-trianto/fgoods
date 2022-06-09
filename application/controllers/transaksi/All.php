<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('transaksi/M_all');   

		

	}

	public function index()
	{

		$hasil = $this->M_all->data();
		$data = array (
						'hasil' => $hasil,
                        'title' => 'Data Transaksi',
						'css' => 'content/transaksi/all/css',
						'content' => 'content/transaksi/all/index',
						'script' => 'content/transaksi/all/script'

						) ;
		$this->load->view('template', $data);
	}

	public function tambah()
	{
        $cek = $this->M_all->cek_kode() ;
        
        if ($cek > 0)
        {
            $row = $this->M_all->kode_transaksi();
            $data = $row->kode ;
            $kode=preg_replace("/IN-/","", $data);

        }
        else
        {
            $kode = '0000000000';
        };


        $noUrut = (int) substr($kode, 0, 10);
        $noUrut++;
        $char = "IN-";
        $kode_transaksi = $char . sprintf("%010s", $noUrut);
		$data = array (
						'title' => 'Membuat Transaksi Baru',
						'action' => base_url('transaksi/all/input'),
						'kode_transaksi' => $kode_transaksi,
                        'tanggal' => set_value('tanggal'),
                        'no_bc' => set_value('no_bc'),
						'css' => 'content/transaksi/all/css',
						'content' => 'content/transaksi/all/form',
						'script' => 'content/transaksi/all/script_form'

						) ;
		$this->load->view('template', $data);
	}

	public function input ()
	{
        $kode_transaksi = $this->input->post('kode_transaksi') ;
		$config_validasi = array(
    	
            array(
                    'field' => 'tanggal',
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'no_bc',
                    'label' => 'No Bc',
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
                'kode_transaksi' => $this->input->post('kode_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'no_bc' => $this->input->post('no_bc'),
                'status_transaksi' => 'IN',
                'id_user' => $this->session->userdata('id_user')
            );        
            $this->M_all->input($data);


            $data1 = array(
                'tanggal' => $this->input->post('tanggal')
            );
            $this->M_all->set_list_transaksi($kode_transaksi, $data1);
    		
            redirect(base_url('transaksi/all'));
	    }
	}

    public function detail($id)
    {
        $row = $this->M_all->detail($id) ;
        $data = array (
                        'title' => 'Detail Data Material',
                        'id_material' => $row->id_material,
                        'item' => $row->item,
                        'kode' => $row->kode,
                        'status' => $row->status,
                        'unit' => $row->unit,
                        'kode_divisi' => $row->kode_divisi,
                        'css' => 'content/material/css',
                        'content' => 'content/material/detail',
                        'script' => 'content/material/script'
                        ) ;
        $this->load->view('template', $data) ;
    }

    public function edit($id)
    {
        $row = $this->M_all->detail($id) ;
        $data = array (
                        'title' => 'Edit Data kategori',
                        'action' => base_url('transaksi/all/update'),
                        'id_transaksi' => $row->id_transaksi,
                        'kode_transaksi' => $row->kode_transaksi,
                        'tanggal' => $row->tanggal,
                        'no_bc' => $row->no_bc,
                        'css' => 'content/transaksi/all/css',
                        'content' => 'content/transaksi/all/form',
                        'script' => 'content/transaksi/all/script_form'
                        ) ;
        $this->load->view('template', $data) ;
    }


    
    public function update()
    {
        $id = $this->input->post('id_transaksi') ;
        $kode_transaksi = $this->input->post('kode_transaksi') ;
        $config_validasi = array(
        
            array(
                    'field' => 'tanggal',
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => '%s harap di isi',
                    ),
            ),
        
            array(
                    'field' => 'no_bc',
                    'label' => 'No Bc',
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
        else
        {


            $data = array( 
                'kode_transaksi' => $this->input->post('kode_transaksi'),
                'tanggal' => $this->input->post('tanggal'),
                'no_bc' => $this->input->post('no_bc'),
                'status_transaksi' => 'IN',
                'id_user' => $this->session->userdata('id_user')
            );        
            $this->M_all->update($id, $data);


            $data1 = array(
                'tanggal' => $this->input->post('tanggal')
            );
            $this->M_all->set_list_transaksi($kode_transaksi, $data1);
            
            redirect(base_url('transaksi/all'));
        }
    }


    
    public function konfirmasi()
    {
        $id = $_POST['id']; 
        $row = $this->M_all->detail($id) ;
        $data = array (
                        'title' => 'Peringatan tindakan',
                        'id_transaksi' => $row->id_transaksi
                        ) ;
        $this->load->view('content/transaksi/all/konfirmasi', $data);
        
    }

    public function hapus($id)
    {
        $this->M_all->hapus($id);   
        $this->session->set_flashdata('pesan','<div class="alert alert-danger " role="alert">Fitur Hapus Data masih dalam perbaikan</div>');
        redirect(base_url('transaksi/all'));             
        
        
    }

    
    public function list_transaksi($kode_transaksi)
    {
        $hasil = $this->M_all->list_transaksi($kode_transaksi) ;
        $cek = $this->M_all->cek_list_transaksi($kode_transaksi) ;
        $data = array (
                        'hasil' => $hasil,
                        'cek' => $cek,
                        ) ;
        $this->load->view('content/transaksi/all/list_transaksi', $data);
        
    }


    public function data_material($kode_transaksi)
    {
        $hasil = $this->M_all->material() ;
        $data = array ( 
                        'kode_transaksi' => $kode_transaksi,
                        'hasil' => $hasil,
                        ) ;
        $this->load->view('content/transaksi/all/data_material', $data);
        
    }



    public function input_material ()
    {
        
        $id_material = $this->input->post('id_material');
        $kode_transaksi = $this->input->post('kode_transaksi');
        $qty = $this->input->post('qty');
 
        if ($id_material == '') {
            $data['error']['id_material'] = 'Pilih produk';
        }

        if ($qty == '') {
            $data['error']['qty'] = 'Masukkan QTY';
        }      
    

        /* section */
        /* end section */

        if (empty($data['error'])) {


            $row = $this->M_all->detail_material($id_material) ;
            $data = array(
                
                'id_material' => $row->id_material,
                'kode' => $row->kode,
                'item' => $row->item,
                'status' => $row->status,
                'unit' => $row->unit,
                'kode_divisi' => $row->kode_divisi,
                'kode_transaksi' => $kode_transaksi,
                'qty' => $qty,
                'status_transaksi' => 'IN',
                'id_user' => $this->session->userdata('id_user'),
        
            );
            
            $this->M_all->input_list_transaksi($data);
            
            $data['hasil'] = 'sukses';          
        } else {
            $data['hasil'] = 'gagal';
        }
        echo json_encode($data);
    }


    public function hapus_list_material()
    {
        $id = $_POST['id'] ;
         $this->M_all->hapus_list_material($id); 
        
    }
	
}
