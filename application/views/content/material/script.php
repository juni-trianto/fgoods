
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/js/demo/datatables-demo.js"></script>


<script type="text/javascript">
    (function($) {
    'use strict';
      $(function() {
        $('#browse').on('click', function() {
          var file = $(this).parent().parent().parent().find('#upload-default');
          file.trigger('click');
        });
        $('#upload-default').on('change', function() {
          $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
      });
    })(jQuery);
</script>


<script type="text/javascript">
$(document).ready(function(){
  material = "<?php echo base_url() ; ?>material/data"
$('#data-material').load(material) ;


  $(document).on('click','#hapus',function(e){
          e.preventDefault();
          id = $(this).attr('data-id');
          console.log(id);
          $.post('<?php echo base_url();?>material/konfirmasi',
            {
              id:$(this).attr('data-id'),
            },
            function(html){
              $("#data-konfirmasi").html(html);
              $('#modal-hapus').modal('show');
            }) ;
        });


  $(document).on('click','#delete',function(e){
          e.preventDefault();
          id = $(this).attr('data-id');
          console.log(id);
          $.post('<?php echo base_url();?>material/hapus',
            {
              id:$(this).attr('data-id'),
            },
            function(html){
              $("#data-konfirmasi").html(html);
              $('#modal-hapus').modal('hide');
            }) ;
        });


  $(document).on('click','#edit',function(e){
          e.preventDefault();
          id = $(this).attr('data-id');
          url = $(this).attr('data-url');
          console.log(id);
          $.post('<?php echo base_url();?>material/edit',
            {
              id:$(this).attr('data-id'),
              url:$(this).attr('data-url'),
            },
            function(html){
              $("#data-form_edit").html(html);
              $('#modal-edit').modal('show');
            }) ;
        });


   $('#form_edit').submit(function(e){
          e.preventDefault(); 

          $("#error_id_material").html('');
          $("#error_item").html('');
          $("#error_kode").html('');
          $("#error_status").html('');
          $("#error_unit").html('');
          $("#error_kode_divisi").html('');
          

          $.ajax({
          url:base_url+'material/update',
          type:"post",
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
                          var hasil = JSON.parse(data);
                          if (hasil.hasil !== "sukses") {
                              $("#error_id_material").html(hasil.error.id_material);
                              $("#error_kode").html(hasil.error.kode);
                          } else {              
                              $('#modal-edit').modal('hide');
                              $("#id_material").val('');
                              $("#item").val('');
                              $("#kode").val('');
                              $("#status").val('');
                              $("#unit").val('');
                              $("#kode_divisi").val('');
                              $('#data-material').load(material);
                            
                            }
                    }
          });
      
   });
  


  $(document).on('click','#hapusss',function(e){
    e.preventDefault();

         href = $(this).attr('data-id');
         Swal.fire({
          title: 'Are You Sure..?',
          text: "Selected material data will be deleted..!!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Hapus Data',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.value) {
            document.location.href = href ;

          }
        })
  });

   

  
    var flashData = $('#flash-data').data('flashdata') ;
      if(flashData)
      {

        Swal.fire({
          icon: 'success',
          title: 'Data Material',
          text: 'Berhasil ' + flashData,
          timer: 1500,
          confirmButtonText: 'Beres'
        })
      }

     

});
</script>
