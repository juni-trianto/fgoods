<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Item.xls");
?>

<style type="text/css">
	table
	{
		border-collapse: collapse;
	}
	th
	{
		border: 1px #000 solid;
		border-collapse: collapse;
	}
	td
	{
		border: 1px #000 solid;
		border-collapse: collapse;
	}
</style>
<table class="table table-bordered table-sm" width="100%" style="font-family: tahoma; font-size: 10px;">
				
	<tr>
        <th rowspan="3" style="text-align: center;vertical-align: middle;">Item</th>
        <th rowspan="3" style="text-align: center;vertical-align: middle;">Code</th>
        <th rowspan="3" style="text-align: center;vertical-align: middle;">status</th>
        <th rowspan="3" style="text-align: center;vertical-align: middle;">Unit</th>
        <th colspan="3" style="text-align: center;vertical-align: middle;">Beginning Stock</th>
        <th colspan="3" style="text-align: center;vertical-align: middle;">IN</th>
        <th colspan="6" style="text-align: center;vertical-align: middle;">OUT</th>
        <th colspan="3" style="text-align: center;vertical-align: middle;">Ending (All Stok)</th>
	</tr> 
	<tr>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="3" style="text-align: center;">Suplier</th>

		<th colspan="3" style="text-align: center;">PRD By FIFO</th>
		<th  colspan="3" style="text-align: center;">Suplier (NG) Custom By BC</th>

        <th></th>
        <th></th>
        <th></th>
	</tr>
	<tr>
		<th style="text-align: center;">Date</th>
		<th style="text-align: center;">Qty</th>
		<th style="text-align: center;">No Bc</th>
		
		<th style="text-align: center;">Date</th>
		<th style="text-align: center;">Qty</th>
		<th style="text-align: center;">No Bc</th>

		<th style="text-align: center;">Date</th>
		<th style="text-align: center;">Qty</th>
		<th style="text-align: center;">No Bc</th>

		<th style="text-align: center;">Date</th>
		<th style="text-align: center;">Qty</th>
		<th style="text-align: center;">No Bc</th>

		<th  style="text-align: center;">Date</th>
		<th  style="text-align: center;">Qty</th>
		<th  style="text-align: center;">No Bc</th>
	</tr>

	
		<?php 
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
			}
			else{
				$year_begining = date('Y', strtotime($from));
			}	
			
			$tgl_begining = $year_begining.'-'.$month_begining.'-'.'01';
			$end_begining = $year_begining.'-'.$month_begining.'-'.'31';
			$beg = $this->M_item->detail_begining($kode, $month_begining, $year_begining) ;
			$qty_beg = $this->M_item->jml_qty_begining($kode, $month_begining, $year_begining);						
			$out = $this->M_item->detail_out($kode, $from, $to) ;
			$in = $this->M_item->detail_in($kode, $from, $to) ;
			$ng = $this->M_item->detail_ng($kode, $from, $to) ;
			$end = $this->M_item->detail_end($kode, $tgl_begining, $to) ;										
			
			$arr = [count($beg),count($in),count($out),count($ng)];
			$baris = count($end);
			
		?>
		<tr>
			
			<td>
				<?php echo $row->item; ?>
			</td>
			<td  style="text-align: center;">
				<?php echo $row->kode; ?>
			</td>
			<td style="text-align: center;">
				<?php echo $row->status; ?>
			</td>
			<td style="text-align: center;">
				<?php echo $row->unit; ?>
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				<?php echo $qty_beg->jml_qty_begining ; ?>
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				<?php echo $det->jml_qty_in ; ?>
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				<?php echo $det->jml_qty_out ; ?>
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				<?php echo $det->jml_qty_ng ; ?>
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				<?php echo $qty_beg->jml_qty_begining + $det->jml_qty_in - $det->jml_qty_out - $det->jml_qty_ng ; ?> 
			</td>
			<td style="text-align: center;">
				
			</td>

		</tr>


					<?php 
						for ($ii=0; $ii < count($beg) ; $ii++) { 
							$no_bc = $beg[$ii]->no_bc;						
							$det_qty = $this->M_item->jml_detail_qty_begining($kode, $no_bc, $month_begining, $year_begining);
							$stock =  $det_qty->jml_qty_in - $det_qty->jml_qty_out - $det_qty->jml_qty_ng;	
							

					?>
					<tr>
						
						<td>
							
						</td>
						<td  style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
							<?php 
							if (array_key_exists($ii, $beg)) {
								if($stock != 0){
									echo $beg[$ii]->tanggal ;
								}  
							} 
							?>
						</td>
						<td style="text-align: center;">
							<?php 
							if (array_key_exists($ii, $beg)) {
								if($stock != 0){
									echo $beg[$ii]->qty ;
								}  
							} 
							?>
						</td>
						<td style="text-align: center;">
							<?php 
							if (array_key_exists($ii, $beg)) {
								if($stock != 0){
									echo $beg[$ii]->no_bc ;
								}
							} 
							?>
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
						
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
						
						</td>
						<td style="text-align: center;">
						
						</td>
						<td style="text-align: center;">
						
						</td>
						<td style="text-align: center;">
						
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
							<?php 
							/*if (array_key_exists($ii, $beg)) {
								   echo $beg[$ii]->tanggal ;
								} */
							?>
						</td>
						<td style="text-align: center;">
							<?php 
							/*if (array_key_exists($ii, $beg)) {
								   echo $beg[$ii]->qty ;
								} */
							?>
						</td>
						<td style="text-align: center;">
							<?php 
							/*if (array_key_exists($ii, $beg)) {
								   echo $beg[$ii]->no_bc ;
								} */
							?>
						</td>

					</tr>
					<?php } ?>

		<!-- =============================================== -->
		<?php 
			for ($i=0; $i < $baris ; $i++) { 

		?>
		<tr>
			
			<td>
				
			</td>
			<td  style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $in)) {
					   echo $in[$i]->tanggal ;
					} 
				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $in)) {
					   echo $in[$i]->qty ;
					   $qty_in = $in[$i]->qty ;
					} 
					else
					{
						$qty_in = 0 ;
					}
				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $in)) {
					   echo $in[$i]->no_bc ;
					} 
				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $out)) {								   
						$tgi = $this->M_item->get_tgl_in($kode, $out[$i]->no_bc) ;
						echo $tgi->tanggal ;									
					} 
				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $out)) {
					   echo $out[$i]->qty ;
					   $qty_out = $out[$i]->qty ;
					} 
					else
					{
						$qty_out = 0 ;
					}
				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $out)) {
					   echo $out[$i]->no_bc ;
					} 
				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $ng)) {								   
						
						if (array_key_exists($i, $in)) {	
							$tgi = $this->M_item->get_tgl_in($kode, $ng[$i]->no_bc) ;
							echo $tgi->tanggal ;
							} 
						else
						{
							$tgi = $this->M_item->get_tgl_in($kode, $ng[$i]->no_bc) ;
							echo $tgi->tanggal ;
						}
					} 
				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $ng)) {
					   echo $ng[$i]->qty ;
					   $qty_ng = $ng[$i]->qty ;
					} 
					else
					{
						$qty_ng = 0 ;
					}

				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $ng)) {
					   echo $ng[$i]->no_bc ;
					} 
				?>
			</td>
			<td style="text-align: center;">
				<?php 
					if (array_key_exists($i, $end)) {
						/*jika stock 0 pada bulan sebelumnya, maka tidak ditampikan, jika stock 0 pada bulan laporan, maka ditampilkan*/
						
						$nb = $end[$i]->no_bc;
						$r = $this->M_item->jml_qty_end($kode,  $nb, $tgl_begining, $end_begining, $from,  $to) ;
						$total_end = $r->jml_qty_in - ($r->jml_qty_out_bln_beg + $r->jml_qty_out_bln_lap) - $r->jml_qty_ng;
						$out_bln_beg = $r->jml_qty_in - $r->jml_qty_out_bln_beg;
						
						if($out_bln_beg > 0){
							echo $end[$i]->tanggal ;
						}									
					} 
				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $end)) {									
						if($out_bln_beg > 0){
							echo $total_end;
						}
					}
				?>
			</td>
			<td style="text-align: center;">
				<?php 
				if (array_key_exists($i, $end)) {
						if($out_bln_beg > 0){
							echo $end[$i]->no_bc ;
						}
					} 
				?>
				
			</td>

		</tr>
		<?php } ?>
		<!-- ======================================================================== -->


		<?php } ?>
	
</table>