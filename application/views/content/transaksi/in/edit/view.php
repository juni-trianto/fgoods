<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4> Material List</h4>
  </div>
  
  <div class="card-body " >




      <div class="col-md-12 row justify-content-center pt-3"  >

            <div class="col-md-8 ">
                
                  
                    <div class="box-body">

                      <div id="view_material">
                        
                      </div>
                    
                    </div>

            </div>

      </div>

  </div>

   
  
</div>

<div class="modal" id="modal-material" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Select Material Data</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">              
              <div id="data_material">
                
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-info" type="button" data-dismiss="modal">Done</button>
          </div>
      </div>
    </div>
</div>


<div class="modal " id="modal-warning" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Error</h5>              
          </div>
          <div class="modal-body">              
              <div class="alert alert-danger text-center" id="data-warning">
                
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-info" type="button" data-dismiss="modal">Oke</button>
          </div>
      </div>
    </div>
</div>

<div class="modal " id="modal-no_bc"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
          <div id="data-no_bc">
            
          </div>
    </div>
</div>

<div class="modal " id="modal-form_no_bc" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="form-no_bc" method="post" action="<?php echo base_url() ; ?>transaksi/in/input_no_bc">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Customize Qty</h5>              
              </div>
              <div class="modal-body">              
                  <div class="col-md-12">
                    
                          <div class="form-group">
                              <label class="label pl-3">PO No</label>
                              <div class="col-md-12">
                                  <input type="text" id="no_bc_form" name="no_bc_form" class="form-control" style="background: transparent;" readonly >
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="label pl-3">Qty</label>
                              <div class="col-md-12">
                                  <input type="hidden" id="kode_no_bc" name="kode_no_bc" class="form-control">
                                  <input type="hidden" id="kode_transaksi_no_bc" name="kode_transaksi_no_bc" class="form-control">
                                  <input type="hidden" id="qty_pick" name="qty_pick" class="form-control">
                                  <input type="text" id="qty_no_bc" name="qty_no_bc" class="form-control">
                                  <span id="error_qty_no_bc" class="form-text text-danger mb-0"></span>
                              </div>
                          </div>
                          <div class="col-md-12 pl-4 pr-4">
                            <div class="alert alert-warning text-center row">
                              Make sure the Quantity Qty does not exceed
                              <div id="limit_qty" class="ml-2">
                                
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-info" type="button" id="close-modal-form_no_bc">Back</button>
                  <button class="btn btn-primary" type="submit" >Use</button>
              </div>
          </form>
      </div>
    </div>
</div>

<div class="modal " id="modal-detail"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
          <div id="data-detail">
            
          </div>
    </div>
</div>

<div class="modal " id="modal-edit_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form_edit_list" method="post" action="<?php echo base_url() ; ?>transaksi/in/update_list">
          <div id="data-edit_list">
            
          </div>
        </form>
    </div>
</div>

<div class="modal " id="modal-no_bc_edit_list"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
          <div id="data-no_bc_edit_list">
            
          </div>
    </div>
</div>


<div class="modal " id="modal-form_no_bc_edit_list" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="form-no_bc_edit_list" method="post" action="<?php echo base_url() ; ?>transaksi/in/tambah/input_no_bc_edit">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Customize Qty</h5>              
              </div>
              <div class="modal-body">              
                  <div class="col-md-12">
                    
                          <div class="form-group">
                              <label class="label pl-3">PO No</label>
                              <div class="col-md-12">
                                  <input type="text" id="no_bc_form_edit_list" name="no_bc_form" class="form-control" style="background: transparent;" readonly >
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="label pl-3">Qty</label>
                              <div class="col-md-12">
                                  <input type="hidden" id="id_material_edit_list" name="id_material" class="form-control">
                                  <input type="hidden" id="id_list_transaksi_edit_list" name="id_list_transaksi" class="form-control">
                                  <input type="hidden" id="kode_no_bc_edit_list" name="kode_no_bc" class="form-control">
                                  <input type="hidden" id="kode_transaksi_no_bc_edit_list" name="kode_transaksi_no_bc" class="form-control">
                                  <input type="hidden" id="qty_pick_edit_list" name="qty_pick" class="form-control">
                                  <input type="text" id="qty_no_bc_edit_list" name="qty_no_bc" class="form-control">
                                  <span id="error_qty_no_bc_edit_list" class="form-text text-danger mb-0"></span>
                              </div>
                          </div>
                          <div class="col-md-12 pl-4 pr-4">
                            <div class="alert alert-warning text-center row">
                              Make sure the Quantity Qty does not exceed
                              <div id="limit_qty_edit_list" class="ml-2">
                                
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-info" type="button" id="close-modal-form_no_bc_edit_list">Back</button>
                  <button class="btn btn-primary" type="submit" >Use</button>
              </div>
          </form>
      </div>
    </div>
</div>


<div class="modal " id="modal-form_no_bc_detail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="form-no_bc_detail" method="post" action="<?php echo base_url() ; ?>transaksi/in/tambah/input_no_bc">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Customize Qty</h5>              
              </div>
              <div class="modal-body">              
                  <div class="col-md-12">
                    
                          <div class="form-group">
                              <label class="label pl-3">PO No</label>
                              <div class="col-md-12">
                                  <input type="text" id="no_bc_form_detail" name="no_bc_form" class="form-control" style="background: transparent;" readonly >
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="label pl-3">Qty</label>
                              <div class="col-md-12">
                                  <input type="hidden" id="kode_no_bc_detail" name="kode_no_bc" class="form-control">
                                  <input type="hidden" id="kode_transaksi_no_bc_detail" name="kode_transaksi_no_bc" class="form-control">
                                  <input type="hidden" id="qty_pick_detail" name="qty_pick" class="form-control">
                                  <input type="text" id="qty_no_bc_detail" name="qty_no_bc" class="form-control">
                                  <span id="error_qty_no_bc_detail" class="form-text text-danger mb-0"></span>
                              </div>
                          </div>
                          <div class="col-md-12 pl-4 pr-4">
                            <div class="alert alert-warning text-center row">
                               Make sure the Quantity Qty does not exceed
                              <div id="limit_qty_detail" class="ml-2">
                                
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-info" type="button" id="close-modal-form_no_bc_detail">Back</button>
                  <button class="btn btn-primary" type="submit" >Use</button>
              </div>
          </form>
      </div>
    </div>
</div>


<script type="text/javascript">
  var base_url = "<?php echo base_url() ; ?>" ;
  var kode = "<?php echo $kode_transaksi ; ?>"
</script>

<div id="debug">
  
</div>