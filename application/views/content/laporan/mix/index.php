
<div class="card shadow mb-4">
	
	<div class="card-header py-3 text-center" >
		<h3 style="font-weight: bold;"><?php echo $title ; ?></h3>
		</a>
	</div>

	
	<div class="card-body">
		<div class="table-responsive">
			<div class="col-md-12 p-0">
				
			</div>
			<div class="col-md-12 row justify-content-center">
				<div class="col-md-6 p-3">
		            <div class="col-md-12 p-3" style="border: 1px #ddd solid;">

		            	<label class="mb-3">Pilih Periode</label>

		                  <div class="form-group col-md-12 p-0" >
		                      
		                     <div class="input-group p-0" >

		                          <div class="col-md-5 p-0 " >
		                              <input id="from" type="date" class="form-control form-control-sm" >
		                          </div>

		                          <div class="col-md-2 p-0 text-center" >
		                              Sampai
		                          </div>
		                          
		                          <div class="col-md-5 p-0" >
		                              <input id="to" type="date" class="form-control form-control-sm" >
		                          </div>
		                      </div>
		                  </div>

		                  <div class="form-group col-md-12 p-0 mb-0 text-right" >
		                        <button id="preview" class="btn btn-primary btn-sm ">
		                            <i class="fas fa-search fa-sm text-white-50"></i>
		                            Preview
		                        </button>
		                  </div>


		            </div>
				</div>

			</div>

		</div>
	</div>

</div>


<div class="modal" id="modal-warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning..!!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
              
              <div class="col-md-12 text-center text-primary mt-2">
                <div class="alert alert-danger" id="warning">
                  
                </div>
              </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="button" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>
