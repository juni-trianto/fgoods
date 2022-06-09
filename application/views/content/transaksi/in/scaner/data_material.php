
<link href="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<table class="table table-bordered table-hover table-sm" id="dataTable" style="font-family: tahoma; font-size: 12px;">
	<thead>
		<tr>
	      <th>No</th>
	      <th>Item</th>
	      <th>Kode</th>
	      <th>Kode Divisi</th>
	      <th>Qty</th>
	      <th style="text-align: center;padding: 0px;vertical-align: middle;">Opt</th>
		</tr> 
	</thead>  

	<tbody>
		<?php
			$no = 1 ;
			foreach ($hasil as $row)
			{

                  $id_material = $row->id_material ;
                  $kode = $row->kode ;
                  $cek = $this->M_tambah->cek_temp_list_transaksi($id_material, $kode_transaksi);
                  $jml_qty = $row->jml_in - $row->jml_out
		?>
		
		<?php if($cek < 1) { ?>
			<tr
			>
				<td>
					<?php echo $no++; ?>
				</td>
				<td 
					id="pick_material"
					data-id_material = "<?php echo $row->id_material; ?>"
					data-item = "<?php echo $row->item; ?>"
					data-kode = "<?php echo $row->kode; ?>"
					data-tanggal = "<?php echo $row->tanggal; ?>"
					data-no_bc = "<?php echo $row->no_bc; ?>"
					data-qty = "<?php echo $jml_qty; ?>"
					style="cursor: default;"
				>
					<?php echo $row->item; ?>
				</td>
				<td 
					id="pick_material"
					data-id_material = "<?php echo $row->id_material; ?>"
					data-item = "<?php echo $row->item; ?>"
					data-kode = "<?php echo $row->kode; ?>"
					data-tanggal = "<?php echo $row->tanggal; ?>"
					data-no_bc = "<?php echo $row->no_bc; ?>"
					data-qty = "<?php echo $jml_qty; ?>"
					style="cursor: default;"
				>
					<?php echo $row->kode; ?>
				</td>
				<td 
					id="pick_material"
					data-id_material = "<?php echo $row->id_material; ?>"
					data-item = "<?php echo $row->item; ?>"
					data-kode = "<?php echo $row->kode; ?>"
					data-tanggal = "<?php echo $row->tanggal; ?>"
					data-no_bc = "<?php echo $row->no_bc; ?>"
					data-qty = "<?php echo $jml_qty; ?>"
					style="cursor: default;"
				>
					<?php echo $row->kode_divisi; ?>
				</td> 
				<td 
					id="pick_material"
					data-id_material = "<?php echo $row->id_material; ?>"
					data-item = "<?php echo $row->item; ?>"
					data-kode = "<?php echo $row->kode; ?>"
					data-tanggal = "<?php echo $row->tanggal; ?>"
					data-no_bc = "<?php echo $row->no_bc; ?>"
					data-qty = "<?php echo $jml_qty; ?>"
					style="cursor: default;"
				>
					<?php echo $jml_qty ; ?>
				</td>
				<td 
					style="cursor: default;width: auto;text-align: center;padding: 1px;"
				>   
					<a href="#" 
						id="detail" 						
						data-id_material = "<?php echo $row->id_material; ?>"
						data-item = "<?php echo $row->item; ?>"
						data-kode = "<?php echo $row->kode; ?>"
						data-tanggal = "<?php echo $row->tanggal; ?>"
						data-no_bc = "<?php echo $row->no_bc; ?>"
						data-qty = "<?php echo $jml_qty; ?>"
						class="text-success" 
						
					><i class="fa fa-eye"></i></a>
				</td>  

			</tr>
		
		<?php } ?>
			

		<?php } ?>
	</tbody>
</table>


<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/js/demo/datatables-demo.js"></script>
