<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('transaksi/out/M_edit');   
 
		 

	}

	public function transaksi($id)
	{
        $row = $this->M_edit->detail($id) ;
        $kode_transaksi = $row->kode_transaksi ;

        // bersihkan temp list transaksi
        $this->M_edit->hapus_table_temp_list_transaksi($kode_transaksi) ;
        // ambil list transaksi ke temp list transaksi
        $this->M_edit->get_table_list_transaksi($kode_transaksi) ;

        // bersihkan no bc dengan kode transaksi
        $this->M_edit->hapus_table_no_bc($kode_transaksi) ;
        // ambil list transaksi ke no bc
        $this->M_edit->get_table_no_bc($kode_transaksi) ;

        $data = array (
                        'title' => 'Edit Transaction Data',
                        'action' => base_url('transaksi/out/edit/update'),
                        'id_transaksi' => $row->id_transaksi,
                        'kode_transaksi' => $row->kode_transaksi,
                        'tanggal' => $row->tanggal,
                        'no_bc' => $row->no_bc,
                        'css' => 'content/transaksi/out/edit/css',
                        'content' => 'content/transaksi/out/edit/view',
                        'script' => 'content/transaksi/out/edit/script'
                        ) ;
        $this->load->view('template', $data) ;
	}

   
	
}
