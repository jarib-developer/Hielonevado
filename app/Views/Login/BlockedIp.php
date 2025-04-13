<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo(getenv('SiteName')); ?> | Blocked</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo(base_url('assets/base/plugins/fontawesome-free/css/all.min.css'));?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo(base_url('assets/base/dist/css/adminlte.min.css'));?>">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a><?php echo(getenv('SiteSubName')); ?></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo($thisMachineIP); ?></div>

  <div class="help-block text-center">
    Por tu seguridad y la nuestra, hemos bloqueado la conexion.
  </div>
  <div class="text-center">
    <a href="">Contacta con el Administrador</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; <?php echo(date('Y')); ?> <b><a href="" class="text-black"><?php echo(getenv('SiteName')); ?></a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->
<!-- jQuery -->
<script src="<?php echo(base_url('assets/base/plugins/jquery/jquery.min.js'));?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo(base_url('assets/base/plugins/bootstrap/js/bootstrap.bundle.min.js'));?>"></script>
</body>
</html>
