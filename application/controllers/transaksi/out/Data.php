<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('transaksi/out/M_out');   
 
		 

	}

	public function index()
	{

		$hasil = $this->M_out->data();
		$data = array (
						'hasil' => $hasil,
                        'title' => 'Transaction Data',
						'css' => 'content/transaksi/out/css',
						'content' => 'content/transaksi/out/index',
						'script' => 'content/transaksi/out/script'

						) ;
		$this->load->view('template', $data);
	}

    public function konfirmasi()
    {
        $id = $_POST['id']; 
        $row = $this->M_out->detail($id) ;
        $data = array (
                        'title' => 'Action warning',
                        'id_transaksi' => $row->id_transaksi
                        ) ;
        $this->load->view('content/transaksi/out/konfirmasi', $data);
        
    }

    public function hapus($id)
    {
        $this->M_out->hapus($id);   
        $this->session->set_flashdata('pesan','Dihapus');
        redirect(base_url('transaksi/out'));             
    }

	
}
