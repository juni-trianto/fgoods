<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $title ; ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body ">        
       <table  width="100%">
                <tr>
                    <td style="width: 100px;">
                        Code
                    </td>
                    <td>
                        : <?php echo $kode ; ?>            
                    </td>
                </tr>
                <tr>
                    <td>
                        Item
                    </td>
                    <td>
                        : <?php echo $item ; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Qty Total
                    </td>
                    <td>
                        : <?php echo $qty ; ?>
                    </td>
                </tr>
            </table>

            <table class="table table-bordered table-hover table-sm">
                <tr>
                    <td>
                        Date
                    </td>
                    <td>
                        PO No
                    </td>
                    <td>
                        Qty
                    </td>
                </tr>
                <?php 
                    foreach($hasil as $row) :
                    $kode = $row->kode ;
                    $no_bc = $row->no_bc ;
                    $ji = $this->M_edit->jumlah_qty_in($kode, $no_bc) ;
                    $jo = $this->M_edit->jumlah_qty_out($kode, $no_bc) ;
                    $cek = $this->M_edit->cek_data_temp_no_bc($kode, $no_bc) ;
                ?>

                <?php 
                  if ($cek < 1) {
                ?>
                <tr

                id="pick-no_bc"
                data-id="<?php echo $row->id_list_transaksi ; ?>"
                data-kode="<?php echo $kode ; ?>"
                data-item="<?php echo $item ; ?>"
                data-kode="<?php echo $kode ; ?>"
                data-tanggal="<?php echo $row->tanggal ; ?>"
                data-no_bc="<?php echo $row->no_bc ; ?>"
                data-qty="<?php echo $row->qty - $jo->jml_qty  ?>"
                style="cursor: pointer;"
                >
                    <td>
                        <?php echo $row->tanggal ; ?>
                    </td>
                    <td>
                        <?php echo $row->no_bc ; ?>
                    </td>
                    <td>
                        <?php echo $row->qty - $jo->jml_qty  ?> 
                    </td>
                </tr>
                <?php } ?>
                <?php endforeach ; ?>
            </table>
        

    </div>
    <div class="modal-footer">
        <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>
    </div>
</div>