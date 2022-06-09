
	<?php
		if($cek > 0){
	?>
		<table class="table table-sm table-bordered table-hover">
			<tr>
				<th style="text-align: center;vertical-align: middle; width: 50px;">
					No
				</th>
				<th style="text-align: center;vertical-align: middle;width: 125px;">
					Code
				</th>
				<th style="vertical-align: middle;">
					Item
				</th>
				<th style="text-align: center;vertical-align: middle;width: 80px;">
					Qty
				</th>
			
			</tr>
	<?php 
		$no = 1 ;
		foreach($hasil as $row)
			{ 
				$kode = $row->kode ;
				$kode_transaksi = $row->kode_transaksi ;
				$q = $this->M_tambah->jml_qty_no_bc($kode, $kode_transaksi) ;
				$qty = $q->jml_qty ;
				 
	?>
			<tr>
				<td style="text-align: center;vertical-align: middle;">
					<?php echo $no++ ; ?>
				</td >
				<td style="text-align: center;vertical-align: middle;">
					<?php echo $row->kode ; ?>
				</td>
				<td style="vertical-align: middle;">
					<?php echo $row->item ; ?>
				</td>
				<td style="text-align: center;vertical-align: middle;">
					<?php echo $row->qty ; ?>
				</td>
				
			</tr>
	<?php } ?>
		</table>
	<?php } else { ?>

		<div class="alert alert-warning text-center">
			Empty Material List			
		</div>
	<?php } ?>