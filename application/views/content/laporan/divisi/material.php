
<link href="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<table class="table table-bordered table-hover table-sm" id="dataTable_material" style="font-size: 12px; font-family: 'Tahoma">
	<thead>
		<tr>
	      <th>No</th>
	      <th>Item</th>
	      <th>Code</th>
	      <th>Status</th>
	      <th>Unit</th>
	      <th>Division Code</th>
		</tr> 
	</thead>  

	<tbody>
		<?php
			$no = 1 ;
			foreach ($hasil as $row)
			{

		?>
			<tr
				id="pick_material"
				data-id_material = "<?php echo $row->id_material; ?>"
				data-item = "<?php echo $row->item; ?>"
				data-kode = "<?php echo $row->kode; ?>"
				style="cursor: default;"
			>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $row->item; ?>
				</td>
				<td>
					<?php echo $row->kode; ?>
				</td>
				<td>
					<?php echo $row->status; ?>
				</td>
				<td>
					<?php echo $row->unit; ?>
				</td>
				<td>
					<?php echo $row->kode_divisi; ?>
				</td>  

			</tr>
		<?php } ?>
	</tbody>
</table>


<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/js/demo/datatables-demo.js"></script>

<script>
$(document).ready( function () {
    $('#dataTable_material').DataTable();
} );
</script>
