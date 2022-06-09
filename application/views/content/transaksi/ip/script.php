<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/js/demo/datatables-demo.js"></script>

<script type="text/javascript">
$(document).ready(function(){

  $(document).on('click','#hapus',function(e){
    e.preventDefault();

         href = $(this).attr('data-id');
         Swal.fire({
          title: 'Are You Sure..?',
          text: "Selected Transaction Data will be deleted..!!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Delete Data',
          cancelButtonText: 'Cancel'
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
          title: 'Transaction Data',
          text: 'success ' + flashData,
          timer: 1500,
          confirmButtonText: 'Done'
        })
      }

     

});
</script>
