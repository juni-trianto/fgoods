
<div class="card shadow mb-4">
	
	<div class="card-header py-3 text-center" >
		<h3 style="font-weight: bold;"><?php echo $title ; ?></h3>
		</a>
	</div>

	<div class="card-header py-3">
		
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<div class="col-md-12 p-0">
				
			</div>
			<table class="table table-bordered table-sm" width="100%" cellspacing="0" style="font-family: tahoma; font-size: 10px;">
				
				<tr>
		            <th class="bg-gradient-primary text-white" rowspan="3" style="text-align: center;vertical-align: middle;">Item</th>
		            <th class="bg-gradient-primary text-white" rowspan="3" style="text-align: center;vertical-align: middle;">Code</th>
		            <th class="bg-gradient-primary text-white" rowspan="3" style="text-align: center;vertical-align: middle;">status</th>
		            <th class="bg-gradient-primary text-white" rowspan="3" style="text-align: center;vertical-align: middle;">Unit</th>
		            <th class="bg-gradient-success text-white" colspan="3" style="text-align: center;vertical-align: middle;">Beginning Stock</th>
		            <th class="bg-gradient-warning text-white" colspan="3" style="text-align: center;vertical-align: middle;">IN</th>
		            <th class="bg-gradient-info text-white" colspan="6" style="text-align: center;vertical-align: middle;">OUT</th>
		            <th class="bg-gradient-success text-white" colspan="3" style="text-align: center;vertical-align: middle;">Ending (All Stok)</th>
				</tr> 
				<tr>
		            <th class="bg-gradient-success text-white"></th>
		            <th class="bg-gradient-success text-white"></th>
		            <th class="bg-gradient-success text-white"></th>
		            <th class="bg-gradient-warning text-white" colspan="3" style="text-align: center;">Suplier</th>

					<th class="bg-gradient-danger text-white" colspan="3" style="text-align: center;">PRD By FIFO</th>
					<th class="bg-gradient-info text-white"  colspan="3" style="text-align: center;">Suplier (NG) Custom By BC</th>

		            <th class="bg-gradient-success text-white"></th>
		            <th class="bg-gradient-success text-white"></th>
		            <th class="bg-gradient-success text-white"></th>
				</tr>
				<tr>
					<th class="bg-gradient-success text-white" style="text-align: center;">Date</th>
					<th class="bg-gradient-success text-white" style="text-align: center;">Qty</th>
					<th class="bg-gradient-success text-white" style="text-align: center;">No Bc</th>
					
					<th class="bg-gradient-warning text-white" style="text-align: center;">Date</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Qty</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">No Bc</th>

					<th class="bg-gradient-success text-white" style="text-align: center;">Date</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Qty</th>
					<th class="bg-gradient-success text-white" style="text-align: center;">No Bc</th>

					<th class="bg-gradient-success text-white" style="text-align: center;">Date</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Qty</th>
					<th class="bg-gradient-success text-white" style="text-align: center;">No Bc</th>

					<th  class="bg-gradient-success text-white" style="text-align: center;">Date</th>
					<th  class="bg-gradient-success text-white" style="text-align: center;">Qty</th>
					<th  class="bg-gradient-success text-white" style="text-align: center;">No Bc</th>
				</tr>

				<tbody style="border: 0px #fff solid;">
					<?php 
						$no = 1 ;
						foreach($hasil as $row)
						{
						$kode = $row->kode ;
						$tanggal = $row->tanggal ;
						$no_bc = $row->no_bc ;
						$det = $this->M_item->detail($kode, $from, $to) ;
						$tgl_begining = date('m', strtotime('-1 MONTH', strtotime($from))); 
						$beg = $this->M_item->detail_begining($kode, $tgl_begining) ;
						$out = $this->M_item->detail_out($kode, $from, $to) ;
						$in = $this->M_item->detail_in($kode, $from, $to) ;
						$ng = $this->M_item->detail_ng($kode, $from, $to) ;

						$arr = [count($in),count($out),count($ng)];
						$baris = max($arr);
						
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
							<?php echo $det->qty_begining; ?>
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
							<!-- <?php echo $row->qty_begining + $row->jml_qty_in - $row->jml_qty_out - $row->jml_qty_ng ; ?> -->
						</td>
						<td style="text-align: center;">
							
						</td>

					</tr>
					<!-- =============================================== -->
					<?php 
						foreach ($hasil as $row) {
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
							
						</td>
						<td style="text-align: center;">
							
						</pre>
						</td>

					</tr>
					<?php } ?>
					<!-- ======================================================================== -->


					<?php } ?>
				</tbody>
			</table>

		</div>
	</div>

</div>

<div class="modal " id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="data-konfirmasi">
            	
            </div>
        </div>
    </div>
<pre>
	
    
</pre>