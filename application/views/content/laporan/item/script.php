
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


  var data_material = "<?php echo base_url() ; ?>laporan/item/material" ;

  $('#data_material').load(data_material);

  $(document).on('click', '#browse-material', function (e) {
      $('#data_material').load(data_material);
    $('#modal-material').modal('show');
  }); 



  $(document).on('click', '#pick_material', function (e) {

      id_material = $(this).attr('data-id_material');
      item = $(this).attr('data-item');
      kode = $(this).attr('data-kode');

    $("#id_material").val(id_material);
    $("#item").val(item);
    $("#kode").val(kode);

    $('#modal-material').modal('hide');
  }); 



  $(document).on('click','#preview',function(e){
    e.preventDefault();
    from = $("#from").val() ;
    to = $("#to").val() ;
    kode = $("#kode").val() ;

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

      link = "<?php echo base_url() ; ?>laporan/item/preview/"+from+"/"+to ;  
      
      location.href= link;
    }
    
    
  });

 

  $(document).on('click','#filter',function(e){
    e.preventDefault();
    from = $("#from").val() ;
    to = $("#to").val() ;
    kode = $("#kode").val() ;

    if (kode == '') {
      $('#modal-warning').modal('show');
      $("#warning").html("Pilih Kode Material");
    }

    else
    {

      link = "<?php echo base_url() ; ?>laporan/item/filter/"+kode+"/"+from+"/"+to ;  
      
      location.href= link;
    }
    
    
  });


  $(document).on('click','#reset',function(e){
    e.preventDefault();
    from = $("#from").val() ;
    to = $("#to").val() ;

      link = "<?php echo base_url() ; ?>laporan/item/preview/"+from+"/"+to ;  
      
      location.href= link;
    
  });

  $(document).on('click','#preview_excel',function(e){
    e.preventDefault();
    from = $("#from").val() ;
    to = $("#to").val() ;

      link = "<?php echo base_url() ; ?>laporan/item/preview_excel_v2/"+from+"/"+to ;  
      
      location.href= link;
    
  });



  $(document).on('click','#filter_excel',function(e){
    e.preventDefault();
    from = $("#from").val() ;
    to = $("#to").val() ;
    kode = $("#kode").val() ;

      link = "<?php echo base_url() ; ?>laporan/item/filter_excel_v2/"+kode+"/"+from+"/"+to ;  
      
      location.href= link;
    
  });


  

});
</script>

