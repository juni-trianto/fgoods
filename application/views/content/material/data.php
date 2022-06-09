<link href="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<table class="table table-bordered table-hover table-sm" id="dataTable" style="font-size: 12px; font-family: 'Tahoma' ">
				<thead>
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
				</thead>  

				<tbody>
					<?php 
						$no = 1 ;
						foreach($hasil as $row)
						{
						$id_material = $row->id_material ;
						$dt = $this->M_material->detail_stok($id_material) ;
					?>
					<tr>
						<td style="width: 50px; text-align: center;vertical-align: middle;">
							<?php echo $no++ ; ?>
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
				</tbody>
			</table>
			
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/js/demo/datatables-demo.js"></script>