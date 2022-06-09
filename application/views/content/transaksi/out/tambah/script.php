<script type="text/javascript">
  function convertToRupiah(objek) {
    separator = "."; 
    a = objek.value;
    b = a.replace(/[^\d]/g,"");
    c = "";
    panjang = b.length; 
    j = 0; 
    for (i = panjang; i > 0; i--) {
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)) {
        c = b.substr(i-1,1) + separator + c;
      } else {
        c = b.substr(i-1,1) + c;
      }
    }
    objek.value = c;

  }       

  function convertToAngka()
  { var nominal= document.getElementById("nominal").value;
    var angka = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
    document.getElementById("angka").innerHTML= angka;
  }       

  function convertToAngka()
  { var nominal1= document.getElementById("nominal1").value;
    var angka1 = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
    document.getElementById("angka1").innerHTML= angka;
  }
  
</script>

<script type="text/javascript">
  $(document).ready(function() {

        var list_material = "<?php echo base_url() ; ?>transaksi/out/tambah/list_transaksi/"+kode ;
        var data_material = "<?php echo base_url() ; ?>transaksi/out/tambah/data_material/"+kode ;
        $('#list_material').load(list_material);
        $(document).on('click', '#browse-material', function (e) {
            $('#data_material').load(data_material);
          $('#modal-material').modal('show');
        });


        $(document).on('click', '#pick_material', function (e) {

          kode_transaksi = $("#kode_transaksi").val();
          id_material = $(this).attr('data-id_material');
          item = $(this).attr('data-item');
          kode = $(this).attr('data-kode');
          no_bc = $(this).attr('data-no_bc');

        $("#id_material").val(id_material);
        $("#item").val(item);
        $("#kode").val(kode);
        $("#no_bc").val(no_bc);
        $('#modal-material').modal('hide');

        var list_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/list_no_bc/"+kode+"/"+kode_transaksi ;
        var jml_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/jml_qty_temp_no_bc/"+kode+"/"+kode_transaksi;
        
        $("#data-list_no_bc").load(list_no_bc);
        $.get(jml_no_bc, function(result) { 
          $('#qty').val(result);
        });

        console.log(jml_no_bc) ;
        
      }); 


      $(document).on('click', '#browse-no_bc', function (e) {
        e.preventDefault();

        kode_transaksi = $("#kode_transaksi").val() ;
        no_bc = $("#no_bc").val() ;
        kode = $("#kode").val() ;
        if(kode == '')
        {
          $("#modal-warning").modal('show') ;
          $("#data-warning").html('Pilih Kode Barang / Material') ;
        }
        else
        {
          
          var data_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/data_no_bc/"+kode+"/"+no_bc ;
          $("#modal-no_bc").modal('show') ;
          $("#data-no_bc").load(data_no_bc) ;
        }

      }); 

      $(document).on('click', '#pick-no_bc', function (e) {

      kode_transaksi = $("#kode_transaksi").val();
      id_material = $(this).attr('data-id_material');
      item = $(this).attr('data-item');
      kode = $(this).attr('data-kode');
      no_bc = $(this).attr('data-no_bc');
      qty = $(this).attr('data-qty');
      $("#no_bc_form").val(no_bc);
      $("#qty_pick").val(qty);
      $("#limit_qty").html(qty);
      $("#kode_transaksi_no_bc").val(kode_transaksi);
      $("#kode_no_bc").val(kode);
      $('#modal-no_bc').modal('hide');
      $('#modal-form_no_bc').modal('show');

  }); 


  $(document).on('click', '#close-modal-form_no_bc', function (e) {
    e.preventDefault();
    $('#modal-form_no_bc').modal('hide');
    $('#modal-no_bc').modal('show');
  });     

   $('#form-no_bc').submit(function(e){
          e.preventDefault(); 

          $("#error_qty_no_bc").html('');
          

          $.ajax({
          url:base_url+'transaksi/out/tambah/input_no_bc',
          type:"post",
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
                          var hasil = JSON.parse(data);
                          if (hasil.hasil !== "sukses") {
                              $("#error_qty_no_bc").html(hasil.error.qty_no_bc);
                          } else {    
                              $('#modal-form_no_bc').modal('hide');
                              $("#qty_no_bc").val('');
                              
                                kode = $("#kode").val();
                                kode_transaksi = $("#kode_transaksi").val();
                                
                                var list_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/list_no_bc/"+kode+"/"+kode_transaksi ;
                                var jml_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/jml_qty_temp_no_bc/"+kode+"/"+kode_transaksi;
                                $("#data-list_no_bc").load(list_no_bc);
                                $.get(jml_no_bc, function(result) { 
                                  $('#qty').val(result);
                                });
                                console.log(kode) ;

                            }
                    }
          });
      
   });

  $(document).on('click','#hapus_temp_no_bc',function(e){
      e.preventDefault();
      id = $(this).attr('data-id');    
        $.post(base_url+'transaksi/out/tambah/hapus_temp_no_bc',
          {
            id:$(this).attr('data-id'),
          },
          function(html){
              kode = $("#kode").val();
              kode_transaksi = $("#kode_transaksi").val();
              $("#kode").val(kode);
              
              var list_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/list_no_bc/"+kode+"/"+kode_transaksi ;
              var jml_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/jml_qty_temp_no_bc/"+kode+"/"+kode_transaksi;
              $("#data-list_no_bc").load(list_no_bc);
              $.get(jml_no_bc, function(result) { 
                $('#qty').val(result);
              });
              console.log(kode) ;
          });
          
         
                 
        }) ;


  $(document).on('click', '#detail', function (e) {
    e.preventDefault(); 

    $.post('<?php echo base_url();?>transaksi/out/tambah/detail_qty',
      {

        id_material : $(this).attr('data-id_material'),
        item : $(this).attr('data-item'),
        kode : $(this).attr('data-kode'),
        tanggal : $(this).attr('data-tanggal'),
        no_bc : $(this).attr('data-no_bc'),
        qty : $(this).attr('data-qty'),
      },
      function(html){        
        $("#data-detail").html(html);        
        $('#modal-material').modal('hide');
        $('#modal-detail').modal('show');
      }) ;
  }); 


      $(document).on('click', '#pick-no_bc_detail', function (e) {

      kode_transaksi = $("#kode_transaksi").val();
      id_material = $(this).attr('data-id_material');
      item = $(this).attr('data-item');
      kode = $(this).attr('data-kode');
      no_bc = $(this).attr('data-no_bc');
      qty = $(this).attr('data-qty');
      
      $("#kode_transaksi").val(kode_transaksi);
      $("#id_material").val(id_material);
      $("#item").val(item);
      $("#kode").val(kode);
      $("#no_bc").val(no_bc);

      $("#no_bc_form_detail").val(no_bc);
      $("#qty_pick_detail").val(qty);
      $("#limit_qty_detail").html(qty);
      $("#kode_transaksi_no_bc_detail").val(kode_transaksi);
      $("#kode_no_bc_detail").val(kode);
      $('#modal-detail').modal('hide');
      $('#modal-form_no_bc_detail').modal('show');

  }); 


  $(document).on('click', '#close-modal-form_no_bc_detail', function (e) {
    e.preventDefault();
    $('#modal-form_no_bc_detail').modal('hide');
    $('#modal-detail').modal('show');
  });     


   $('#form-no_bc_detail').submit(function(e){
          e.preventDefault(); 

          $("#error_qty_no_bc_detail").html('');
          

          $.ajax({
          url:base_url+'transaksi/out/tambah/input_no_bc',
          type:"post",
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
                          var hasil = JSON.parse(data);
                          if (hasil.hasil !== "sukses") {
                              $("#error_qty_no_bc_detail").html(hasil.error.qty_no_bc);
                          } else {    
                              $('#modal-form_no_bc_detail').modal('hide');
                              $("#qty_no_bc_detail").val('');
                              
                                kode = $("#kode").val();
                                kode_transaksi = $("#kode_transaksi").val();
                                $("#kode").val(kode);
                                
                                var list_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/list_no_bc/"+kode+"/"+kode_transaksi ;
                                var jml_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/jml_qty_temp_no_bc/"+kode+"/"+kode_transaksi;
                                $("#data-list_no_bc").load(list_no_bc);
                                $.get(jml_no_bc, function(result) { 
                                  $('#qty').val(result);
                                });

                                console.log(kode);

                            }
                    }
          });
      
   });


   $('#form_material').submit(function(e){
          e.preventDefault(); 

          $("#error_id_material").html('');
          $("#error_qty").html('');
          

          $.ajax({
          url:base_url+'transaksi/out/tambah/input_material',
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
                              $("#error_qty").html(hasil.error.qty);
                          } else {              
                              $("#id_material").val('');
                              $("#kode").val('');
                              $("#item").val('');
                              $("#qty").val('');
                              $('#list_material').load(list_material);
                              $("#data-list_no_bc").html('');
                            }
                    }
          });
      
   });

    $(document).on('click','#hapus_list',function(e){
        e.preventDefault();
        id = $(this).attr('data-id');
        $('#materai').val('0');
          $.post(base_url+'transaksi/out/tambah/hapus_list_material',
            {
              id:$(this).attr('data-id'),
            },
            function(html){
              $('#list_material').load(list_material);
              $('#debug').html(html);
            });
            
           
                   
          }) ;


    $(document).on('click','#edit_list',function(e){
    e.preventDefault();
    id = $(this).attr('data-id');
    kode = $(this).attr('data-kode');
    kode_transaksi = $(this).attr('data-kode_transaksi');
    $.post('<?php echo base_url();?>transaksi/out/tambah/edit_list_material',
      {
        id:$(this).attr('data-id'),
      },
      function(html){
        $('#modal-edit_list').modal('show');
        $("#data-edit_list").html(html);
        
        
        var list_no_bc_edit = "<?php echo base_url() ; ?>transaksi/out/tambah/list_no_bc_edit/"+kode+"/"+kode_transaksi ;
        var jml_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/jml_qty_no_bc_edit/"+kode+"/"+kode_transaksi;
        
        $.get(jml_no_bc, function(result) { 
          $('#qty_edit_list').val(result);
        });

        $("#list_no_bc_edit").load(list_no_bc_edit);
        console.log(jml_no_bc);
        console.log('-')
        console.log(list_no_bc_edit);
      }) ;
  });


  $(document).on('click','#hapus_no_bc_edit_list',function(e){
    e.preventDefault();
    id = $(this).attr('data-id');    
    kode = $(this).attr('data-kode');    
    kode_transaksi = $(this).attr('data-kode_transaksi');   

    qty = $(this).attr('data-qty');   
     
      $.post(base_url+'transaksi/out/tambah/hapus_no_bc_edit',
        {
          id:$(this).attr('data-id'),
          qty:qty,
        },
        function(html){
            
            
            var list_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/list_no_bc_edit/"+kode+"/"+kode_transaksi ;
            var jml_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/jml_qty_no_bc_edit/"+kode+"/"+kode_transaksi;
            $("#list_no_bc_edit").load(list_no_bc);
            $.get(jml_no_bc, function(result) { 
              $('#qty_edit_list').val(result);
            });
        });                      
      }) ;


    $(document).on('click', '#browse-no_bc_edit_list', function (e) {
      e.preventDefault();
      kode = $(this).attr('data-kode') ;
      
      kode_transaksi = $(this).attr('data-kode_transaksi') ;   
       var data_no_bc_edit = "<?php echo base_url() ; ?>transaksi/out/tambah/data_no_bc_edit_list/"+kode+"/"+kode_transaksi ;
        $("#modal-no_bc_edit_list").modal('show') ;
        $("#data-no_bc_edit_list").load(data_no_bc_edit) ;
         $("#modal-edit_list").modal('hide') ;
         console.log(kode) ;
    }); 

  $(document).on('click', '#pick-no_bc_edit_list', function (e) {

      kode_transaksi = $("#kode_transaksi").val();
      id_list_transaksi = $(this).attr('data-id');
      id_material = $(this).attr('data-id_material');
      item = $(this).attr('data-item');
      kode = $(this).attr('data-kode');
      no_bc = $(this).attr('data-no_bc');
      qty = $(this).attr('data-qty');
      
      $("#id_material_edit_list").val(id_material);
      $("#id_list_transaksi_edit_list").val(id_list_transaksi);
      $("#no_bc_form_edit_list").val(no_bc);
      $("#qty_pick_edit_list").val(qty);
      $("#limit_qty_edit_list").html(qty);
      $("#kode_transaksi_no_bc_edit_list").val(kode_transaksi);
      $("#kode_no_bc_edit_list").val(kode);
      $('#modal-no_bc_edit_list').modal('hide');
      $('#modal-form_no_bc_edit_list').modal('show');

  }); 


  $(document).on('click', '#close-modal-form_no_bc_edit_list', function (e) {
    e.preventDefault();
    $('#modal-form_no_bc_edit_list').modal('hide');
    $('#modal-no_bc_edit_list').modal('show');
  }); 

  $(document).on('click', '#close-modal_no_bc_edit', function (e) {
    e.preventDefault();
    $('#modal-no_bc_edit_list').modal('hide');
    $('#modal-edit_list').modal('show');
  }); 

   $('#form-no_bc_edit_list').submit(function(e){
          e.preventDefault(); 

          $("#error_qty_no_bc_edit_list").html('');
          kode = $("#kode_no_bc_edit_list").val() ;
          kode_transaksi = $("#kode_transaksi_no_bc_edit_list").val() ;
          id_material = $("#id_material_edit_list").val() ;
          
          $.ajax({
          url:base_url+'transaksi/out/tambah/input_no_bc_edit',
          type:"post",
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
                          var hasil = JSON.parse(data);
                          if (hasil.hasil !== "sukses") {
                              $("#error_qty_no_bc_edit_list").html(hasil.error.qty_no_bc);
                          } else {
                                var list_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/list_no_bc_edit/"+kode+"/"+kode_transaksi ;
                                var jml_no_bc = "<?php echo base_url() ; ?>transaksi/out/tambah/jml_qty_no_bc_edit/"+kode+"/"+kode_transaksi;
                                $("#list_no_bc_edit").load(list_no_bc);
                                $.get(jml_no_bc, function(result) { 
                                  $('#qty_edit_list').val(result);
                                });
                                
                                $('#modal-form_no_bc_edit_list').modal('hide');
                                $("#modal-edit_list").modal('show') ;
                                $("#list_material").load(list_material) ;
                                $("#qty_no_bc_edit_list").val('');
                            }
                    }
          });
          
      
   });



   $('#form_edit_list').submit(function(e){
          e.preventDefault(); 

          $("#error_qty_edit_list_material").html('');
          

          $.ajax({
          url:base_url+'transaksi/out/tambah/update_list',
          type:"post",
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
                          var hasil = JSON.parse(data);
                          if (hasil.hasil !== "sukses") {
                              $("#error_qty_edit_list_material").html(hasil.error.qty);
                          } else {              
                              $("#kode").val('');
                              $("#item").val('');
                              $("#qty").val('');
                              $('#list_material').load(list_material);
                              $('#modal-edit_list').modal('hide');
                              
                            }
                    }
          });
      
   });

   
  $(document).on('change','#tgl',function(e){
    e.preventDefault();
    tanggal = $("#tgl").val();
    $('#tanggal').val(tanggal) ;
    console.log(tanggal) ;
    
  });


  });
</script>