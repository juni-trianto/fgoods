<div class="card shadow mb-4">
	
	<div class="card-header py-3" >
		<h3 style="font-weight: bold;"><?php echo $title ; ?></h3>
	</div>

	<div class="card-header py-3">
		<a href="<?php echo base_url() ; ?>transaksi/in/tambah" class="btn btn-primary btn-icon-split btn-sm">
			<span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			</span>
			<span class="text">Add Manually</span>
	    </a>


		<a href="<?php echo base_url() ; ?>transaksi/in/scaner" class="btn btn-danger btn-icon-split btn-sm">
			<span class="icon text-white-50">
				<i class="fas fa-search"></i>
			</span>
			<span class="text">Scanner</span>
	    </a>

    </div>
	<div class="card-body mb-5">
		<div class="col-md-12 row justify-content-center">
			<div class="col-md-10 p-0">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
			              <th>No</th>
			              <th>Code</th>
			              <th>Date</th>
			              <th>Qty Total</th>
						  <th style="text-align: center;">Action</th>
						</tr> 
					</thead>  

					<tbody>
						<?php
							$no = 1 ;
							foreach ($hasil as $row) {
							$kode_transaksi = $row->kode_transaksi ;
							$r = $this->M_in->total_qty_transaksi($kode_transaksi) ;
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
							<td style="width: 50px;">
								<?php echo $r->jml_qty ; ?>
							</td>
							<td style="width: 200px;">
							<?php if($this->session->userdata('level') == "003"  )
{
	?>
<a href="<?php echo base_url() ; ?>transaksi/in/view/transaksi/<?php echo $row->id_transaksi; ?>" class="btn btn-info btn-icon-split btn-sm">
									<span class="icon text-white-50">
										<i class="fas fa-edit"></i>
									</span>
									<span class="text">view</span>
							    </a>
<?php
}else
{
?>

								<a href="<?php echo base_url() ; ?>transaksi/in/edit/transaksi/<?php echo $row->id_transaksi; ?>" class="btn btn-info btn-icon-split btn-sm">
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
<?php
}
?>
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