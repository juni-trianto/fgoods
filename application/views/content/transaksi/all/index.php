<div class="card shadow mb-4">
	
	<div class="card-header py-3" >
		<h3 style="font-weight: bold;">Transaction Data</h3>
	</div>

	<div class="card-header py-3">
		<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
  
		  <div class="btn-group  btn-group-sm" role="group">
		    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		      Transaksi Baru
		    </button>
		    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
		      <a class="dropdown-item" href="<?php echo base_url() ; ?>transaksi/in/tambah">IN</a>
		      <a class="dropdown-item" href="<?php echo base_url() ; ?>transaksi/out/tambah">Out</a>
		      
		    </div>
		  </div>
		</div>



    </div>
	<div class="card-body mb-5">
		<div class="col-md-12 row justify-content-center">
			<div class="col-md-10 p-0">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
			              <th>No</th>
			              <th>Code</th>
			              <th>BC NO</th>
			              <th>No BC</th>
			              <th>Status</th>
						  <th style="text-align: center;">Action</th>
						</tr> 
					</thead>  

					<tbody>
						<?php
							$no = 1 ;
							foreach ($hasil as $row) {
						?>
						<tr>
							<td style="width: 50px;"> 
								<?php echo $no++; ?>
							</td>
							<td >
								<a href="#<?php echo base_url() ; ?>transaksi/in/detail/<?php echo $row->id_transaksi ; ?>">
									<?php echo $row->kode_transaksi; ?>									
								</a>
							</td>
							<td style="width: 150px;">
								<?php echo $row->tanggal; ?>
							</td>
							<td style="width: 100px;">
								<?php echo $row->no_bc; ?>
							</td>
							<td style="width: 50px;">
								<?php echo $row->status_transaksi; ?>
							</td>
							<td style="width: 200px;">

								<a href="<?php echo base_url() ; ?>transaksi/in/edit/<?php echo $row->id_transaksi; ?>" class="btn btn-info btn-icon-split btn-sm">
									<span class="icon text-white-50">
										<i class="fas fa-edit"></i>
									</span>
									<span class="text">Edit</span>
							    </a>

								<a id="hapus" data-id="<?php echo $row->id_transaksi; ?>" class="btn btn-danger btn-icon-split btn-sm">
									<span class="icon text-white-50">
										<i class="fas fa-trash"></i>
									</span>
									<span class="text">Delete</span>
							    </a>

							</td>
						</tr>

						<?php } ?>
					</tbody>
				</table>			
				
			</div>
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