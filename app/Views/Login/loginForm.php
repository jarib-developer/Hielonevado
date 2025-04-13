<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo(getenv('SiteName')); ?> | Log in</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo(base_url('assets/base/plugins/fontawesome-free/css/all.min.css'));?>">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/base/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo(base_url('assets/base/dist/css/adminlte.min.css'));?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><?php echo(getenv('SiteSubName')); ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresa tus datos</p>
      <form action="<?php echo(base_url('/access')); ?>" method="post">
      <?= csrf_field() ?> <!-- Token CSRF -->
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Cuenta" name="nickname" autocomplete="off" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>
<!-- jQuery -->
<script src="<?php echo(base_url('assets/base/plugins/jquery/jquery.min.js'));?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo(base_url('assets/base/plugins/bootstrap/js/bootstrap.bundle.min.js'));?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo(base_url('assets/base/dist/js/adminlte.min.js'));?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo (base_url('assets/base/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<!-- Alert Attemps -->
 <?php
 switch ($SessionCounter) {
  case '1':
    $AlertData = array(
      'msg' => true,
      'html' => '(1) Intento restante.',
      'color' => 'rgba(220,53,64,0.8)',
    );
    break;
  case 2:
    $AlertData = array(
      'msg' => true,
      'html' => '(2) Intentos restantes.',
      'color' => 'rgba(255,193,7,0.8)',
    );
    break;
 }
 ?>
<?php if (isset($AlertData['msg']) && $AlertData['msg']): ?>
<script>
  $(function () {
    Swal.fire({
      title: "Alerta!",
      html: "<?php echo($AlertData['html']); ?>",
      width: 600,
      padding: "3em",
      confirmButtonColor: "#0E7CBBFF",
      color: "#0e0e0ed9",
      background: "#fff",
      backdrop: `<?php echo($AlertData['color']); ?>`
    })
  });
</script>
<?php endif; ?>
<!-- Alert Attemps -->
<script>
  $(document).ready(function () {
    const $email = $('input[name="nickname"]');
    const $password = $('input[name="password"]');
    const $submitBtn = $('button[type="submit"]');

    // Desactiva el botón inicialmente
    $submitBtn.prop('disabled', true);

    function validarFormulario() {
      const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($email.val());
      const passwordValido = $password.val().length >= 8;

      // Activa o desactiva el botón según validez
      $submitBtn.prop('disabled', !(emailValido && passwordValido));
    }

    // Escucha cambios en ambos campos
    $email.on('input', validarFormulario);
    $password.on('input', validarFormulario);
  });
</script>
</html>