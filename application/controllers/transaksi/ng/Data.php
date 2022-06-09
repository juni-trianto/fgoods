<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('transaksi/ng/M_ng');   
 
		 

	}

	public function index()
	{

		$hasil = $this->M_ng->data();
		$data = array (
						'hasil' => $hasil,
                        'title' => 'Transaction Data',
						'css' => 'content/transaksi/ng/css',
						'content' => 'content/transaksi/ng/index',
						'script' => 'content/transaksi/ng/script'

						) ;
		$this->load->view('template', $data);
	}

    public function konfirmasi()
    {
        $id = $_POST['id']; 
        $row = $this->M_ng->detail($id) ;
        $data = array (
                        'title' => 'Action warning ',
                        'id_transaksi' => $row->id_transaksi
                        ) ;
        $this->load->view('content/transaksi/ng/konfirmasi', $data);
        
    }

    public function hapus($id)
    {
        $this->M_ng->hapus($id);   
        $this->session->set_flashdata('pesan','Dihapus');
        redirect(base_url('transaksi/ng'));             
    }

	
}
