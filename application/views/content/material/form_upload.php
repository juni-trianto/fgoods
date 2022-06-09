
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4><?php echo $title ; ?></h4>
  </div>
  <div class="card-body " >

      <div class="col-md-12 row justify-content-center " >

          <div class="col-md-8 ">
              <form enctype="multipart/form-data" method="post" action="<?php echo $action ; ?>">
                
                  <div class="box-body">

                      <div class="form-group row col-md-10" >
                          <label class="col-12" for="example-text-input-invalid">Material Excel Data</label>
                          <div class="col-md-12">
                              <div class="input-group">
                                  <input type="file" name="excel" id="upload-default" style="display: none;">
                                  <input type="text" class="form-control" style="border-right: 0px;background: transparent;" readonly>
                                  <div class="input-group-prepend">
                                      <button id="browse" type="button" class="btn btn-outline-secondary" style="border-color: #ddd ;">
                                          Browse
                                      </button>
                                  </div>
                              </div>
                              
                              <span class="form-text text-danger mb-0"><?php echo form_error('excel') ?></span>
                          </div>
                      </div>

                    

                      <div class="form-group col-md-10">
                          
                          <div class="col-md-12 pr-4">
                            <button class="btn btn-primary float-right" type="submit">
                              <i class="fas fa-upload"></i>
                              Upload
                            </button>
                            <a href="<?php echo base_url() ; ?>material" class="btn btn-info float-right mr-2">Cancel</a>
                          </div>
                      </div>

                      <div class="form-group col-md-10 mt-5 pt-5">
                        <div class="alert alert-warning">                          
                            <p>
                              Pastikan Type file adalah .xlsx dan formatnya sesuai, silahkan download dan gunakan format yang sudah terseting di bawah ini
                            </p>
                        </div>
                      </div>



                      <div class="form-group col-md-10 text-center">
                          <a href="<?php echo base_url() ; ?>material/download" class="btn btn-danger btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                              <i class="fas fa-download"></i>
                            </span>
                            <span class="text">Download File .xlsx</span>
                          </a>
                      </div>

                   
                
              </form>
        </div>
    </div>


</div>

