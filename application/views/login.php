<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WHF FGOODS</title>
  <link rel="shortcut icon" href="assets/images/fgoods.jpg">
  <!-- Custom fonts for this template-->
  <link href="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style type="text/css">
  .bg-gradient-primary {
    background-color: #E9967A;
    background-image: linear-gradient(180deg, #E9967A 10%, #E9967A 100%);
    background-size: cover;
  }
</style>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-md-8 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <div id="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>">

            </div>

          </div>
          <!-- Nested Row within Card Body -->
          <div class="col-md-12 mt-3 p-4 row">
            <div class="col-md-4">
              <img src="assets/images/fgoods.jpg" style="width: 100%;height: 225px;">
            </div>
            <div class="col-md-8 ">
              <div class="card-header">
                <h2>
                  <font color="black"> <b>
                      <center>PT. INABATA CREATION INDONESIA</center>
                    </b>
                </h2>

              </div>
              <div class="card-body mb-0">
                <form action="<?php echo base_url(); ?>auth/authentifikasi" class="login100-form validate-form" method="post">

                  <div class="form-group">
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                      <input class="form-control input100" type="text" name="username" placeholder="Username">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                      <input class=" form-control input100" type="password" name="password" placeholder="Password">
                    </div>
                  </div>

                  <div class="form-group text-right mt-4">
                    <button class="btn btn-primary">
                      <i class="fas fa-lock mr-2"></i>
                      Login
                    </button>
                  </div>

                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="https://cdn.jsdelivr.net/gh/rullystudio/sb-admin/js/sb-admin-2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>
</body>

</html>


<script>
  var flashData = $('#flash-data').data('flashdata');
  if (flashData == 'denied') {
    Swal.fire({
      icon: 'error',
      title: 'Login failed',
      text: 'User / Password not registered',
    })

  } else if (flashData == 'refused') {

    // alert("Hello kawan");   

    Swal.fire({
      icon: 'warning',
      title: 'Access denied',
      text: 'The system is in use',
    })
  } else if (flashData == 'ilegal') {

    // alert("Hello kawan");   


    Swal.fire({
      icon: 'error',
      title: 'Ilegal Login',
      text: 'Login is not allowed',
    })

  } else if (flashData == 'password-salah') {

    // alert("Hello kawan");   


    Swal.fire({
      icon: 'error',
      title: 'Ilegal Login',
      text: 'Password Salah!',
    })

  }
</script>