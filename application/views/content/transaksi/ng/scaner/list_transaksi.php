
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
				<th style="text-align: center;vertical-align: middle;width: 100px;">
					Opt
				</th>
			</tr>
	<?php 
		$no = 1 ;
		foreach($hasil as $row)
			{ 
				$id_material = $row->id_material ;
				$kode_transaksi = $row->kode_transaksi ;
				$q = $this->M_scaner->jml_qty_no_bc($id_material, $kode_transaksi) ;
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
				<td style="text-align: center;vertical-align: middle;">
					

			          <a href="#" 
			            id="edit_list" 
			            data-id="<?php echo $row->id_temp_list_transaksi ; ?>"
			            data-id_material="<?php echo $row->id_material ; ?>"
			            data-kode_transaksi="<?php echo $row->kode_transaksi ; ?>"
			            class="fa fa-edit text-success mr-3" 
			            style="text-decoration: none;font-size: 20px;">
			            	
			           </a>

			          <a href="#" 
			            id="hapus_list" 
			            data-id="<?php echo $row->id_temp_list_transaksi ; ?>"
			            class="fa fa-times text-danger" 
			            style="text-decoration: none;font-size: 20px;">
			            	
			            </a>
				</td>
			</tr>
	<?php } ?>
		</table>
	<?php } else { ?>

		<div class="alert alert-warning text-center">
			Empty Material List			
		</div>
	<?php } ?>