
<link href="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<table class="table table-bordered table-hover table-sm" id="dataTable" style="font-family: tahoma; font-size: 12px;">
	<thead>
		<tr>
	      <th>No</th>
	      <th>Item</th>
	      <th>Code</th>
	      <th>Division Code</th>
	      <th>Qty</th>
	      <th style="text-align: center;padding: 0px;vertical-align: middle;">Opt</th>
		</tr> 
	</thead>  

	<tbody>
		<?php
			$no = 1 ;
			foreach ($hasil as $row)
			{

                  $kode = $row->kode ;
                  $cek = $this->M_tambah->cek_temp_list_transaksi($kode, $kode_transaksi);
                  $jml_in = $this->M_tambah->jumlah_material_in($kode);
                  $jml_out = $this->M_tambah->jumlah_material_out($kode);
                  $jml_qty = $jml_in->qty - $jml_out->qty ;
		?>
		
		<?php if($cek < 1) { ?>
			<tr
			>
				<td>
					<?php echo $no++; ?>
				</td>
				<td 
					id="pick_material"
					
					data-item = "<?php echo $row->item; ?>"
					data-kode = "<?php echo $row->kode; ?>"
					
					
					data-qty = "<?php echo $jml_qty; ?>"
					style="cursor: default;"
				>
					<?php echo $row->item; ?>
				</td>
				<td 
					id="pick_material"
					
					data-item = "<?php echo $row->item; ?>"
					data-kode = "<?php echo $row->kode; ?>"
					
					
					data-qty = "<?php echo $jml_qty; ?>"
					style="cursor: default;"
				>
					<?php echo $row->kode; ?>
				</td>
				<td 
					id="pick_material"
					
					data-item = "<?php echo $row->item; ?>"
					data-kode = "<?php echo $row->kode; ?>"
					
					
					data-qty = "<?php echo $jml_qty; ?>"
					style="cursor: default;"
				>
					<?php echo $row->kode_divisi; ?>
				</td> 
				<td 
					id="pick_material"
					
					data-item = "<?php echo $row->item; ?>"
					data-kode = "<?php echo $row->kode; ?>"
					
					
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
						
						data-item = "<?php echo $row->item; ?>"
						data-kode = "<?php echo $row->kode; ?>"
						
						
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
