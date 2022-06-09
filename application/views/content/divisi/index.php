<div id="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ; ?>">
<div class="card shadow mb-4">
	
	<div class="card-header py-3 text-center" >
		<h3 style="font-weight: bold;"><?php echo $title ; ?></h3>
		</a>
	</div>

	<div class="card-header py-3">
		<a href="<?php echo base_url() ; ?>divisi/tambah" class="btn btn-info btn-icon-split btn-sm">
			<span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			</span>
			<span class="text">Manual Input</span>
		</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<div class="col-md-12 p-0">
				
			</div>
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
		              <th>No</th>
		              <th>Code</th>
		              <th>Division Name</th>
					  <th style="text-align: center;">Action</th>
					</tr> 
				</thead>  

				<tbody>
					<?php 
						$no = 1 ;
						foreach($hasil as $row)
						{
					?>
					<tr>
						<td style="width: 10px;"><?php echo $no++ ; ?></td>						
						<td><?php echo $row->kode_divisi ; ?></td>
						<td ><?php echo $row->nama_divisi ; ?></td>

						<td style="width: 170px; text-align: center;" >
						<a href="<?php echo base_url() ; ?>divisi/edit/<?php echo $row->id_divisi ; ?>" class="btn btn-success btn-icon-split btn-sm">
						<span class="icon text-white-50">
						<i class="fas fa-pen"></i>
						</span>
						<span class="text">Edit</span>
						</a>

						<a id="hapus" data-id="<?php echo base_url() ; ?>divisi/hapus/<?php echo $row->id_divisi ; ?>" class="btn btn-danger btn-icon-split btn-sm">
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

<div class="modal " id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="data-konfirmasi">
            	
            </div>
        </div>
    </div>