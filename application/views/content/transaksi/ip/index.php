<div id="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ; ?>">

<div class="card shadow mb-4">

	

	<div class="card-header py-3" >

		<h3 style="font-weight: bold;"><?php echo $title ; ?></h3>

	</div>



	<div class="card-header py-3">

		<a href="<?php echo base_url() ; ?>transaksi/input_po/tambah" class="btn btn-primary btn-icon-split btn-sm">

			<span class="icon text-white-50">

				<i class="fas fa-plus"></i>

			</span>

			<span class="text">Add Manually</span>

	    </a>

		<a href="<?php echo base_url() ; ?>transaksi/input_po/tambah_scaner" class="btn btn-danger btn-icon-split btn-sm">
			<span class="icon text-white-50">
				<i class="fas fa-search"></i>
			</span>
			<span class="text">Scanner</span>
	    </a>





    </div>

	<div class="card-body mb-5">

		<div class="col-md-12 row justify-content-center">

			<div class="col-md-10 p-0">

				<table class="table table-bordered table-hover table-sm" id="dataTable" >

					<thead>

						<tr>

			              <th>No</th>

			              <th>Code</th>

			              <th>Date</th>

			              <th>PO NO</th>

			              <th>Order Total</th>

						  <th style="text-align: center;">Action</th>

						</tr> 

					</thead>  



					<tbody>

						<?php

							$no = 1 ;

							foreach ($hasil as $row) {

						?>

						<tr>

							<td style="width: 50px;text-align: center;"> 

								<?php echo $no++; ?>

							</td>

							<td >

								<a href="#<?php echo base_url() ; ?>transaksi/input_po/detail/<?php echo $row->id_transaksi ; ?>">

									<?php echo $row->kode_transaksi; ?>									

								</a>

							</td>

							<td style="width: 150px;">

								<?php echo $row->tanggal; ?>

							</td>

							<td style="width: 125px;">

								<?php echo $row->no_bc; ?>

							</td>

							<td style="width: 50px;text-align: center;">

								<?php 
									$total_order =  $this->M_input_po->total_order_bykd($row->kode_transaksi);
									echo $total_order->ttl_order;
								?>

							</td>

							<td style="width: 180px;">



								<a href="<?php echo base_url() ; ?>transaksi/input_po/edit/<?php echo $row->id_transaksi; ?>" class="btn btn-info btn-icon-split btn-sm">

									<span class="icon text-white-50">

										<i class="fas fa-edit"></i>

									</span>

									<span class="text">Edit</span>

							    </a>



								<a id="hapus" data-id="<?php echo base_url() ; ?>transaksi/input_po/hapus/<?php echo $row->id_transaksi; ?>" class="btn btn-danger btn-icon-split btn-sm">

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

