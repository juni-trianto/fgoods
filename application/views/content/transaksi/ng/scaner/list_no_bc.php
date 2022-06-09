<style type="text/css">
	td
	{
		padding: 5px;
	}
</style>

<table style="width: 100%">
	<tr>
		<td>
			PO No
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
	            id="hapus_temp_no_bc" 
	            data-id="<?php echo $row->id_temp_no_bc ; ?>"
	            class="fa fa-times text-danger" 
	            style="text-decoration: none;font-size: 20px;">
	            	
	            </a>
			</td>
		</tr>
<?php } ?>
</table>
