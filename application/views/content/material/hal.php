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
			<a id="edit" data-id="<?php echo $row->id_material ; ?>" class="btn btn-success btn-icon-split btn-sm">
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

