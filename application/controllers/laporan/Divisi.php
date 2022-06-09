<style type="text/css">
	.bg-gradient-warning {
    background-color: #224abe;
    background-image: linear-gradient(180deg,#224abe 10%,#224abe 100%);
    background-size: cover;
}
</style>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('laporan/M_divisi');   

		

	}

	public function index()
	{
		$data = array (
                        'title' => 'Report Division',
						'css' => 'content/laporan/divisi/css',
						'content' => 'content/laporan/divisi/index',
						'script' => 'content/laporan/divisi/script'

						) ;
		$this->load->view('template', $data);
	}

	public function divisi()
	{
		$hasil = $this->M_divisi->divisi() ;
		$data = array (
                        'hasil' => $hasil
						) ;

						var_dump($hasil);
						die;
		$this->load->view('content/laporan/divisi/divisi', $data);
	}

	public function material()
	{
		$hasil = $this->M_divisi->material() ;
		$data = array (
                        'hasil' => $hasil
						) ;
		$this->load->view('content/laporan/divisi/material', $data);
	}
	
	public function preview($from, $to)
	{
		ini_set('error_reporting', E_STRICT);
		//get all item
		$all_item_detil[]= new stdClass;
		
		$all_item = $this->M_divisi->get_all_item_preview($to);		
		
		for($i=0; $i < count($all_item); $i++){
			$kode = $all_item[$i]->kode;
			
			//Tanggal sebelum from
			$tgl_kemarin_from    	= date('Y-m-d', strtotime("-1 day", strtotime($from)));
			
			//Awal Begining
			$begining_awal 		= $this->M_divisi->detail_item($kode, $tgl_kemarin_from);
			$stock_begining 	= 0 + round($begining_awal->qty_in,1) - round($begining_awal->qty_ng,1) - round($begining_awal->qty_out,1);
			
			//Begining kedua
			$begining_kedua   	  = $this->M_divisi->detail_item_month($kode,$from,$to);
			$stock_begining_kedua = round($stock_begining,1) + round($begining_kedua->qty_in,1) - round($begining_kedua->qty_ng,1) - round($begining_kedua->qty_out,1);
		
			$all_item_detil[$i]->item 			= $begining_kedua->item;
			$all_item_detil[$i]->kode 			= $begining_kedua->kode;
			$all_item_detil[$i]->unit 			= $begining_kedua->unit;
			$all_item_detil[$i]->qty_begining 	= round($stock_begining_kedua,1);
			$all_item_detil[$i]->qty_in 		= round($begining_kedua->qty_in,1);
			$all_item_detil[$i]->qty_ng 		= round($begining_kedua->qty_ng,1);
			$all_item_detil[$i]->qty_out 		= round($begining_kedua->qty_out,1);
				
			$all_item_detil[$i]->total_kemarin  = round($stock_begining,1) ;
		}
		
			
		$data = array (
						'hasil' => $all_item_detil,
						'from' => $from,
						'to' => $to,
						'kode' => '',
						'nama' => '',
						'kode_item' => '',
						'nama_item' => '',
                        'title' => 'Laporan Per divisi',
						'css' => 'content/laporan/divisi/css',
						'content' => 'content/laporan/divisi/preview',
						'script' => 'content/laporan/divisi/script'

						) ;
		$this->load->view('template', $data);
		
	}

	public function filter($kode_divisi, $from, $to,$kode_item)
	{
		
		ini_set('error_reporting', E_STRICT);
		//get all item
		$all_item_detil[]= new stdClass;
			
		if($kode_item =="noll")
		{
			$all_item = $this->M_divisi->get_item_filter_preview($kode_divisi, $to);
		}else
			{
				$all_item = $this->M_divisi->get_item_filter_preview2($kode_divisi, $to,$kode_item);
			}
		
		$row = $this->M_divisi->detail_divisi($kode_divisi);
		$row_m = $this->M_divisi->detail_item12($kode_item);
		
		for($i=0; $i < count($all_item); $i++){
			$kode = $all_item[$i]->kode;
			
			//Tanggal sebelum from
			$tgl_kemarin_from    	= date('Y-m-d', strtotime("-1 day", strtotime($from)));
			
			//Awal Begining
			$begining_awal 		= $this->M_divisi->detail_item_divisi($kode, $kode_divisi, $tgl_kemarin_from );
			$stock_begining 	= 0 + round($begining_awal->qty_in,1) - round($begining_awal->qty_ng,1) - round($begining_awal->qty_out,1);
			
			//Begining kedua
			$begining_kedua   	  = $this->M_divisi->detail_item_divisi_month($kode,$kode_divisi,$from,$to);
			$stock_begining_kedua = round($stock_begining,1) + round($begining_kedua->qty_in,1) - round($begining_kedua->qty_ng,1) - round($begining_kedua->qty_out,1);
		
			$all_item_detil[$i]->item 			= $begining_kedua->item;
			$all_item_detil[$i]->kode 			= $begining_kedua->kode;
			$all_item_detil[$i]->unit 			= $begining_kedua->unit;
			$all_item_detil[$i]->qty_begining 	= round($stock_begining_kedua,1);
			$all_item_detil[$i]->qty_in 		= round($begining_kedua->qty_in,1);
			$all_item_detil[$i]->qty_ng 		= round($begining_kedua->qty_ng,1);
			$all_item_detil[$i]->qty_out 		= round($begining_kedua->qty_out,1);
				
			$all_item_detil[$i]->total_kemarin  = round($stock_begining,1)  ;
		}
		
		
		$data = array (
						'hasil' => $all_item_detil,
						'from'=> $from,
						'to' => $to,
						'kode' => $row->kode_divisi,
						'nama' => $row->nama_divisi,
						'kode_item' => $row_m->kode,
						'nama_item' => $row_m->item,
                        'title' => 'Laporan Per divisi',
						'css' => 'content/laporan/divisi/css',
						'content' => 'content/laporan/divisi/filter',
						'script' => 'content/laporan/divisi/script'
						) ;
		$this->load->view('template', $data);
	}



	public function preview_excel_v2($from, $to)
	{
		
		include_once APPPATH.'/third_party/PHPExcel.php';
		$excel         = new PHPExcel();
		$excel->setActiveSheetIndex(0);

		//name the worksheet
		$excel->getActiveSheet()->setTitle('Laporan Item');
		
		/*Header*/
		$excel->getActiveSheet()->setCellValue('A1', "No")
								->setCellValue('B1', "Description")
								->setCellValue('C1', "Code")
								->setCellValue('D1', "Unit")
								->setCellValue('E1', "Beginning Stock")
								->setCellValue('F1', "Import Etc")
								->setCellValue('G1', "NG")
								->setCellValue('H1', "Prod")
								->setCellValue('I1', "Ending Stok");
		
			/*Bold Huruf*/
		$excel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);
		
		/*lebar kolom*/
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(8.0);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(39.0);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(18.0);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10.0);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(19.0);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(19.0);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15.0);
		$ex = $excel->setActiveSheetIndex(0);
		$lokasi_kolom = 2;
		$nomor = 1;
		ini_set('error_reporting', E_STRICT);
		//get all item
		$all_item_detil[]= new stdClass;
		
		$all_item = $this->M_divisi->get_all_item_preview($to);		
		
		for($i=0; $i < count($all_item); $i++){
			$kode = $all_item[$i]->kode;
			$det = $this->M_divisi->detail_in_fix($kode, $from, $to) ;
			//Tanggal sebelum from
			$tgl_kemarin_from    	= date('Y-m-d', strtotime("-1 day", strtotime($from)));
			
			//Awal Begining
			$begining_awal 		= $this->M_divisi->detail_item($kode, $tgl_kemarin_from);
			$stock_begining 	= 0 + round($begining_awal->qty_in,1) - round($begining_awal->qty_ng,1) - round($begining_awal->qty_out,1);
			
			//Begining kedua
			$begining_kedua   	  = $this->M_divisi->detail_item_month($kode,$from,$to);
			$stock_begining_kedua = round($stock_begining,1) + round($begining_kedua->qty_in,1) - round($begining_kedua->qty_ng,1) - round($begining_kedua->qty_out,1);
		
			$item 			= $begining_kedua->item;
			$kode 			= $begining_kedua->kode;
			$unit 			= $begining_kedua->unit;
			$qty_begining 	= round($stock_begining_kedua,1);
			$qty_in 		= round($begining_kedua->qty_in,1);
			$qty_ng 		= round($begining_kedua->qty_ng,1);
			$qty_out 		= round($begining_kedua->qty_out,1);
				
			$total_kemarin  = round($stock_begining,1)  ;
		
		
				$ex->setCellValue("A".$lokasi_kolom,$nomor);
				$ex->setCellValue("B".$lokasi_kolom,$item);
				$ex->setCellValue("C".$lokasi_kolom,$kode);
				$ex->setCellValue("D".$lokasi_kolom,$unit);
				$ex->setCellValue("E".$lokasi_kolom,round($total_kemarin,2));
				$ex->setCellValue("F".$lokasi_kolom,round($qty_in,2));
				$ex->setCellValue("G".$lokasi_kolom,round($qty_ng,2));
				$ex->setCellValue("H".$lokasi_kolom,round($qty_out,2));
				
				$ttl= round($total_kemarin,1) + round($qty_in,1) - round($qty_ng,1) - round($qty_out,1) ;
				$ex->setCellValue("I".$lokasi_kolom,round($ttl,2));
				$excel->getActiveSheet()->getStyle("A$lokasi_kolom:I$lokasi_kolom")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$nomor++;
				$lokasi_kolom++;
			
		}
		/*Proses Penyimpanan*/
		$filename="laporan division.xls"; 
		ob_clean();
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
				
		$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');  
		
		$objWriter->save('php://output');		    
	}	

	//Penambahan fungsi filter ke excel
	public function filter_excel_v2($kode_divisi, $from, $to,$kode_item)
	{
	  
		include_once APPPATH.'/third_party/PHPExcel.php';
		$excel         = new PHPExcel();
		$excel->setActiveSheetIndex(0);

		//name the worksheet
		$excel->getActiveSheet()->setTitle('Laporan Item');
		
		/*Header*/
		$excel->getActiveSheet()->setCellValue('A1', "No")
								->setCellValue('B1', "Description")
								->setCellValue('C1', "Code")
								->setCellValue('D1', "Unit")
								->setCellValue('E1', "Beginning Stock")
								->setCellValue('F1', "Import Etc")
								->setCellValue('G1', "NG")
								->setCellValue('H1', "Prod")
								->setCellValue('I1', "Ending Stok");
		
			/*Bold Huruf*/
		$excel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);
		
				/*lebar kolom*/
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(8.0);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(39.0);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(18.0);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10.0);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(19.0);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(19.0);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15.0);
		$ex = $excel->setActiveSheetIndex(0);
		$lokasi_kolom = 2;
		$nomor = 1;

		
		if($kode_item =="noll")
		{
			$all_item = $this->M_divisi->get_item_filter_preview($kode_divisi, $to);
		}else
			{
				$all_item = $this->M_divisi->get_item_filter_preview2($kode_divisi, $to,$kode_item);
			}
						
			
			$row = $this->M_divisi->detail_divisi($kode_divisi);
		$row_m = $this->M_divisi->detail_item12($kode_item);
		
		for($i=0; $i < count($all_item); $i++){
			$kode = $all_item[$i]->kode;
			
			//Tanggal sebelum from
			$tgl_kemarin_from    	= date('Y-m-d', strtotime("-1 day", strtotime($from)));
			
			//Awal Begining
			$begining_awal 		= $this->M_divisi->detail_item_divisi($kode, $kode_divisi, $tgl_kemarin_from );
			$stock_begining 	= 0 + round($begining_awal->qty_in,1) - round($begining_awal->qty_ng,1) - round($begining_awal->qty_out,1);
			
			//Begining kedua
			$begining_kedua   	  = $this->M_divisi->detail_item_divisi_month($kode,$kode_divisi,$from,$to);
			$stock_begining_kedua = round($stock_begining,1) + round($begining_kedua->qty_in,1) - round($begining_kedua->qty_ng,1) - round($begining_kedua->qty_out,1);
		
			$item 			= $begining_kedua->item;
			$kode 			= $begining_kedua->kode;
			$unit 			= $begining_kedua->unit;
			$qty_begining 	= round($stock_begining_kedua,1);
			$qty_in 		= round($begining_kedua->qty_in,1);
			$qty_ng 		= round($begining_kedua->qty_ng,1);
			$qty_out 		= round($begining_kedua->qty_out,1);
				
			$total_kemarin  = round($stock_begining,1)  ;
		
		
				$ex->setCellValue("A".$lokasi_kolom,$nomor);
				$ex->setCellValue("B".$lokasi_kolom,$item);
				$ex->setCellValue("C".$lokasi_kolom,$kode);
				$ex->setCellValue("D".$lokasi_kolom,$unit);
				$ex->setCellValue("E".$lokasi_kolom,round($total_kemarin,2));
				$ex->setCellValue("F".$lokasi_kolom,round($qty_in,2));
				$ex->setCellValue("G".$lokasi_kolom,round($qty_ng,2));
				$ex->setCellValue("H".$lokasi_kolom,round($qty_out,2));
				
				$ttl= round($total_kemarin,1) + round($qty_in,1) - round($qty_ng,1) - round($qty_out,1) ;
				$ex->setCellValue("I".$lokasi_kolom,round($ttl,2));
				$excel->getActiveSheet()->getStyle("A$lokasi_kolom:I$lokasi_kolom")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$nomor++;
				$lokasi_kolom++;
			
		}
		/*Proses Penyimpanan*/
		$filename="laporan division.xls"; 
		ob_clean();
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
				
		$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');  
		
		$objWriter->save('php://output');		    		
	}
}

