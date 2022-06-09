
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4><?php echo $title ; ?></h4>
  </div>
  <div class="card-body " >

      <div class="col-md-12 row justify-content-center " >

          <div class="col-md-8 ">
              <form class="form-horizontal" action="<?php echo $action ; ?>" method="post">
                <input type="hidden" name="id_divisi" value="<?php echo $id_divisi ; ?>">
                  <div class="box-body">

                    

                      <div class="form-group">
                          <label class="label pl-3">Division Code</label>
                          <div class="col-md-12">
                              <input type="text" name="kode_divisi" class="form-control" value="<?php echo $kode_divisi ;?>">
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('kode_divisi') ?></span>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="label pl-3">Division Name</label>
                          <div class="col-md-12">
                              <input type="text" name="nama_divisi" class="form-control" value="<?php echo $nama_divisi ;?>">
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('nama_divisi') ?></span>
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-md-12">
                            <button class="btn btn-primary float-right" type="submit">Save</button>
                            <a href="<?php echo base_url() ; ?>divisi" class="btn btn-info float-right mr-2">Cancel</a>
                          </div>
                      </div>

                   
                
              </form>
        </div>
    </div>
</div>
