<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mix extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('laporan/M_mix');   

		

	}

	public function index()
	{

		$hasil = $this->M_mix->data();
		$data = array (
						'hasil' => $hasil,
                        'title' => 'Laporan Per mix',
						'css' => 'content/laporan/mix/css',
						'content' => 'content/laporan/mix/index',
						'script' => 'content/laporan/mix/script'

						) ;
		$this->load->view('template', $data);
	}

	public function preview($from, $to)
	{
		$bulan = date("m",strtotime($from)) ; 
		$tahun = date("Y",strtotime($from)) ; 
		$hasil = $this->M_mix->preview($from, $to);
		$data = array (
						'hasil' => $hasil,
						'bulan' => $bulan,
						'tahun' => $tahun,
						'from' => $from,
						'to' => $to,
                        'title' => 'Laporan Per Mix',
						'css' => 'content/laporan/mix/css',
						'content' => 'content/laporan/mix/preview',
						'script' => 'content/laporan/mix/script'

						) ;
		$this->load->view('template', $data);
	}

	
}
