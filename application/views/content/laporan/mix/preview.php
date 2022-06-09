
<div class="card shadow mb-4">
	
	<div class="card-header py-3 text-center" >
		<h3 style="font-weight: bold;"><?php echo $title ; ?></h3>
		</a>
	</div>

	<div class="card-header row py-3">
		<div class="col-md-6 p-3">
            <div class="col-md-12 p-3" style="border: 1px #ddd solid;">
              <h4>
                Laporan Per MIX
              </h4>
              <p>
                Periode <?php echo getBulan($bulan) ; ?> <?php echo $tahun ; ?>
               </p>
               <p>
                 Tanggal : <?php echo tgl_indo($from) ; ?> - <?php echo tgl_indo($to) ; ?>
               </p>
                  


            </div>
		</div>

        <div class="col-md-6 p-3">
            <div class="col-md-12 p-3" style="border: 1px #ddd solid;">

                  <label class="mb-3">Pilih Periode</label>

                      <div class="form-group col-md-12 p-0" >
                          
                         <div class="input-group p-0" >

                              <div class="col-md-5 p-0 " >
                                  <input id="from" type="date" class="form-control form-control-sm" value="<?php echo $from ; ?>" >
                              </div>

                              <div class="col-md-2 p-0 text-center" >
                                  Sampai
                              </div>
                              
                              <div class="col-md-5 p-0" >
                                  <input id="to" type="date" class="form-control form-control-sm" value="<?php echo $to ; ?>" >
                              </div>
                          </div>
                      </div>

                      <div class="form-group col-md-12 p-0 mb-0 text-right" >
                            <button id="preview" class="btn btn-primary btn-sm ">
                                <i class="fas fa-search fa-sm text-white-50"></i>
                                Preview
                            </button>
                      </div>


                </div>
        </div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<div class="col-md-12 p-0">
				
			</div>
			<table class="table table-bordered table-sm" width="100%" cellspacing="0" style="font-family: tahoma; font-size: 10px;">
				
				<tr>
		            <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">No</th>
		            <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">Description</th>
		            <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">Item Code</th>
		            <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">Unit</th>
		            <th class="bg-gradient-warning text-white" colspan="4" style="text-align: center;vertical-align: middle;">Beginning Stock</th>
		            <th class="bg-gradient-warning text-white" colspan="4" style="text-align: center;vertical-align: middle;">IN</th>
		            <th class="bg-gradient-warning text-white" colspan="5" style="text-align: center;vertical-align: middle;">OUT</th>
		            <th class="bg-gradient-warning text-white" colspan="6" style="text-align: center;vertical-align: middle;">Ending</th>
				</tr> 
				<tr>
					<th class="bg-gradient-warning text-white" style="text-align: center;">No</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Date</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Total</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">End Stock</th>

					<th class="bg-gradient-warning text-white" style="text-align: center;">No</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Tgl</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Impor, Local.Etc</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">End Stock</th>

					<th class="bg-gradient-warning text-white" style="text-align: center;">Prod</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Date BC</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Qty</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Date BC</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Qty</th>
					
					<th class="bg-gradient-warning text-white" style="text-align: center;">Stok</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Status</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Date BC</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Qty</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Date BC</th>
					<th class="bg-gradient-warning text-white" style="text-align: center;">Qty</th>
				</tr>

				<tbody style="border: 0px #fff solid;">
					<?php 
						$no = 1 ;
						foreach($hasil as $row)
						{

							$id_material = $row->id_material ;
							$d = $this->M_mix->detail_item($id_material) ;
							$tgl = $row->tanggal ;
							$tgl2 = date('Y-m-d', strtotime('-1 MONTH', strtotime($tgl)));
							$bulan = date("m",strtotime($tgl2)) ; 
							$tahun = date("Y",strtotime($tgl)) ; 	
							$beg_in = $this->M_mix->current_in($id_material, $bulan, $tahun) ;						

							$list_in = $this->M_mix->list_in($id_material) ;							
							$list_out = $this->M_mix->list_out($id_material) ;							
							$list_ending = $this->M_mix->list_ending($id_material) ;							
							
					?>
					<tr>
						
						<td>
							<?php echo $no++ ; ?>
						</td>
						<td>
							<?php echo $row->item ; ?>
						</td>
						
						<td>
							<?php echo $row->kode ; ?>
							
						</td>
						
						<td>
							<?php echo $row->unit ; ?>
							
						</td>
						
						<td colspan="4" class="p-0">
							<table style="width: 100%">
								<?php 
									$no = 1 ;
									foreach ($beg_in as $b) {

									$total_beg_in = $this->M_mix->total_current_in($id_material, $b->tanggal) ;						
									$total_beg_out = $this->M_mix->total_current_out($id_material, $b->tanggal) ;	
									$total_begining = $total_beg_in->qty - $total_beg_out->qty ;
								?>
								<tr>
									<td>
										<?php echo $no++ ; ?>
									</td>
									<td>
										<?php echo $b->tanggal ; ?>
									</td>
									<td>
										<?php echo $total_beg_in->qty ; ?>
									</td>
									<td>
										<?php echo $total_beg_in->qty - $total_beg_out->qty ; ?>
									</td>
								</tr>
								<?php 
									}
								?>
							</table>
							
						</td>
						
						
						
						<td colspan="4"  class="p-0">
							<table style="width: 100%">
								<?php 
									$no = 1 ;
									foreach ($list_in as $li) {
									$total_list_in = $this->M_mix->total_list_in($li->id_material, $li->tanggal) ;
									$total_list_out = $this->M_mix->total_list_out($li->id_material, $li->tanggal) ;
								?>
								<tr>
									<td>
										<?php echo $no++ ; ?>	
									</td>
									<td>
										<?php echo $li->tanggal ; ?>
									</td>
									<td>
										<?php echo $total_list_in->qty ; ?>
									</td>
									<td>
										<?php echo $total_list_in->qty - $total_list_out->qty ; ?>
									</td>
								</tr>
								<?php } ?>
							</table>
						</td>

						<td>
							df
						</td>
						
						<td colspan="2" class="p-0">
							<table>
								<?php 
									foreach($list_out as $lo) {
								?>
								<tr>
									<td>
										<?php echo $lo->tanggal ; ?>
									</td>
									<td>
										<?php echo $lo->qty ; ?>
									</td>
								</tr>
								<?php } ?>
							</table>
						</td>
						
						<td colspan="2" class="p-0">
							<table>
								<?php 
									foreach($list_out as $lo) {
								?>
								<tr>
									<td>
										<?php echo $lo->tanggal ; ?>
									</td>
									<td>
										<?php echo $lo->qty ; ?>
									</td>
								</tr>
								<?php } ?>
							</table>
						</td>
						
						<td colspan="6" class="p-0">
							<table>
								<?php 
									foreach ($list_ending as $le) {
									$total_beg_in = $this->M_mix->total_current_in($id_material, $le->tanggal) ;						
									$total_beg_out = $this->M_mix->total_current_out($id_material, $le->tanggal) ;	
									$total_begining = $total_beg_in->qty - $total_beg_out->qty ;


									$total_list_in = $this->M_mix->total_list_in($li->id_material, $le->tanggal) ;
								?>	
								<tr>
									<td>
										<?php echo $le->tanggal ; ?>
									</td>
									<td>
										<?php echo $total_begining + $total_list_in->qty ; ?>
									</td>
								</tr>
								<?php } ?>
							</table>
						</td>

					</tr>
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