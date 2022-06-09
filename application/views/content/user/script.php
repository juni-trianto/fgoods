
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/js/demo/datatables-demo.js"></script>





<script type="text/javascript">
$(document).ready(function(){
  
    $("input[name$='level']").click(function() {
        var typeuser = $(this).val();

		if(typeuser == "User")
		{
			$("#tabelakses").show();
		}else
		{
			$("#tabelakses").hide();
		}
        
    });


  $(document).on('click','#hapus',function(e){
          e.preventDefault();
          id = $(this).attr('data-id');
          console.log(id);
          $.post('<?php echo base_url();?>user/konfirmasi',
            {
              id:$(this).attr('data-id'),
            },
            function(html){
              $("#data-konfirmasi").html(html);
            }) ;
        });

 


});
</script>

    <script>
        $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
        setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
    </script>

    