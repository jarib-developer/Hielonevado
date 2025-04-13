<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo (getenv('SiteName')); ?> | Log in</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/base/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- SweetAlert2 -->
   <link rel="stylesheet" href="<?php echo (base_url('assets/base/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/base/dist/css/adminlte.min.css')); ?>">
</head>
<body class="hold-transition login-page">
</body>
<!-- jQuery -->
<script src="<?php echo (base_url('assets/base/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo (base_url('assets/base/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo (base_url('assets/base/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo (base_url('assets/base/dist/js/adminlte.min.js')); ?>"></script>
<script>
  $(function () {
    Swal.fire({
      title: "Session Finalizada.",
      width: 600,
      padding: "3em",
      confirmButtonColor: "#0E7CBBFF",
      color: "#0e0e0ed9",
      background: "#fff",
      backdrop: `
                  rgba(14,14,14,0.8)
                ` 
    }).then(() => {
      // Redireccionar después de cerrar el SweetAlert
      window.location.href = "/";
    });
  });
</script>
</html>