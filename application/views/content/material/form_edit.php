<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $title ; ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="modal-body ">               

        <div class="col-md-12 ">

                  <input type="hidden" name="id_material" value="<?php echo $id_material ; ?>">
            			<input type="hidden" name="url" value="<?php echo $url ; ?>">

                      <div class="form-group">
                          <label class="label pl-3">Item</label>
                          <div class="col-md-12">
                              <input type="text" name="item" class="form-control" value="<?php echo $item ;?>">
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('item') ?></span>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="label pl-3">Code</label>
                          <div class="col-md-12">
                              <input type="text" name="kode" class="form-control" value="<?php echo $kode ;?>">
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('kode') ?></span>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="label pl-3">Status</label>
                          <div class="col-md-12">
                              <input type="text" name="status" class="form-control" value="<?php echo $status ;?>">
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('status') ?></span>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="label pl-3">Unit</label>
                          <div class="col-md-12">
                              <input type="text" name="unit" class="form-control" value="<?php echo $unit ;?>">
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('unit') ?></span>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="label pl-3">Division Code</label>
                          <div class="col-md-12">
                              <select name="kode_divisi" class="form-control" >
                                <option value="" >Select Division</option>
                                  <?php
                                    foreach ($hasil as $row) {
                                  ?>
                                    <option value="<?php echo $row->kode_divisi ; ?>" <?php if($row->kode_divisi == $kode_divisi) { ?> selected <?php } ?> ><?php echo $row->nama_divisi ; ?></option>
                                  <?php } ?>
                              </select>
                              <span class="form-text" style="margin-bottom: 1px;color: red;"><?php echo form_error('kode_divisi') ?></span>
                          </div>
                      </div>

                    

        </div>

    </div>

    <div class="modal-footer">
        <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary float-right" type="submit">Save</button>
    </div>

</div>