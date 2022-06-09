<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		parent::logon();
			
    
        $this->load->model('laporan/M_item');   

		

	}

	public function index()
	{
		$data = array (
                        'title' => 'Report Item',
						'css' => 'content/laporan/item/css',
						'content' => 'content/laporan/item/index',
						'script' => 'content/laporan/item/script'

						) ;
		$this->load->view('template', $data);
	}

	public function material()
	{
		$hasil = $this->M_item->material() ;
		$data = array (
                        'hasil' => $hasil
						) ;
		$this->load->view('content/laporan/item/material', $data);
	}

	public function preview($from, $to)
	{
		
		$hasil = $this->M_item->preview($from, $to) ;
		$data = array (
						'from' => $from,
						'to' => $to,		
						'hasil' => $hasil,
						'kode' => '',
						'item' => '',
                        'title' => 'Report Item',
						'css' => 'content/laporan/item/css',
						'content' => 'content/laporan/item/preview',
						'script' => 'content/laporan/item/script'

						) ;
		$this->load->view('template', $data);

	}

	public function filter($kode, $from, $to)
	{
		
		$hasil = $this->M_item->filter($kode, $from, $to) ;
		$row = $this->M_item->detail_item($kode) ;

		$data = array (
						'from' => $from,
						'to' => $to,		
						'hasil' => $hasil,
						'kode' => $kode,
						'item' => $row->item,
                        'title' => 'Laporan Per item',
						'css' => 'content/laporan/item/css',
						'content' => 'content/laporan/item/filter',
						'script' => 'content/laporan/item/script'

						) ;
		$this->load->view('template', $data);

	}


	public function preview_excel($from, $to)
	{
		
		$hasil = $this->M_item->preview($from, $to) ;
		$data = array (
						'from' => $from,
						'to' => $to,		
						'hasil' => $hasil,
						'kode' => '',
						'item' => '',
                        'title' => 'Laporan per item',
						'css' => 'content/laporan/item/css',
						'content' => 'content/laporan/item/excel',
						'script' => 'content/laporan/item/script'

						) ;
		$this->load->view('content/laporan/item/excel', $data);

	}
	
	public function preview_excel_v2($from, $to)
	{
		
		include_once APPPATH.'/third_party/PHPExcel.php';
		$excel         = new PHPExcel();
		$excel->setActiveSheetIndex(0);

		//name the worksheet
		$excel->getActiveSheet()->setTitle('Laporan Item');
		
		/*Header*/
		$excel->getActiveSheet()->setCellValue('A1', "Item")
									 ->setCellValue('B1', "Code")
									 ->setCellValue('C1', "Status")
									 ->setCellValue('D1', "Unit")
									 ->setCellValue('E1', "Begining Stock")
									 ->setCellValue('E2', "Date")
									 ->setCellValue('F2', "Qty")
									 ->setCellValue('G2', "No Bc")
									 ->setCellValue('H1', "IN")
									 ->setCellValue('H2', "Suplier")
									 ->setCellValue('H3', "Date")
									 ->setCellValue('I3', "Qty")
									 ->setCellValue('J3', "No Bc")
									 ->setCellValue('K1', "OUT")
									 ->setCellValue('K2', "PRD By FIFO")
									 ->setCellValue('K3', "Date")
									 ->setCellValue('L3', "Qty")
									 ->setCellValue('M3', "No Bc")
									 ->setCellValue('N3', "Ts Code")
									 ->setCellValue('O3', "Date Transaksi")
									 ->setCellValue('P2', "Suplier (NG) Custom By BC")
									 ->setCellValue('P3', "Date")
									 ->setCellValue('Q3', "Qty")
									 ->setCellValue('R3', "No Bc")
									 ->setCellValue('S3', "Ts Code")
									 ->setCellValue('T3', "Date Transaksi")
									 ->setCellValue('U1', "Ending (All Stok)")
									 ->setCellValue('U2', "Date")
									 ->setCellValue('V2', "Qty")
									 ->setCellValue('W2', "No Bc");
									 
		/*Marge center*/
			
		
		$excel->getActiveSheet()->mergeCells('A1:A3');
		$excel->getActiveSheet()->mergeCells('B1:B3');
		$excel->getActiveSheet()->mergeCells('C1:C3');
		$excel->getActiveSheet()->mergeCells('D1:D3');
		$excel->getActiveSheet()->mergeCells('E1:G1');
		$excel->getActiveSheet()->mergeCells('E2:E3');
		$excel->getActiveSheet()->mergeCells('F2:F3');
		$excel->getActiveSheet()->mergeCells('G2:G3');
		$excel->getActiveSheet()->mergeCells('H1:J1');
		$excel->getActiveSheet()->mergeCells('H2:J2');
		$excel->getActiveSheet()->mergeCells('K1:R1');
		$excel->getActiveSheet()->mergeCells('K2:O2');
		$excel->getActiveSheet()->mergeCells('P2:T2');
		$excel->getActiveSheet()->mergeCells('U1:W1');
		$excel->getActiveSheet()->mergeCells('U2:U3');
		$excel->getActiveSheet()->mergeCells('V2:V3');
		$excel->getActiveSheet()->mergeCells('W2:W3');

		  
		$excel->getActiveSheet()->getStyle('A1:W3')->getAlignment()->applyFromArray(
			array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER)
		);
		
		/*Bold Huruf*/
		$excel->getActiveSheet()->getStyle('A1:W3')->getFont()->setBold(true);
		
		/*lebar kolom*/
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(39.0);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(12.0);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(8.0);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(5.0);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10.0);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(9.0);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(19.0);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('W')->setWidth(15.0);
		
		/*membuat garis*/		
		$excel->getActiveSheet()->getStyle('A1:W3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		/*Proses Write and read database ke excel*/
		$ex = $excel->setActiveSheetIndex(0);
		$hasil = $this->M_item->preview($from, $to) ;
		
		$lokasi_kolom = 4;
		$no = 1 ;
		foreach($hasil as $row)
		{
			$kode = $row->kode ;
			$tanggal = $row->tanggal ;
			$no_bc = $row->no_bc ;
			$det = $this->M_item->detail($kode, $from, $to) ;
						
			// tanggal begininng diambil 1 bulan sebelumnya
			$month_begining = date('m', strtotime('-1 MONTH', strtotime($from)));
			$year_begining ='';
			if($month_begining == '12'){
				$year_begining = date('Y', strtotime('-1 YEAR', strtotime($from)));
			}else{
					$year_begining = date('Y', strtotime($from));
				}	
						
			$tgl_begining = $year_begining.'-'.$month_begining.'-'.'01';
			$end_begining = $year_begining.'-'.$month_begining.'-'.'31';
			$beg 		  = $this->M_item->detail_begining($kode, $month_begining, $year_begining) ;
			$qty_beg 	  = $this->M_item->jml_qty_begining($kode, $month_begining, $year_begining);						
			$out 		  = $this->M_item->detail_out($kode, $from, $to) ;
			$in 		  = $this->M_item->detail_in($kode, $from, $to) ;
			$ng 		  = $this->M_item->detail_ng($kode, $from, $to) ;
			$end 		  = $this->M_item->detail_end($kode, $tgl_begining, $to) ;										
						
			$arr 		  = [count($beg),count($in),count($out),count($ng)];
			$baris 		  = max($arr);	
			$jmlh_stok	  = $qty_beg->jml_qty_begining + $det->jml_qty_in - $det->jml_qty_out - $det->jml_qty_ng;
			
			$ex->setCellValue("A".$lokasi_kolom,$row->item);
			$ex->setCellValue("B".$lokasi_kolom,$row->kode);
			$ex->setCellValue("C".$lokasi_kolom,$row->status);
			$ex->setCellValue("D".$lokasi_kolom,$row->unit);
			$ex->setCellValue("E".$lokasi_kolom,"");
			$ex->setCellValue("F".$lokasi_kolom,round($qty_beg->jml_qty_begining,2));
			$ex->setCellValue("G".$lokasi_kolom,"");
			$ex->setCellValue("H".$lokasi_kolom,"");
			$ex->setCellValue("I".$lokasi_kolom,round($det->jml_qty_in,2));
			$ex->setCellValue("J".$lokasi_kolom,"");
			$ex->setCellValue("K".$lokasi_kolom,"");
			$ex->setCellValue("L".$lokasi_kolom,round($det->jml_qty_out,2));
			$ex->setCellValue("M".$lokasi_kolom,"");
			$ex->setCellValue("N".$lokasi_kolom,"");
			$ex->setCellValue("O".$lokasi_kolom,"");
			$ex->setCellValue("P".$lokasi_kolom,"");
			$ex->setCellValue("Q".$lokasi_kolom,round($det->jml_qty_ng,2));
			$ex->setCellValue("R".$lokasi_kolom,"");
			$ex->setCellValue("S".$lokasi_kolom,"");
			$ex->setCellValue("T".$lokasi_kolom,"");
			$ex->setCellValue("U".$lokasi_kolom,"");
			$ex->setCellValue("V".$lokasi_kolom,round($jmlh_stok,2));
			$ex->setCellValue("W".$lokasi_kolom,"");
			
			/*membuat garis*/		
			$excel->getActiveSheet()->getStyle("A$lokasi_kolom:W$lokasi_kolom")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$lokasi_kolom++;
			
				for ($ii=0; $ii < count($beg) ; $ii++) 
				{ 
					$no_bc = $beg[$ii]->no_bc;						
					$det_qty = $this->M_item->jml_detail_qty_begining($kode, $no_bc, $month_begining, $year_begining);
					$stock =  $det_qty->jml_qty_in - $det_qty->jml_qty_out - $det_qty->jml_qty_ng;		
					$stock = round($stock,2);	
					
					$ex->setCellValue("A".$lokasi_kolom,"");
					$ex->setCellValue("B".$lokasi_kolom,"");
					$ex->setCellValue("C".$lokasi_kolom,"");
					$ex->setCellValue("D".$lokasi_kolom,"");
					
					if (array_key_exists($ii, $beg)) {
						if($stock != 0)
						{						
							$ex->setCellValue("E".$lokasi_kolom,$beg[$ii]->tanggal);
							$ex->setCellValue("F".$lokasi_kolom,round($beg[$ii]->qty,2));
							$ex->setCellValue("G".$lokasi_kolom,$beg[$ii]->no_bc);
						}else
							{
								$ex->setCellValue("E".$lokasi_kolom,"");
								$ex->setCellValue("F".$lokasi_kolom,"");
								$ex->setCellValue("G".$lokasi_kolom,"");
							}							
					}else
						{
							$ex->setCellValue("E".$lokasi_kolom,"");
							$ex->setCellValue("F".$lokasi_kolom,"");
							$ex->setCellValue("G".$lokasi_kolom,"");
						}	 
							
					
					$ex->setCellValue("H".$lokasi_kolom,"");
					$ex->setCellValue("I".$lokasi_kolom,"");
					$ex->setCellValue("J".$lokasi_kolom,"");
					$ex->setCellValue("K".$lokasi_kolom,"");
					$ex->setCellValue("L".$lokasi_kolom,"");
					$ex->setCellValue("M".$lokasi_kolom,"");
					$ex->setCellValue("N".$lokasi_kolom,"");
					$ex->setCellValue("O".$lokasi_kolom,"");
					$ex->setCellValue("P".$lokasi_kolom,"");
					$ex->setCellValue("Q".$lokasi_kolom,"");
					$ex->setCellValue("R".$lokasi_kolom,"");
					$ex->setCellValue("S".$lokasi_kolom,"");
					$ex->setCellValue("T".$lokasi_kolom,"");
					$ex->setCellValue("U".$lokasi_kolom,"");
					$ex->setCellValue("V".$lokasi_kolom,"");
					$ex->setCellValue("W".$lokasi_kolom,"");
					
					/*membuat garis*/		
					$excel->getActiveSheet()->getStyle("A$lokasi_kolom:W$lokasi_kolom")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$lokasi_kolom++;
				}
				
				for ($i=0; $i < $baris; $i++) { 
					$ex->setCellValue("A".$lokasi_kolom,"");
					$ex->setCellValue("B".$lokasi_kolom,"");
					$ex->setCellValue("C".$lokasi_kolom,"");
					$ex->setCellValue("D".$lokasi_kolom,"");
					$ex->setCellValue("E".$lokasi_kolom,"");
					$ex->setCellValue("F".$lokasi_kolom,"");
					$ex->setCellValue("G".$lokasi_kolom,"");
					
					if (array_key_exists($i, $in)) {
											
							$ex->setCellValue("H".$lokasi_kolom,$in[$i]->tanggal);
							$ex->setCellValue("I".$lokasi_kolom,round($in[$i]->qty,2));
							$ex->setCellValue("J".$lokasi_kolom,$in[$i]->no_bc);
											
					}else
						{
							$qty_in = 0 ;
							$ex->setCellValue("H".$lokasi_kolom,"");
							$ex->setCellValue("I".$lokasi_kolom,"");
							$ex->setCellValue("J".$lokasi_kolom,"");
						}
					
					if (array_key_exists($i, $out)) {
							$tgi = $this->M_item->get_tgl_in($kode, $out[$i]->no_bc) ;				
							$ex->setCellValue("K".$lokasi_kolom,$tgi->tanggal);
							$ex->setCellValue("L".$lokasi_kolom,round($out[$i]->qty,2));
							$ex->setCellValue("M".$lokasi_kolom,$out[$i]->no_bc);
							$ex->setCellValue("N".$lokasi_kolom,$out[$i]->kode_transaksi);
							$ex->setCellValue("O".$lokasi_kolom,$out[$i]->tanggal);
											
					}else
						{
							$qty_in = 0 ;
							$ex->setCellValue("K".$lokasi_kolom,"");
							$ex->setCellValue("L".$lokasi_kolom,"");
							$ex->setCellValue("M".$lokasi_kolom,"");
							$ex->setCellValue("N".$lokasi_kolom,"");
							$ex->setCellValue("O".$lokasi_kolom,"");
						}
						
					if (array_key_exists($i, $ng)) {
						if (array_key_exists($i, $in)) {	
							$tgi = $this->M_item->get_tgl_in($kode, $ng[$i]->no_bc) ;
							
							$ex->setCellValue("P".$lokasi_kolom,$tgi->tanggal);
							
						} 
						else{
								$tgi = $this->M_item->get_tgl_in($kode, $ng[$i]->no_bc) ;
								
								$ex->setCellValue("P".$lokasi_kolom,$tgi->tanggal);
								
							}
					}else
						{
							
							$ex->setCellValue("P".$lokasi_kolom,"");
							
						}
						
					if (array_key_exists($i, $ng)) {
						
						$qty_ng = round($ng[$i]->qty,2) ;
						$ex->setCellValue("Q".$lokasi_kolom,round($ng[$i]->qty,2));	
						$ex->setCellValue("R".$lokasi_kolom,$ng[$i]->no_bc);
						$ex->setCellValue("S".$lokasi_kolom,$ng[$i]->kode_transaksi);
						$ex->setCellValue("T".$lokasi_kolom, $ng[$i]->tanggal);	
					}else
						{
							$ex->setCellValue("Q".$lokasi_kolom,"");
							$ex->setCellValue("R".$lokasi_kolom,"");
							$ex->setCellValue("S".$lokasi_kolom,"");
							$ex->setCellValue("T".$lokasi_kolom, "");
							$qty_ng = 0 ;
						}
							
					if (array_key_exists($i, $end)) {
						/*jika stock 0 pada bulan sebelumnya, maka tidak ditampikan, jika stock 0 pada bulan laporan, maka ditampilkan*/
						$nb = $end[$i]->no_bc;
						$r = $this->M_item->jml_qty_end($kode,  $nb, $tgl_begining, $end_begining, $from,  $to) ;
						$total_end = $r->jml_qty_in - ($r->jml_qty_out_bln_beg + $r->jml_qty_out_bln_lap) - $r->jml_qty_ng;
						$out_bln_beg = $r->jml_qty_in - $r->jml_qty_out_bln_beg;
									
						if($out_bln_beg > 0){
							
							
							$ex->setCellValue("U".$lokasi_kolom, $end[$i]->tanggal);
							$ex->setCellValue("V".$lokasi_kolom, round($total_end,2));
							$ex->setCellValue("W".$lokasi_kolom, $end[$i]->no_bc);
						}else
							{
								$ex->setCellValue("U".$lokasi_kolom, "");
								$ex->setCellValue("V".$lokasi_kolom, "");
								$ex->setCellValue("W".$lokasi_kolom, "");
							}
						
						
					} 
					$excel->getActiveSheet()->getStyle("A$lokasi_kolom:W$lokasi_kolom")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$lokasi_kolom++;					
				}
			
		}
		
		/*Proses Penyimpanan*/
		$filename="laporan item.xls"; 
		ob_clean();
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
				
		$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');  
		
		$objWriter->save('php://output');							 
		
	}
	
	public function filter_excel($kode, $from, $to)
	{
		
		$hasil = $this->M_item->filter($kode, $from, $to) ;
		$row = $this->M_item->detail_item($kode) ;

		$data = array (
						'from' => $from,
						'to' => $to,		
						'hasil' => $hasil,
						'kode' => $kode,
						'item' => $row->item,

						) ;
		$this->load->view('content/laporan/item/excel', $data);

	}

	public function filter_excel_v2($kode, $from, $to)
	{
		
		include_once APPPATH.'/third_party/PHPExcel.php';
		$excel         = new PHPExcel();
		$excel->setActiveSheetIndex(0);
		//name the worksheet
		$excel->getActiveSheet()->setTitle('Laporan Item');
		
		/*Header*/
		$excel->getActiveSheet()->setCellValue('A1', "Item")
									 ->setCellValue('B1', "Code")
									 ->setCellValue('C1', "Status")
									 ->setCellValue('D1', "Unit")
									 ->setCellValue('E1', "Begining Stock")
									 ->setCellValue('E2', "")
									 ->setCellValue('E3', "Date")
									 ->setCellValue('F2', "")
									 ->setCellValue('F3', "Qty")
									 ->setCellValue('G2', "")
									 ->setCellValue('G3', "No Bc")
									 ->setCellValue('H1', "IN")
									 ->setCellValue('H2', "Suplier")
									 ->setCellValue('H3', "Date")
									 ->setCellValue('I3', "Qty")
									 ->setCellValue('J3', "No Bc")
									 ->setCellValue('K1', "OUT")
									 ->setCellValue('K2', "PRD By FIFO")
									 ->setCellValue('K3', "Date")
									 ->setCellValue('L3', "Qty")
									 ->setCellValue('M3', "No Bc")
									 ->setCellValue('N3', "Date Transaksi")
									 ->setCellValue('O2', "Suplier (NG) Custom By BC")
									 ->setCellValue('O3', "Date")
									 ->setCellValue('P3', "Qty")
									 ->setCellValue('Q3', "No Bc")
									 ->setCellValue('R3', "Date Transaksi")
									 ->setCellValue('S1', "Ending (All Stok)")
									 ->setCellValue('S3', "Date")
									 ->setCellValue('T3', "Qty")
									 ->setCellValue('U3', "No Bc");
									 
		/*Marge center*/
			
		$excel->getActiveSheet()->mergeCells('A1:A3');
		$excel->getActiveSheet()->mergeCells('B1:B3');
		$excel->getActiveSheet()->mergeCells('C1:C3');
		$excel->getActiveSheet()->mergeCells('D1:D3');
		$excel->getActiveSheet()->mergeCells('E1:G1');
		$excel->getActiveSheet()->mergeCells('H1:J1');
		$excel->getActiveSheet()->mergeCells('H2:J2');
		$excel->getActiveSheet()->mergeCells('K1:R1');
		$excel->getActiveSheet()->mergeCells('K2:N2');
		$excel->getActiveSheet()->mergeCells('O2:R2');
		$excel->getActiveSheet()->mergeCells('S1:U1');
		  
		$excel->getActiveSheet()->getStyle('A1:U3')->getAlignment()->applyFromArray(
			array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER)
		);
		
		/*Bold Huruf*/
		$excel->getActiveSheet()->getStyle('A1:U3')->getFont()->setBold(true);
		
		/*lebar kolom*/
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(39.0);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(12.0);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(8.0);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(5.0);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10.0);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(9.0);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(9.0);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(15.0);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(15.0);
		
		/*membuat garis*/		
		$excel->getActiveSheet()->getStyle('A1:U3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		
		/*Proses Write and read database ke excel*/
		$ex = $excel->setActiveSheetIndex(0);
		$hasil = $this->M_item->filter($kode, $from, $to);
		
		$lokasi_kolom = 4;
		$no = 1 ;
		foreach($hasil as $row)
		{
			$kode = $row->kode ;
			$tanggal = $row->tanggal ;
			$no_bc = $row->no_bc ;
			$det = $this->M_item->detail($kode, $from, $to) ;
						
			// tanggal begininng diambil 1 bulan sebelumnya
			$month_begining = date('m', strtotime('-1 MONTH', strtotime($from)));
			$year_begining ='';
			if($month_begining == '12'){
				$year_begining = date('Y', strtotime('-1 YEAR', strtotime($from)));
			}else{
					$year_begining = date('Y', strtotime($from));
				}	
						
			$tgl_begining = $year_begining.'-'.$month_begining.'-'.'01';
			$end_begining = $year_begining.'-'.$month_begining.'-'.'31';
			$beg 		  = $this->M_item->detail_begining($kode, $month_begining, $year_begining) ;
			$qty_beg 	  = $this->M_item->jml_qty_begining($kode, $month_begining, $year_begining);						
			$out 		  = $this->M_item->detail_out($kode, $from, $to) ;
			$in 		  = $this->M_item->detail_in($kode, $from, $to) ;
			$ng 		  = $this->M_item->detail_ng($kode, $from, $to) ;
			$end 		  = $this->M_item->detail_end($kode, $tgl_begining, $to) ;										
						
			$arr 		  = [count($beg),count($in),count($out),count($ng)];
			$baris 		  = max($arr);	
			$jmlh_stok	  = $qty_beg->jml_qty_begining + $det->jml_qty_in - $det->jml_qty_out - $det->jml_qty_ng;
			
			$ex->setCellValue("A".$lokasi_kolom,$row->item);
			$ex->setCellValue("B".$lokasi_kolom,$row->kode);
			$ex->setCellValue("C".$lokasi_kolom,$row->status);
			$ex->setCellValue("D".$lokasi_kolom,$row->unit);
			$ex->setCellValue("E".$lokasi_kolom,"");
			$ex->setCellValue("F".$lokasi_kolom,round($qty_beg->jml_qty_begining,2));
			$ex->setCellValue("G".$lokasi_kolom,"");
			$ex->setCellValue("H".$lokasi_kolom,"");
			$ex->setCellValue("I".$lokasi_kolom,round($det->jml_qty_in,2));
			$ex->setCellValue("J".$lokasi_kolom,"");
			$ex->setCellValue("K".$lokasi_kolom,"");
			$ex->setCellValue("L".$lokasi_kolom,round($det->jml_qty_out,2));
			$ex->setCellValue("M".$lokasi_kolom,"");
			$ex->setCellValue("N".$lokasi_kolom,"");
			$ex->setCellValue("O".$lokasi_kolom,"");
			$ex->setCellValue("P".$lokasi_kolom,round($det->jml_qty_ng,2));
			$ex->setCellValue("Q".$lokasi_kolom,"");
			$ex->setCellValue("R".$lokasi_kolom,"");
			$ex->setCellValue("S".$lokasi_kolom,"");
			$ex->setCellValue("T".$lokasi_kolom,round($jmlh_stok,2));
			$ex->setCellValue("U".$lokasi_kolom,"");
			
			/*membuat garis*/		
			$excel->getActiveSheet()->getStyle("A$lokasi_kolom:U$lokasi_kolom")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$lokasi_kolom++;
			
				for ($ii=0; $ii < count($beg) ; $ii++) 
				{ 
					$no_bc = $beg[$ii]->no_bc;						
					$det_qty = $this->M_item->jml_detail_qty_begining($kode, $no_bc, $month_begining, $year_begining);
					$stock =  $det_qty->jml_qty_in - $det_qty->jml_qty_out - $det_qty->jml_qty_ng;		
					$stock = round($stock,2);	
					
					$ex->setCellValue("A".$lokasi_kolom,"");
					$ex->setCellValue("B".$lokasi_kolom,"");
					$ex->setCellValue("C".$lokasi_kolom,"");
					$ex->setCellValue("D".$lokasi_kolom,"");
					
					if (array_key_exists($ii, $beg)) {
						if($stock != 0)
						{						
							$ex->setCellValue("E".$lokasi_kolom,$beg[$ii]->tanggal);
							$ex->setCellValue("F".$lokasi_kolom,round($beg[$ii]->qty,2));
							$ex->setCellValue("G".$lokasi_kolom,$beg[$ii]->no_bc);
						}else
							{
								$ex->setCellValue("E".$lokasi_kolom,"");
								$ex->setCellValue("F".$lokasi_kolom,"");
								$ex->setCellValue("G".$lokasi_kolom,"");
							}							
					}else
						{
							$ex->setCellValue("E".$lokasi_kolom,"");
							$ex->setCellValue("F".$lokasi_kolom,"");
							$ex->setCellValue("G".$lokasi_kolom,"");
						}	 
							
					
					$ex->setCellValue("H".$lokasi_kolom,"");
					$ex->setCellValue("I".$lokasi_kolom,"");
					$ex->setCellValue("J".$lokasi_kolom,"");
					$ex->setCellValue("K".$lokasi_kolom,"");
					$ex->setCellValue("L".$lokasi_kolom,"");
					$ex->setCellValue("M".$lokasi_kolom,"");
					$ex->setCellValue("N".$lokasi_kolom,"");
					$ex->setCellValue("O".$lokasi_kolom,"");
					$ex->setCellValue("P".$lokasi_kolom,"");
					$ex->setCellValue("Q".$lokasi_kolom,"");
					$ex->setCellValue("R".$lokasi_kolom,"");
					$ex->setCellValue("S".$lokasi_kolom,"");
					$ex->setCellValue("T".$lokasi_kolom,"");
					$ex->setCellValue("U".$lokasi_kolom,"");
					
					/*membuat garis*/		
					$excel->getActiveSheet()->getStyle("A$lokasi_kolom:U$lokasi_kolom")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$lokasi_kolom++;
				}
				
				for ($i=0; $i < $baris; $i++) { 
					$ex->setCellValue("A".$lokasi_kolom,"");
					$ex->setCellValue("B".$lokasi_kolom,"");
					$ex->setCellValue("C".$lokasi_kolom,"");
					$ex->setCellValue("D".$lokasi_kolom,"");
					$ex->setCellValue("E".$lokasi_kolom,"");
					$ex->setCellValue("F".$lokasi_kolom,"");
					$ex->setCellValue("G".$lokasi_kolom,"");
					
					if (array_key_exists($i, $in)) {
											
							$ex->setCellValue("H".$lokasi_kolom,$in[$i]->tanggal);
							$ex->setCellValue("I".$lokasi_kolom,round($in[$i]->qty,2));
							$ex->setCellValue("J".$lokasi_kolom,$in[$i]->no_bc);
											
					}else
						{
							$qty_in = 0 ;
							$ex->setCellValue("H".$lokasi_kolom,"");
							$ex->setCellValue("I".$lokasi_kolom,"");
							$ex->setCellValue("J".$lokasi_kolom,"");
						}
					
					if (array_key_exists($i, $out)) {
							$tgi = $this->M_item->get_tgl_in($kode, $out[$i]->no_bc) ;				
							$ex->setCellValue("K".$lokasi_kolom,$tgi->tanggal);
							$ex->setCellValue("L".$lokasi_kolom,round($out[$i]->qty,2));
							$ex->setCellValue("M".$lokasi_kolom,$out[$i]->no_bc);
							$ex->setCellValue("N".$lokasi_kolom,$out[$i]->tanggal);
											
					}else
						{
							$qty_in = 0 ;
							$ex->setCellValue("K".$lokasi_kolom,"");
							$ex->setCellValue("L".$lokasi_kolom,"");
							$ex->setCellValue("M".$lokasi_kolom,"");
							$ex->setCellValue("N".$lokasi_kolom,"");
						}
						
					if (array_key_exists($i, $ng)) {
						if (array_key_exists($i, $in)) {	
							$tgi = $this->M_item->get_tgl_in($kode, $ng[$i]->no_bc) ;
							$ex->setCellValue("O".$lokasi_kolom,$tgi->tanggal);
							
						} 
						else{
								$tgi = $this->M_item->get_tgl_in($kode, $ng[$i]->no_bc) ;
								$ex->setCellValue("O".$lokasi_kolom,$tgi->tanggal);
								
							}
					}else
						{
							$ex->setCellValue("O".$lokasi_kolom,"");
						}
						
					if (array_key_exists($i, $ng)) {
						$ex->setCellValue("P".$lokasi_kolom,round($ng[$i]->qty,2));
						$qty_ng = round($ng[$i]->qty,2) ;
						$ex->setCellValue("Q".$lokasi_kolom,$ng[$i]->no_bc);	
						$ex->setCellValue("R".$lokasi_kolom,$ng[$i]->tanggal);	
					}else
						{
							$ex->setCellValue("P".$lokasi_kolom,"");
							$ex->setCellValue("Q".$lokasi_kolom,"");
							$ex->setCellValue("R".$lokasi_kolom,"");
							$qty_ng = 0 ;
						}
							
					if (array_key_exists($i, $end)) {
						/*jika stock 0 pada bulan sebelumnya, maka tidak ditampikan, jika stock 0 pada bulan laporan, maka ditampilkan*/
						$nb = $end[$i]->no_bc;
						$r = $this->M_item->jml_qty_end($kode,  $nb, $tgl_begining, $end_begining, $from,  $to) ;
						$total_end = $r->jml_qty_in - ($r->jml_qty_out_bln_beg + $r->jml_qty_out_bln_lap) - $r->jml_qty_ng;
						$out_bln_beg = $r->jml_qty_in - $r->jml_qty_out_bln_beg;
									
						if($out_bln_beg > 0){
							$ex->setCellValue("S".$lokasi_kolom,$end[$i]->tanggal);
							$ex->setCellValue("T".$lokasi_kolom, round($total_end,2));
							$ex->setCellValue("U".$lokasi_kolom, $end[$i]->no_bc);
						}else
							{
								$ex->setCellValue("S".$lokasi_kolom,"");
								$ex->setCellValue("T".$lokasi_kolom, "");
								$ex->setCellValue("U".$lokasi_kolom, "");
							}
						
						
					} 
					$excel->getActiveSheet()->getStyle("A$lokasi_kolom:U$lokasi_kolom")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$lokasi_kolom++;					
				}
			
		}
		
		/*Proses Penyimpanan*/
		$filename="laporan item.xls"; 
		ob_clean();
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); 
				
		$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');  
		
		$objWriter->save('php://output');							 
		
	}
	
}
