<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
		$this->load->model('transaksi/M_in');  
		$this->load->model('transaksi/M_out');  
		$this->load->model('transaksi/ng/M_ng');   
		$this->load->model('transaksi/M_all');   
	}

	public function index()
	{

		
		$cari 		= $_GET['txt_cari'];
		$jns_trans  = $_GET['jns_trans'];
		
		if($jns_trans == "OUT")
		{

			$hasil = $this->M_out->out_search($jns_trans,$cari);
			$data = array (
							'hasil' => $hasil,
	                        'title' => 'Data Transaksi',
							'css' => 'content/transaksi/out/css',
							'content' => 'content/transaksi/out/index',
							'script' => 'content/transaksi/out/script'
							) ;
			$this->load->view('template', $data);
		}else
			if($jns_trans == "IN")
			{
				$hasil = $this->M_in->in_search($jns_trans,$cari);
				$data = array (
								'hasil' => $hasil,
		                        'title' => 'Data Transaksi',
		                        'css' => 'content/transaksi/in/css',
		                        'content' => 'content/transaksi/in/index',
		                        'script' => 'content/transaksi/in/script'
								) ;
				$this->load->view('template', $data);
			
			}
			else
			if($jns_trans == "NG")
			{
				$hasil = $this->M_ng->ng_search($jns_trans,$cari);
				$data = array (
								'hasil' => $hasil,
		                        'title' => 'Data Transaksi',
		                        'css' => 'content/transaksi/ng/css',
		                        'content' => 'content/transaksi/ng/index',
		                        'script' => 'content/transaksi/ng/script'
								) ;
				$this->load->view('template', $data);
			}
			if($jns_trans == "ALL")
			{
				$hasil = $this->M_all->all_search($jns_trans,$cari);
		$data = array (
						'hasil' => $hasil,
                        'title' => 'Data Transaksi',
                        'css' => 'content/transaksi/all/css',
                        'content' => 'content/transaksi/all/index',
                        'script' => 'content/transaksi/all/script'
						) ;
		$this->load->view('template', $data);
			}
			
		
	}


}
