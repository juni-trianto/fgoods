<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('transaksi/in/M_in');   

	}

	public function index()
	{

		$hasil = $this->M_in->data();
		$data = array (
						'hasil' => $hasil,
                        'title' => 'Transaction Data',
						'css' => 'content/transaksi/in/css',
						'content' => 'content/transaksi/in/index',
						'script' => 'content/transaksi/in/script'

						) ;
		$this->load->view('template', $data);
	}

    public function konfirmasi()
    {
        $id = $_POST['id']; 
        $row = $this->M_in->detail($id) ;
        $data = array (
                        'title' => 'Action warning',
                        'id_transaksi' => $row->id_transaksi
                        ) ;
        $this->load->view('content/transaksi/in/konfirmasi', $data);
        
    }

    public function hapus($id)
    {
        $this->M_in->hapus($id);   
        $this->session->set_flashdata('pesan','Dihapus');
        redirect(base_url('transaksi/in'));             
    }

	
}
