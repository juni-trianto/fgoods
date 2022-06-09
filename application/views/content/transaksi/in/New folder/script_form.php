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


  
  var list_material = "<?php echo base_url() ; ?>transaksi/in/list_transaksi/"+kode ;
  var data_material = "<?php echo base_url() ; ?>transaksi/in/data_material/"+kode ;

  $('#list_material').load(list_material);

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


   $('#form_material').submit(function(e){
          e.preventDefault(); 

          $("#error_id_material").html('');
          $("#error_qty").html('');
          

          $.ajax({
          url:base_url+'transaksi/in/input_material',
          type:"post",
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
                          var hasil = JSON.parse(data);
                          if (hasil.hasil !== "success") {
                              $("#error_id_material").html(hasil.error.id_material);
                              $("#error_qty").html(hasil.error.qty);
                          } else {              
                              $("#id_material").val('');
                              $("#kode").val('');
                              $("#item").val('');
                              $("#qty").val('');
                              $('#list_material').load(list_material);

                            }
                    }
          });
      
   });


  $(document).on('click','#hapus',function(e){
          e.preventDefault();
          id = $(this).attr('data-id');
          console.log(id);
          $.post('<?php echo base_url();?>transaksi/in/konfirmasi',
            {
              id:$(this).attr('data-id'),
            },
            function(html){
              $("#data-konfirmasi").html(html);
            }) ;
        });



$(document).on('click','#hapus_list',function(e){
    e.preventDefault();
    id = $(this).attr('data-id');
    $('#materai').val('0');
      $.post(base_url+'transaksi/in/hapus_list_material',
        {
          id:$(this).attr('data-id'),
        },
        function(html){
          $('#list_material').load(list_material);
          $('#debug').html(html);
        });
        
       
               
      }) ;


  $(document).on('change','#tgl',function(e){
    e.preventDefault();
    tanggal = $("#tgl").val();
    $('#tanggal').val(tanggal) ;
    console.log(tanggal) ;
    
  });

  $("#no_bc_1").keyup(function() {
      var no_bc_1  = $("#no_bc_1").val();
      $("#no_bc").val(no_bc_1);
  });



   $('#form_transaksi').submit(function(e){
          e.preventDefault(); 

          $("#error_tanggal").html('');
          $("#error_no_bc").html('');
          

          $.ajax({
          url:base_url+'transaksi/in/input',
          type:"post",
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
                          var hasil = JSON.parse(data);
                          if (hasil.hasil !== "sukses") {
                              $("#error_tanggal").html(hasil.error.tanggal);
                              $("#error_no_bc").html(hasil.error.no_bc);
                          } else {              
                              $("#no_bc_1").val('');
                              $("#no_bc").val('');
                              $("#tanggal").val('');
                              $("#tgl").val('');
                              location.href= base_url+"transaksi/in/tambah";
                            }
                    }
          });
      
   });



  $(document).on('click','#edit_list',function(e){
          e.preventDefault();
          id = $(this).attr('data-id');
          console.log(id);
          $.post('<?php echo base_url();?>transaksi/in/edit_list_material',
            {
              id:$(this).attr('data-id'),
            },
            function(html){
              $('#modal-edit_list').modal('show');
              $("#data-edit_list").html(html);
            }) ;
        });


   $('#form_edit_list').submit(function(e){
          e.preventDefault(); 

          $("#error_qty").html('');
          

          $.ajax({
          url:base_url+'transaksi/in/update_list',
          type:"post",
          data:new FormData(this),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
                          var hasil = JSON.parse(data);
                          if (hasil.hasil !== "success") {
                              $("#error_qty").html(hasil.error.qty);
                          } else {              
                              $("#kode").val('');
                              $("#item").val('');
                              $("#qty").val('');
                              $('#list_material').load(list_material);
                              $('#modal-edit_list').modal('hide');
                              Swal.fire({
                                icon: 'success',
                                title: 'Data List Material',
                                text: 'Successfully updated',
                                timer: 1500,
                                confirmButtonText: 'Done'
                              })
                            }
                    }
          });
      
   });


 

}) ;
</script>