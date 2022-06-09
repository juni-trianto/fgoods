
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4><?php echo $title ; ?></h4>
  </div>
  <div class="card-body " >

      <div class="col-md-12 row justify-content-center " >

          <div class="col-md-8 ">
              <form class="form-horizontal" action="<?php echo $action ; ?>" method="post">
                <input type="hidden" name="id_user" value="<?php echo $id_user ; ?>">
                  <div class="box-body">

                      <div class="form-group">
                          <label class="label pl-3">NIP</label>
                          <div class="col-md-12">
                              <input type="text" name="nip" class="form-control" value="<?php echo $nip ;?>">
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('nip') ?></span>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="label pl-3">Name</label>
                          <div class="col-md-12">
                              <input type="text" name="nama" class="form-control" value="<?php echo $nama ;?>">
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('nama') ?></span>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="label pl-3">Username</label>
                          <div class="col-md-12">
                              <input type="text" name="username" class="form-control" value="<?php echo $username ;?>">
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('username') ?></span>
                          </div>
                      </div>

                    
					
						 <div class="form-group">
							  <label class="label pl-3">Password</label>
							  <div class="col-md-12">
								  <input type="password" name="password" class="form-control" value="<?php echo $password ;?>">
								  <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('password') ?></span>
							  </div>
						  </div>
				
                     

                      <div class="form-group">
                          <label class="label pl-3">Department</label>
                          <div class="col-md-12">
                              <input type="text" name="dept" class="form-control" value="<?php echo $dept ; ?>" >
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('dept') ?></span>
                          </div>
                      </div>


                      <div class="form-group">
                          <label class="label pl-3">Type User</label>
                          <div class="col-md-12 pl-3">
                              <input type="radio" name="level" value="Admin" <?php if($lv == '001') { ?> checked <?php } ?> > Admin
                              <br>
                              <input type="radio" name="level" value="Super User" <?php if($lv == '002') { ?> checked <?php } ?> > Super User
							  <br>
                              <input type="radio" name="level" value="User" <?php if($lv == '003') { ?> checked <?php } ?> > User
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('lv') ?></span>
                          </div>
                      </div>
					  <br>
					  
						<div id="tabelakses" style="<?php if($lv == '003') { ?>display: show;<?php }else{ ?>display: none;<?php } ?> ">
							<h3>Menu Access</h3>
							<table class="table" >
								<tr>
								  <td class="p-2" style="width: 180px;" colspan="3";>Transaction</td>
								</tr>
								<tr>
								  <td class="p-2" style="width: 180px;"> In </td>
								  <td class="p-2" style="width: 2px;"> :  </td>
								  <td class="p-2">
									<input type="radio" name="in" value="Ya" <?php if($in == 'Ya') { ?> checked <?php } ?> > Yes
									  <br>
									  <input type="radio" name="in" value="Tidak" <?php if($in == 'Tidak') { ?> checked <?php } ?> >No
									  <br>
								  </td>
								</tr>
								<tr>
								  <td class="p-2" style="width: 180px;"> out </td>
								  <td class="p-2" style="width: 2px;">: </td>
								  <td class="p-2">
									<input type="radio" name="out" value="Ya" <?php if($out == 'Ya') { ?> checked <?php } ?>> Yes
									  <br>
									  <input type="radio" name="out" value="Tidak" <?php if($out == 'Tidak') { ?> checked <?php } ?>> No
									  <br>
								  </td>
								</tr>
								<tr>
								  <td class="p-2" style="width: 180px;"> NG </td>
								  <td class="p-2" style="width: 2px;">: </td>
								  <td class="p-2">
									<input type="radio" name="ng" value="Ya" <?php if($ng == 'Ya') { ?> checked <?php } ?>> Yes
									  <br>
									  <input type="radio" name="ng" value="Tidak" <?php if($ng == 'Tidak') { ?> checked <?php } ?>> No
									  <br>
								  </td>
								</tr>
								<tr>
								  <td class="p-2" style="width: 180px;"> All </td>
								  <td class="p-2" style="width: 2px;">: </td>
								  <td class="p-2">
									<input type="radio" name="semua" value="Ya" <?php if($semuatr == 'Ya') { ?> checked <?php } ?>> Yes
									  <br>
									  <input type="radio" name="semua" value="Tidak" <?php if($semuatr == 'Tidak') { ?> checked <?php } ?>> No
									  <br>
								  </td>
								</tr>
							</table>
							<table class="table" >
								<tr>
									<td class="p-2" style="width: 180px;" colspan="3";>Report</td>
								</tr>
								<tr>
								  <td class="p-2" style="width: 180px;"> Item </td>
								  <td class="p-2" style="width: 2px;"> :  </td>
								  <td class="p-2">
									<input type="radio" name="item" value="Ya" <?php if($item == 'Ya') { ?> checked <?php } ?>> Yes
									  <br>
									  <input type="radio" name="item" value="Tidak" <?php if($item == 'Tidak') { ?> checked <?php } ?>> No
									  <br>
								  </td>
								</tr>
								<tr>
								  <td class="p-2" style="width: 180px;"> Division </td>
								  <td class="p-2" style="width: 2px;">: </td>
								  <td class="p-2">
									<input type="radio" name="divisi" value="Ya" <?php if($divisi == 'Ya') { ?> checked <?php } ?>> Yes
									  <br>
									  <input type="radio" name="divisi" value="Tidak" <?php if($divisi == 'Tidak') { ?> checked <?php } ?>> No
									  <br>
								  </td>
								</tr>
								<tr>
								  <td class="p-2" style="width: 180px;"> Mix </td>
								  <td class="p-2" style="width: 2px;">: </td>
								  <td class="p-2">
									<input type="radio" name="mix" value="Ya" <?php if($mix == 'Ya') { ?> checked <?php } ?>> Yes
									  <br>
									  <input type="radio" name="mix" value="Tidak" <?php if($mix == 'Tidak') { ?> checked <?php } ?>> No
									  <br>
								  </td>
								</tr>
								
							</table>
						</div>

                    

                      <div class="form-group">
                          
                          <div class="col-md-12">
                            <button class="btn btn-primary float-right" type="submit">Save</button>
                            <a href="<?php echo base_url() ; ?>user" class="btn btn-info float-right mr-2">Cancel</a>
                          </div>
                      </div>

                   
                
              </form>
        </div>
    </div>
</div>
