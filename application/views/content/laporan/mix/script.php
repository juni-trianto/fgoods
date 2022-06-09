
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


  $(document).on('click','#preview',function(e){
    e.preventDefault();
    from = $("#from").val() ;
    to = $("#to").val() ;

    if (from == '') {
      $('#modal-warning').modal('show');
      $("#warning").html("Masukkan Tanggal awal");
    }
    else if(to == '')
    {      
      $('#modal-warning').modal('show');
      $("#warning").html("Masukkan Tanggal akhir");
    }
    else if(from > to)
    {     
      $('#modal-warning').modal('show');
      $("#warning").html("Tanggal akhir jangan mundur"); 
    }
    else
    {

      link = "<?php echo base_url() ; ?>laporan/mix/preview/"+from+"/"+to ;  
      
      location.href= link;
    }
    
    
  });

 
  

});
</script>

