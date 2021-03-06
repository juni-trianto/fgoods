
<div class="card shadow mb-4">
  
  <div class="card-header py-3 row" >
    <div class="col-md-6">
      <h3 style="font-weight: bold;">Material Inventory Report</h3>
    </div>
    <div class="col-md-6 text-right">
    </div>
  </div>
  
 	<div class="table-responsive">
			<div class="col-md-12 p-0">
				 
			</div>
			<div class="col-md-12 row justify-content-center">
			<div class="col-md-6 p-3">
			 <div class="col-md-12 p-3" style="border: 1px #ddd solid;">
              
				<div style="font-family: 'Tahoma'; font-size: 12px;">
					From : <?php echo $from ; ?> <br>
					To : <?php echo $to ; ?> <br>
				</div>

	            <button id="filter_excel" class="btn btn-success btn-sm mt-5">
	                <i class="fas fa-download fa-sm text-white-50"></i>
	                Export Excel
	            </button>
            </div>
			</div>
				<div class="col-md-6 p-3">
		            <div class="col-md-12 p-3" style="border: 1px #ddd solid;">

		            	<label class="mb-3">Filter</label>

		                  <div class="form-group col-md-12 p-0" >
		                      
		                     <div class="input-group p-0" >
								 <div class="col-md-2 p-0 text-center" >
		                              By Divisi :
		                          </div>
		                          <div class="col-md-4 p-0 " >
		                             <div class="input-group input-group-sm ">
										  <div class="input-group-prepend col-md-4 p-0">
											<input type="hidden" id="from" value="<?php echo $from ; ?>">
											<input type="hidden" id="to" value="<?php echo $to ; ?>">
											<input type="text" id="kode" name="kode" class="form-control form-control-sm" value="<?php echo $kode ; ?>" readonly>
										  </div>
										  <input type="text" id="nama_divisi" name="nama_divisi" class="form-control" value="<?php echo $nama ; ?>" readonly>
										  <div class="input-group-append">

											  <button type="button" class="btn btn-success input-group-text" id="browse-divisi"><i class="fa fa-ellipsis-v"></i></button>
													   
										  </div>
									</div>
		                          </div>

		                          <div class="col-md-2 p-0 text-center" >
		                              By Item :
		                          </div>
		                          
		                          <div class="col-md-4 p-0" >
		                              <div class="input-group input-group-sm ">
										<div class="input-group-prepend col-md-4 p-0">
										  <input type="text" id="kode_item" name="kode_item" class="form-control form-control-sm" value="<?php echo $kode_item ; ?>" readonly>
										</div>
										<input type="text" id="nama_item" name="nama_item" class="form-control" value="<?php echo $nama_item ; ?>" readonly>
										<div class="input-group-append">

											<button type="button" class="btn btn-success input-group-text" id="browse-material"><i class="fa fa-ellipsis-v"></i></button>
													 
										</div>
									  </div>
		                          </div>
		                      </div>
		                  </div>

		                  <div class="form-group col-md-12 p-0 mb-0 text-right" >
		                        <button id="filter" class="btn btn-primary btn-sm ">
                                <i class="fas fa-filter fa-sm text-white-50"></i>
                                Filter
                            </button>
		                  </div>


		            </div>
				</div>

			</div>

		</div>
  
  <div class="card-body">
    <div class="col-md-12 ">
      <table class="table table-bordered table-sm" width="100%" cellspacing="0" style="font-family: tahoma; font-size: 12px;">
        
        <tr>
                <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">No</th>
                <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">Description</th>
                <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">Item Code</th>
                <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">Unit</th>
                <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">Beginning Stock</th>
                <th class="bg-gradient-warning text-white" style="text-align: center;vertical-align: middle;">IN</th>
                <th class="bg-gradient-warning text-white" colspan="2" style="text-align: center;vertical-align: middle;">OUT</th>
                <th class="bg-gradient-warning text-white" rowspan="2" style="text-align: center;vertical-align: middle;">Ending Stok</th>
        </tr> 
        <tr>
          <th class="bg-gradient-warning text-white" style="text-align: center;">Import Etc</th>
          
          <th class="bg-gradient-warning text-white" style="text-align: center;">NG</th>
          <th class="bg-gradient-warning text-white" style="text-align: center;">Prod</th>
        </tr>

        <tbody style="border: 0px #fff solid;">
          <?php 
            $no = 1 ;
            foreach($hasil as $row)
            {
              $kode = $row->kode ;
              //$det = $this->M_divisi->detail_item($kode, $to) ;
              /*$id_material = $row->id_material ;
              $tgl = $row->tanggal ;
              $current_from = date('Y-m-d', strtotime('-1 MONTH', strtotime($from)));
              $current_to = date('Y-m-d', strtotime('-1 MONTH', strtotime($to)));
              $tgl2 = date('Y-m-d', strtotime('-1 MONTH', strtotime($tgl)));
              $bulan = date("m",strtotime($tgl2)) ; 
              $tahun = date("Y",strtotime($tgl)) ; 

              $lci = $this->M_divisi->current_in($id_material, $current_from, $current_to) ;
              $lco = $this->M_divisi->current_out($id_material, $current_from, $current_to) ;

              $jml_in = $this->M_divisi->jml_in($id_material, $from, $to) ;
              $jml_out = $this->M_divisi->jml_out($id_material, $from, $to) ;

              $ending_stok = $lci->qty + $jml_in->qty - $jml_out->qty ;*/
              
			  // tanggal begininng diambil 1 bulan sebelumnya
			   $det = $this->M_divisi->detail_in_fix($kode, $from, $to) ;
			   $tgl_kemarin    =date('Y-m-d', strtotime("-1 day", strtotime($from)));
			   
			   		
						$month_begining = date('m', strtotime('-1 MONTH', strtotime($from)));
						$year_begining ='';
						if($month_begining == '12'){
							$year_begining = date('Y', strtotime('-1 YEAR', strtotime($from)));
						}
						else{
							$year_begining = date('Y', strtotime($from));
						}	
						$qty_beg = $this->M_divisi->jml_qty_begining_fix($kode, $tgl_kemarin, $year_begining);				
              
          ?>
          <tr>
            
            <td>
              <?php echo $no++ ; ?>
            </td>
            
            <td>
              <?php echo $row->item; ?>
            </td>
            <td  style="text-align: center;">
              <?php echo $row->kode; ?>
            </td>
            <td style="text-align: center;">
              <?php echo $row->unit; ?>
            </td>
            <td style="text-align: center;">
              <?php  
			 echo $row->total_kemarin;
			  //echo round($qty_beg->jml_qty_begining,1); 
			  ?>
            </td>
            <td style="text-align: center;">
             <?php echo round($det->jml_qty_in,1) ; ?>
            </td>
            <td style="text-align: center;">
              <?php echo round($row->qty_ng,1); ?>
            </td>
            <td style="text-align: center;">
              <?php echo round ($row->qty_out,1); ?>
            </td>
            <td style="text-align: center;">
              <?php 
                $ttl= round($row->total_kemarin,1) + round($row->qty_in,1) - round($row->qty_ng,1) - round($row->qty_out,1) ;
				echo round($ttl,1);
              ?>
            </td>

          </tr>
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
                    <span aria-hidden="true">??</span>
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

<div class="modal " id="modal-divisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Select Division Data</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">??</span>
              </button>
          </div>
          <div class="modal-body">              
              <div id="data_divisi">
                
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-info" type="button" data-dismiss="modal">Done</button>
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
                  <span aria-hidden="true">??</span>
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