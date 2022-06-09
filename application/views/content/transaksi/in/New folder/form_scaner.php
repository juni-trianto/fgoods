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
                      <input type="text"  class="form-control form-control-sm" value="<?php echo $kode_transaksi ; ?>" readonly>
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

                  <tr>
                      <td class="p-2">
                        BC NO
                      </td>
                      <td class="p-2"  style="width: 2px">
                        :
                      </td>
                      <td class="p-2" style="vertical-align: middle;">
                        <input type="text" id="no_bc_1" name="no_bc" class="form-control form-control-sm" value="<?php echo $no_bc ; ?>">
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
                <form id="form-scaner" method="post" action="<?php echo base_url() ; ?>transaksi/in/input_scaner" >
                  <table style="font-size: 13px ;width: 100%;">
                          <tr>
                            <td class="p-2" style="width: 100px;">
                              
                            </td>
                            <td class="p-2"  style="width: 2px">
                              
                            </td>
                            <td class="p-2">
                                 
                                
                             
                            </td>
                          </tr>

                      

                          <tr>
                            <td class="p-2">
                              Scan Kode 
                            </td>
                            <td class="p-2"  style="width: 2px">
                              :
                            </td>
                            <td class="p-2">
                              <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ; ?>">
                              <input type="text" id="kode_scaner" name="kode" class="form-control form-control-sm" autofocus >
                            </td>
                          </tr>

                          <tr>
                            
                            <td class="p-2" colspan="3"> 
                              
                            </td>
                          </tr>

                        </table>
                        <button type="submit"> submit</button>
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
        <h5 id="debug">List Material</h5>
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
            <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ; ?>">
            <input type="hidden" id="tanggal" name="tanggal" value="<?php echo $tanggal ; ?>">                            
            <input type="hidden" id="no_bc" name="no_bc" value="<?php echo $no_bc ; ?>">
            <div class="col-md-12">
              <button class="btn btn-primary float-right" type="submit">Save</button>
              <a href="<?php echo base_url() ; ?>transaksi/in" class="btn btn-info float-right mr-2">Cancel</a>
            </div>

        </div>
      </form>
    </div>
  
</div>

<div class="modal " id="modal-material" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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


<div class="modal " id="modal-warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Error</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">              
              <div id="data_warning">
                
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-info" type="button" data-dismiss="modal">Done</button>
          </div>
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


<div class="modal " id="modal-error_scaner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Error</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">        
            <div class=" alert alert-danger">
              <div id="data-error_scaner">
              </div>
              
            </div>      
          </div>
          <div class="modal-footer">
              <button class="btn btn-info" type="button" data-dismiss="modal">Done</button>
          </div>
      </div>
    </div>
</div>

<div class="modal " id="modal-qty_scaner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="form-qty_scaner">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enter Qty</h5>
              
                  
              </button>
          </div>
          <div class="modal-body">        
                <div class="col-md-12">
                    
                          <div class="form-group">
                              <label class="label pl-3">Code</label>
                              <div class="col-md-12">
                                  <input type="text" id="kode_scaner_qty" name="kode" class="form-control" style="background: transparent;" readonly >
                              </div>
                          </div>
                    
                          <div class="form-group">
                              <label class="label pl-3">Item</label>
                              <div class="col-md-12">
                                  <input type="text" id="item_scaner" name="item" class="form-control" style="background: transparent;" readonly >
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="label pl-3">Qty</label>
                              <div class="col-md-12">
                                  <input type="hidden" id="id_material_scaner" name="id_material" class="form-control">
                                  <input type="hidden" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ; ?>">
                                  
                                  <input type="text" id="qty_scaner" name="qty" class="form-control">
                                  <span id="error_qty_scaner" class="form-text text-danger mb-0"></span>
                              </div>
                          </div>
                          
                  </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary" type="button" id="close-modal-qty_scaner">Cencel</button>
              <button class="btn btn-success" type="submit" >Save</button>
          </div>
</form>
      </div>
    </div>
</div>


<script type="text/javascript">
  var base_url = "<?php echo base_url() ; ?>" ;
  var kode = "<?php echo $kode_transaksi ; ?>"
</script>