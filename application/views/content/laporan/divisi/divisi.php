
<link href="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<table class="table table-bordered table-hover table-sm" id="dataTable" style="font-size: 12px; font-family: 'Tahoma">
	<thead>
		<tr>
	      <th>No</th>
	      <th>Code</th>
	      <th>Division</th>
		</tr> 
	</thead>  

	<tbody>
		<?php
			$no = 1 ;
			foreach ($hasil as $row)
			{

		?>
			<tr
				id="pick_divisi"
				data-kode = "<?php echo $row->kode_divisi; ?>"
				data-nama_divisi = "<?php echo $row->nama_divisi; ?>"
				style="cursor: default;"
			>
				<td style="width: 5%;text-align: center;">
					<?php echo $no++; ?>
				</td>
				<td style="width: 5%;">
					<?php echo $row->kode_divisi; ?>
				</td>
				<td>
					<?php echo $row->nama_divisi; ?>
				</td>

			</tr>
		<?php } ?>
	</tbody>
</table>


<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/js/demo/datatables-demo.js"></script>

