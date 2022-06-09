<style type="text/css">
	td
	{
		padding: 5px;
	}
</style>

<table style="width: 100%">
	<tr>
		<td>
			No. Bc
		</td>
		<td>
			Qty
		</td>
		<td>
			Opt
		</td>
	</tr>
<?php foreach ($hasil as $row) { ?>
		<tr>
			<td>
				<?php echo $row->no_bc ; ?>
			</td>
			<td>
				<?php echo $row->qty ; ?>
			</td>
			<td>
				<a href="#" 
	            id="hapus_no_bc_edit_list" 
	            data-id="<?php echo $row->id_no_bc ; ?>"
	            data-kode="<?php echo $row->kode ; ?>"
	            data-id_material="<?php echo $row->id_material ; ?>"
	            data-kode_transaksi="<?php echo $row->kode_transaksi ; ?>"
	            data-qty="<?php echo $row->qty ; ?>"
	            class="fa fa-times text-danger" 
	            style="text-decoration: none;font-size: 20px;">
	            	
	            </a>
			</td>
		</tr>
<?php } ?>
</table>
