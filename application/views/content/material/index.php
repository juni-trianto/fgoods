<div id="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ; ?>">
<div class="card shadow mb-4">
	
	<div class="card-header py-3 text-center" >
		<h3 style="font-weight: bold;"><?php echo $title ; ?></h3>
		</a>
	</div>

	<div class="card-header py-3">
		<a href="<?php echo base_url() ; ?>material/tambah" class="btn btn-primary btn-icon-split btn-sm">
			<span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			</span>
			<span class="text">Add New</span>
		</a>
		<a href="<?php echo base_url() ; ?>material/form_upload" class="btn btn-success btn-icon-split btn-sm">
			<span class="icon text-white-50">
				<i class="fas fa-upload"></i>
			</span>
			<span class="text">Upload</span>
		</a>
		<a href="<?php echo base_url() ; ?>material/export" class="btn btn-warning btn-icon-split btn-sm">
			<span class="icon text-white-50">
				<i class="fas fa-download"></i>
			</span>
			<span class="text">Export Excel</span>
		</a>
		<?php
		
		if($this->session->userdata('level') == "001" )
		{
		?>
				
			<a href="<?php echo base_url() ; ?>material/empty" class="btn btn-danger btn-icon-split btn-sm float-right">
				<span class="icon text-white-50">
					<i class="fas fa-trash"></i>
				</span>
				<span class="text">Clear Data</span>
			</a>
		<?php
		}
		?>
	
	</div>
	<div class="card-body">

		<div class="col-md-12 p-0 mb-3 row">
			<div class="col-md-8">
				
			</div>
			<div class="col-md-4 p-0">
				
				<form action="<?php echo base_url('material'); ?>" method="get">
					<div class="input-group input-group-sm">
		                      <input type="text" class="form-control" name="q" value="<?php echo $q ?>" style="border-right: 0px;background: transparent;" >
		                      <?php
						      	if ($q <> '') {
						      ?>
		                      <div class="input-group-prepend">
		                          <a href="<?php echo base_url() ; ?>material" class="btn btn-outline-secondary" style="border-color: #ddd ;">
		                              Reset
		                          </a>
		                      </div>
		                      <?php	
						      	}
						      ?>
		                      <div class="input-group-prepend">
		                          <button type="submit" class="btn btn-outline-primary" style="border-color: #ddd ;">
		                              Search
		                          </button>
		                      </div>
		                  </div>
				</form>					
			</div>

			
		</div>

<div class="col-md-12">
	<table class="table table-bordered table-hover table-sm" style="font-family: tahoma; font-size: 14px;">
	<tr>
		<th style="text-align: center;">
			No
		</th>
		<th>
			Item
		</th>
		<th style="text-align: center;">
			Code
		</th>
		<th style="text-align: center;">
			Status
		</th>
		<th style="text-align: center;">
			Unit
		</th>
		<th style="text-align: center;">
			Division Code
		</th>
		<th style="text-align: center;">
			Stock
		</th>
		<th style="text-align: center;">
			Action
		</th>
	</tr>
	<?php 
		foreach ($hasil as $row) {
		$id_material = $row->id_material ;
		$dt = $this->M_material->detail_stok($id_material) ;
	?>
	<tr>
		<td style="width: 50px; text-align: center;vertical-align: middle;">
			<?php echo ++$start ; ?>
		</td>
		<td style="vertical-align: middle;">
			<?php echo $row->item ; ?>
		</td>
		<td style="width: 100px; text-align: center;vertical-align: middle;">
			<?php echo $row->kode ; ?>
		</td>
		<td style="width: 100px; text-align: center;vertical-align: middle;">
			<?php echo $row->status ; ?>
		</td>
		<td style="width: 100px; text-align: center;vertical-align: middle;">
			<?php echo $row->unit ; ?>
		</td>
		<td style="width: 100px; text-align: center;vertical-align: middle;">
			<?php echo $row->kode_divisi ; ?>
		</td>
		<td style="text-align: center;">
			<?php echo $dt->stok ; ?>
		</td>
		<td style="width: 200px; text-align: center;vertical-align: middle;">
			<a id="edit" data-id="<?php echo $row->id_material ; ?>" data-url="<?php echo $url ; ?>" class="btn btn-success btn-icon-split btn-sm">
				<span class="icon text-white-50">
					<i class="fas fa-edit"></i>
				</span>
				<span class="text">Edit</span>
			</a>
			<a id="hapus" data-id="<?php echo $row->id_material ; ?>" class="btn btn-danger btn-icon-split btn-sm">
				<span class="icon text-white-50">
					<i class="fas fa-trash"></i>
				</span>
				<span class="text">Delete</span>
			</a>
		</td>
	</tr>
	<?php } ?>
</table>


</div>

<div class="col-md-12 text-right">
	<?php echo $pagination ; ?>
</div>
	</div>

</div>

<div class="modal " id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
    	<form method="post" action="<?php echo base_url() ; ?>material/update">
	        <div id="data-form_edit">
	        	
	        </div>
	    </form>
    </div>
</div>


<div class="modal " id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="data-konfirmasi">
        	
        </div>
    </div>
</div>

<script type="text/javascript">
	url = "<?php echo $url ; ?>" ;
</script>
