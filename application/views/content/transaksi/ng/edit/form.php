<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4>Add Materials</h4>
  </div>
  
  <div class="card-body " >

      <div class="col-md-12 row justify-content-center "  >

        <div class="col-md-12 row">
            <div class="col-md-5 p-2" >
              <div class="col-md-12 pl-0 mb-2">
                Transaction
              </div>
              <div class="col-md-12 p-2" style="border:1px #ddd solid;">
                <table style="font-size: 13px; width: 100%">
                  
                  <tr>
                    <td class="p-2" style="width: 120px ;">
                      Ts Code
                    </td>
                    <td class="p-2"  style="width: 2px">
                      :
                    </td>
                    <td class="p-2" style="vertical-align: middle;">
                      <input type="text" id="kode_transaksi" class="form-control form-control-sm" value="<?php echo $kode_transaksi ; ?>" readonly>
                    </td>
                  </tr>

                  <tr>
                      <td class="p-2">
                        Date
                      </td>
                      <td class="p-2"  style="width: 2px">
                        :
                      </td>
                      <td class="p-2" style="vertical-align: middle;">
                        <input type="date" id="tgl" name="tanggal" class="form-control form-control-sm" value="<?php echo $tanggal ; ?>">
                      </td>
                  </tr>


                </table>
              </div>

              <div class="col-md-12 ">
                <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('tanggal') ?></span>
                <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('no_bc') ?></span>
              </div>

            </div>

            <div class="col-md-7 p-2" >
              <div class="col-md-12 pl-3 mb-2">
                Material
              </div>
              <div class="col-md-12 ml-2 p-2" style="border:1px #ddd solid;">
                <form id="form_material" method="post" action="<?php echo base_url() ; ?>transaksi/ng/tambah/input_material" >
                  <table style="font-size: 13px ;width: 100%;">
                          <tr>
                            <td class="p-2" style="width: 100px;">
                              Code
                            </td>
                            <td class="p-2"  style="width: 2px">
                              :
                            </td>
                            <td class="p-2">                                 
                                
                             <div class="input-group input-group-sm ">
                                <div class="input-group-prepend col-md-4 p-0">
                                  <input type="hidden" name="id_material" id="id_material">                                
                                  <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ; ?>" >
                                  <input type="text" id="kode" name="kode" class="form-control form-control-sm" readonly>
                                </div>
                                <input type="text" id="item" name="item" class="form-control" readonly>
                                <div class="input-group-append">                                  
                                              
                                    <button type="button" class="btn btn-success input-group-text" id="browse-material"><i class="fa fa-ellipsis-v"></i></button>
                                             
                                </div>
                              </div>

                            </td>
                          </tr>

                       

                          <tr>
                            <td class="p-2">
                              Qty
                            </td>
                            <td class="p-2"  style="width: 2px">
                              :
                            </td>
                            <td class="p-2">
                              <div class="input-group input-group-sm ">
                                
                                <input type="text" id="qty" name="qty" class="form-control form-control-sm" onkeyup="convertToRupiah(this);" readonly style="background: transparent;">
                                <div class="input-group-append">
                                    <button type="button" class="input-group-text text-dark" id="browse-no_bc" style="background: transparent;">Select PO No</button>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="p-2" style="width: 100px;vertical-align: top;">
                              PO No
                            </td>
                            <td class="p-2"  style="width: 2px">
                              :
                            </td>
                            <td class="p-2">
                              <div id="data-list_no_bc"></div>
                            </td>
                          </tr>


                          <tr>
                            
                            <td class="p-2" colspan="3">
                              <button type="submit" class="btn btn-success btn-sm float-right">Add </button>
                            </td>
                          </tr>

                        </table>
                    </form>


              </div>       
              <div class="col-md-12 ">
                <span id="error_id_material" class="form-text text-danger mb-0"></span>
                <span id="error_qty" class="form-text text-danger mb-0"></span>
              </div>
            </div>

            
        </div>
         
      </div>



      <div class="col-md-12 pt-3 pb-3 mb-3 " style="border-bottom: 1px #ddd solid;">
        <h5>List Material</h5>
      </div>

      <div class="col-md-12 row justify-content-center pt-3"  >

            <div class="col-md-8 ">
                
                  
                    <div class="box-body">

                      <div id="list_material">
                        
                      </div>
                    
                    </div>

            </div>

      </div>

  </div>

    <div class="col-md-12 pt-4 mb-5" style="border-top: 1px #ddd solid;z-index: 1">
      <form method="post" action="<?php echo $action ; ?>">
        <div class="form-group">
          <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi ; ?>">
            <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ; ?>">
            <input type="hidden" id="tanggal" name="tanggal" value="<?php echo $tanggal ; ?>">                            
            <input type="hidden" id="no_bc" name="no_bc" value="<?php echo $no_bc ; ?>">
            <div class="col-md-12">
              <button class="btn btn-primary float-right" type="submit">Save</button>
              <a href="<?php echo base_url() ; ?>transaksi/ng" class="btn btn-info float-right mr-2">Cancel</a>
            </div>

        </div>
      </form>
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
          <form id="form-no_bc" method="post" action="<?php echo base_url() ; ?>transaksi/ng/input_no_bc">
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
                              Make sure the Qty Count does not exceed
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
          <form id="form-no_bc_edit_list" method="post" action="<?php echo base_url() ; ?>transaksi/ng/tambah/input_no_bc_edit">
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
                              Make sure the Qty Count does not exceed
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
          <form id="form-no_bc_detail" method="post" action="<?php echo base_url() ; ?>transaksi/ng/tambah/input_no_bc">
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
                              Make sure the Qty Count does not exceed
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