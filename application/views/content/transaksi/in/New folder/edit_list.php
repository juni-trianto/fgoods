<div class="modal-content">
    <form id="form_edit_list" method="post" action="<?php echo base_url() ; ?>transaksi/in/input">
        <div class="modal-header">

            <h5 class="modal-title" id="exampleModalLabel"><?php echo $title ; ?></h5>

            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">×</span>

            </button>

        </div>

        <div class="modal-body ">        
           

            <div class="col-md-12 p-4">        
                    <input type="hidden" name="id_temp_list_transaksi" value="<?php echo $id_temp_list_transaksi ; ?>">
                  <div class="form-group">
                      <label class="label pl-3">Item</label>
                      <div class="col-md-12">
                          <input type="text" name="item" class="form-control" value="<?php echo $item ;?>" readonly>
                          
                      </div>
                  </div>       

                  <div class="form-group">
                      <label class="label pl-3">Code</label>
                      <div class="col-md-12">
                          <input type="text" name="kode" class="form-control" value="<?php echo $kode ;?>" readonly>
                          
                      </div>
                  </div>       

                  <div class="form-group">
                      <label class="label pl-3">Qty</label>
                      <div class="col-md-12">
                          <input type="text" name="qty" class="form-control" value="<?php echo $qty ;?>">                          
                      </div>
                  </div>

            </div>

        </div>

        <div class="modal-footer">

            <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" >Save</button>

        </div>

    </form>
</div>