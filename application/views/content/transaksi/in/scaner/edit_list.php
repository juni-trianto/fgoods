<div class="modal-content">
    
        <div class="modal-header">

            <h5 class="modal-title" id="exampleModalLabel"><?php echo $title ; ?></h5>

            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">×</span>

            </button>

        </div>

        <div class="modal-body ">        
           

            <div class="col-md-12 p-4">        
                    <input type="hidden" name="id_list_transaksi" value="<?php echo $id_list_transaksi ; ?>">
                    <input type="hidden" name="id_temp_list_transaksi" value="<?php echo $id_temp_list_transaksi ; ?>">
                  <div class="form-group">
                      <label class="label pl-3">Item</label>
                      <div class="col-md-12">
                          <input type="text" name="item" class="form-control" value="<?php echo $item ;?>" readonly>
                          
                      </div>
                  </div>       

                  <div class="form-group">
                      <label class="label pl-3">Kode</label>
                      <div class="col-md-12">

                          <input type="text" name="kode" class="form-control" value="<?php echo $kode ;?>" readonly>
                          
                      </div>
                  </div>       

                  <div class="form-group p-2">

                              <div class="input-group p-1">
                                
                                <input type="text" id="qty_edit_list" name="qty" class="form-control" onkeyup="convertToRupiah(this);" readonly style="background: transparent;">
                                <div class="input-group-append">
                                    <button 
                                          type="button" 
                                          class="input-group-text text-dark" 
                                          id="browse-no_bc_edit_list" 
                                          data-kode="<?php echo $kode ; ?>" 
                                          data-kode_transaksi="<?php echo $kode_transaksi ; ?>" 
                                          data-qty="<?php echo $qty ; ?>" 
                                          data-item="<?php echo $item ; ?>" 
                                          data-id_material="<?php echo $id_material ; ?>" 
                                          style="background: transparent;"
                                    >
                                      Pilih No BC
                                    </button>
                                </div>

                              </div>
                              <span id="error_qty_edit_list_material" class="form-text text-danger mb-0"></span>
                  </div>
                  <div class="form-group pl-3">
                    <div id="list_no_bc_edit"></div>
                  </div>

                  

            </div>

        </div>

        <div class="modal-footer">

            <button class="btn btn-info" type="button" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success" >Simpan</button>

        </div>

    </form>
</div>