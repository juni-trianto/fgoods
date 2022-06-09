
<div class="card shadow mb-4">
	
	<div class="card-header py-3 text-center" >
		<h3 style="font-weight: bold;"><?php echo $title; ?></h3>
		</a>
	</div>
		<div class="col-md-12 row justify-content-center">
			

			</div>
	<div class="col-md-12 row mt-2">
		
			<div class="col-md-8">
				<div style="font-family: 'Tahoma'; font-size: 12px;">
					From : <?php echo $from ; ?> <br>
					To : <?php echo $to ; ?> <br>
				</div>

	            <button id="filter_excel" class="btn btn-success btn-sm float-left mt-3">
	                <i class="fas fa-download fa-sm text-white-50"></i>
	                Export Excel
	            </button>
			</div>
			<div class="col-md-4">
				
					<div class="form-group col-md-12 p-0" >
				      
				     
				         <div class="input-group input-group-sm ">
				            <div class="input-group-prepend col-md-4 p-0">
				            	<input type="hidden" id="from" value="<?php echo $from ; ?>">
				            	<input type="hidden" id="to" value="<?php echo $to ; ?>">
				              <input type="text" id="kode" name="kode" class="form-control form-control-sm" value="<?php echo $kode ; ?>" readonly>
				            </div>
				            <input type="text" id="item" name="item" class="form-control" value="<?php echo $item ; ?>" readonly>
				            <div class="input-group-append">

				                <button type="button" class="btn btn-success input-group-text" id="browse-material"><i class="fa fa-ellipsis-v"></i></button>
				                         
				            </div>
				          </div>
				  </div>

					<div class="form-group col-md-12 p-0 text-right" >
                            <button id="reset" class="btn btn-info btn-sm ">
                                <i class="fas fa-power-off fa-sm text-white-50"></i>
                                Reset
                            </button>
                            <button id="filter" class="btn btn-primary btn-sm ">
                                <i class="fas fa-filter fa-sm text-white-50"></i>
                                Filter
                            </button>
				  </div>
			</div>

	</div>
	  

	<div class="card-body">
		<div class="table-responsive">
			<div class="col-md-12 p-0">
				
			</div>
			<table class="table table-bordered table-sm" width="100%" cellspacing="0" style="font-family: tahoma; font-size: 10px;">
				
				<tr>
		            <th class="bg-gradient-primary text-white" rowspan="3" style="
    													background-color: #1cc88a;
   														 background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%);
    													background-size: cover;text-align: center;vertical-align: middle;">Item</th>
		            <th class="bg-gradient-primary text-white" rowspan="3" style="
    													background-color: #1cc88a;
   														 background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%);text-align: center;vertical-align: middle;">Code</th>
		            <th class="bg-gradient-primary text-white" rowspan="3" style="
    													background-color: #1cc88a;
   														 background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%);text-align: center;vertical-align: middle;">status</th>
		            <th class="bg-gradient-primary text-white" rowspan="3" style="
    													background-color: #1cc88a;
   														 background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%);text-align: center;vertical-align: middle;">Unit</th>
		            <th class="bg-gradient-success text-white" colspan="3" style="
		            									background-color: #1cc88a;
		            									background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
		            										: middle;">Beginning Stock</th>
		            <th class="bg-gradient-warning text-white" colspan="3" style="
		            									background-color: #1cc88a;
		            									background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%);text-align: center;vertical-align
		            										: middle;">IN</th>
		            <th class="bg-gradient-info text-white" colspan="10" style="
		            									background-color: #1cc88a;
		            									background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%);text-align: center;vertical-align
		    											: middle;">OUT</th>
		            <th class="bg-gradient-success text-white


		            " colspan="3" style="
		            					background-color: #1cc88a;
		            					background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
		            					: center;vertical-align: middle;">Ending (All Stok)</th>
				</tr> 
				<tr>
		            <th class="bg-gradient-success text-white" colspan="" style="
		            					 background-color: #1cc88a;
		            					background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align">
		            					</th>
		            <th class="bg-gradient-success text-white" colspan="" style="
		            					background-color: #1cc88a;
		            					background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align">
		            					</th>
		        	<th class="bg-gradient-success text-white" colspan="" style="
		        						background-color: #1cc88a;
		            					background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align">
		            					</th>
		            <th class="bg-gradient-warning text-white" colspan="3" style="
		            								background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
		            								: center;">Suplier</th>

					<th class="bg-gradient-danger text-white" colspan="5" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">PRD By FIFO</th>
					<th class="bg-gradient-info text-white"  colspan="5" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Suplier (NG) Custom By BC</th>

		            <th class="bg-gradient-success text-white" colspan="" style="	
		           									 background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align">
		   								            </th>
		            <th class="bg-gradient-success text-white" colspan="" style="	
		            								 background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align">
		     										</th>
		            <th class="bg-gradient-success text-white" colspan="" style="
		             								background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align">
		            								</th>
				</tr>
				<tr>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Date</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Qty</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Bc No</th>
					<th class="bg-gradient-warning text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Date</th>
					<th class="bg-gradient-warning text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Qty</th>
					<th class="bg-gradient-warning text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">BC No</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Date</th>
					<th class="bg-gradient-warning text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Qty</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">BC No</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Ts Code</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Transaction Date</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Date</th>
					<th class="bg-gradient-warning text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Qty</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">No Bc</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Ts Code</th>
					<th class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Transaction Date</th>
					<th  class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Date</th>
					<th  class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Qty</th>
					<th  class="bg-gradient-success text-white" style="
													background-color: #1cc88a;
		            								background-image: linear-gradient(180deg,#1cc88a 10%,#1cc88a 100%); text-align: center;vertical-align
													: center;">Bc No</th>
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
							<?php echo  $row->Date; ?>
						</td>
						<td style="text-align: center;">
							<?php echo round($qty_beg->jml_qty_begining,2) ; ?>
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
							<?php echo round($det->jml_qty_in,2) ; ?>
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
							
						</td>
						<td style="text-align: center;">
							<?php echo round($det->jml_qty_out,2) ; ?>
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
							<?php echo round($det->jml_qty_ng,2) ; ?>
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
								$jmlh_stok=$qty_beg->jml_qty_begining + $det->jml_qty_in - $det->jml_qty_out - $det->jml_qty_ng;
								echo round($jmlh_stok,2);
							?> 
						</td>
						<td style="text-align: center;">
							
						</td>

					</tr>


					<?php 
						for ($ii=0; $ii < count($beg) ; $ii++) { 
							$no_bc = $beg[$ii]->no_bc;						
							$det_qty = $this->M_item->jml_detail_qty_begining($kode, $no_bc, $month_begining, $year_begining);
							$stock =  $det_qty->jml_qty_in - $det_qty->jml_qty_out - $det_qty->jml_qty_ng;		
							$stock = round($stock,2);							
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
									echo round($beg[$ii]->qty,2) ;
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
						for ($i=0; $i < $baris; $i++) { 												

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
								   echo round($in[$i]->qty,2) ;
								   $qty_in = round($in[$i]->qty,2) ;
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
								   echo round($out[$i]->qty,2) ;
								   $qty_out = round($out[$i]->qty,2) ;
								} 
								else{
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
							if (array_key_exists($i, $out)) {
									echo $out[$i]->kode_transaksi ;
								} 
							?>
						</td>
						<td style="text-align: center;">
							<?php 
							if (array_key_exists($i, $out)) {
								   echo $out[$i]->tanggal ;
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
									else{
										$tgi = $this->M_item->get_tgl_in($kode, $ng[$i]->no_bc) ;
										echo $tgi->tanggal ;
									}
								} 
							?>
						</td>
						<td style="text-align: center;">
							<?php 
							if (array_key_exists($i, $ng)) {
								   echo round($ng[$i]->qty,2) ;
								   $qty_ng = round($ng[$i]->qty,2) ;
								} 
								else{
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
							if (array_key_exists($i, $ng)) {
									echo $ng[$i]->kode_transaksi ;
								} 
							?>
						</td>
						<td style="text-align: center;">
							<?php 
							if (array_key_exists($i, $ng)) {
									echo $ng[$i]->tanggal ;
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
										echo round($total_end,2);
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
				</tbody>
			</table>

		</div>
	</div>

</div>



<div class="modal" id="modal-warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning..!!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
              
              <div class="col-md-12 text-center text-primary mt-2">
                <div class="alert alert-danger" id="warning">
                  
                </div>
              </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>


<div class="modal " id="modal-material" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Select Material Data</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">              
              <div id="data_material">
                
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-info" type="button" data-dismiss="modal">Done</button>
          </div>
      </div>
    </div>
</div>

