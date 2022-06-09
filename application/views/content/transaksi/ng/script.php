<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
  
$(document).ready(function() {


  $(document).on('click','#hapus',function(e){
          e.preventDefault();
          id = $(this).attr('data-id');
          console.log(id);
          $.post('<?php echo base_url();?>transaksi/ng/data/konfirmasi',
            {
              id:$(this).attr('data-id'),
            },
            function(html){
              $('#modal-hapus').modal('show');
              $("#data-konfirmasi").html(html);
            }) ;
        });



}) ;
</script>