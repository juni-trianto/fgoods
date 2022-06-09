<div class="modal-content">

    <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel"><?php echo $title ; ?></h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">×</span>

        </button>

    </div>

    <div class="modal-body ">        

       

        <div class="col-md-12 text-center p-4">

            Are you sure want to delete this data. . .?

        </div>

    </div>

    <div class="modal-footer">

        <button class="btn btn-info" type="button" data-dismiss="modal">Cancel</button>

        <a id="delete" class="btn btn-danger" data-id="<?php echo $id_material ; ?>">Delete</a>

    </div>

</div>