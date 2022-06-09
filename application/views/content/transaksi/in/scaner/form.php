<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4>Menambahkan Material</h4>
  </div>
  
  <div class="card-body " >

      <div class="col-md-12 row justify-content-center "  >

        <div class="col-md-12 row">
            <div class="col-md-5 p-2" >
              <div class="col-md-12 pl-0 mb-2">
                Transaksi
              </div>
              <div class="col-md-12 p-2" style="border:1px #ddd solid;">
                <table style="font-size: 13px; width: 100%">
                  
                  <tr>
                    <td class="p-2" style="width: 120px ;">
                      Kode Ts 
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
                        Tanggal
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
                <form id="form-scaner" method="post" action="<?php echo base_url() ; ?>transaksi/out/scaner/input_scaner" >
                  <table style="font-size: 13px ;width: 100%;">
                          

                       

                          <tr>
                            <td class="p-2">
                              Item
                            </td>
                            <td class="p-2"  style="width: 2px">
                              :
                            </td>
                            <td class="p-2">
                              <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ; ?>">
                              <input type="text" id="kode_scaner" name="kode" class="form-control form-control-sm" autofocus >
                          </tr>


                          <tr>
                            
                            <td class="p-2" colspan="3">
                              <button type="submit" class="btn btn-success btn-sm float-right">Tambahkan </button>
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
              <button class="btn btn-primary float-right" type="submit">Simpan</button>
              <a href="<?php echo base_url() ; ?>transaksi/out" class="btn btn-info float-right mr-2">Batal</a>
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
              <h5 class="modal-title" id="exampleModalLabel">Pilih Data Material</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">              
              <div id="data_material">
                
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-info" type="button" data-dismiss="modal">Beres</button>
          </div>
      </div>
    </div>
</div>


<div class="modal " id="modal-warning" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>              
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
          <form id="form-no_bc" method="post" action="<?php echo base_url() ; ?>transaksi/out/input_no_bc">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sesuaikan Qty</h5>              
              </div>
              <div class="modal-body">              
                  <div class="col-md-12">
                    
                          <div class="form-group">
                              <label class="label pl-3">No BC</label>
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
                              Pastikan Jumlah Qty tidak melebihi
                              <div id="limit_qty" class="ml-2">
                                
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-info" type="button" id="close-modal-form_no_bc">Kembali</button>
                  <button class="btn btn-primary" type="submit" >Gunakan</button>
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
          <form id="form-no_bc_edit_list" method="post" action="<?php echo base_url() ; ?>transaksi/out/input_no_bc_edit">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sesuaikan Qty</h5>              
              </div>
              <div class="modal-body">              
                  <div class="col-md-12">
                    
                          <div class="form-group">
                              <label class="label pl-3">No BC</label>
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
                              Pastikan Jumlah Qty tidak melebihi
                              <div id="limit_qty_edit_list" class="ml-2">
                                
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-info" type="button" id="close-modal-form_no_bc_edit_list">Kembali</button>
                  <button class="btn btn-primary" type="submit" >Gunakan</button>
              </div>
          </form>
      </div>
    </div>
</div>


<div class="modal " id="modal-form_no_bc_detail" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="form-no_bc_detail" method="post" action="<?php echo base_url() ; ?>transaksi/out/tambah/input_no_bc">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sesuaikan Qty</h5>              
              </div>
              <div class="modal-body">              
                  <div class="col-md-12">
                    
                          <div class="form-group">
                              <label class="label pl-3">No BC</label>
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
                              Pastikan Jumlah Qty tidak melebihi
                              <div id="limit_qty_detail" class="ml-2">
                                
                              </div>
                            </div>
                          </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-info" type="button" id="close-modal-form_no_bc_detail">Kembali</button>
                  <button class="btn btn-primary" type="submit" >Gunakan</button>
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