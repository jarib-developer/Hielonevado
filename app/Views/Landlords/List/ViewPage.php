<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo (getenv('SiteName')); ?> | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/base/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/base/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo (base_url('assets/base/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo (base_url('assets/base/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/base/dist/css/adminlte.min.css')); ?>">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Dashboard" class="nav-link">Inicio</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?= $this->include('Sidebar/General/sidebar') ?>
  <!-- ./Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PROPIETARIOS</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php
              if (session()->getFlashdata('action')) {
                $actionData= session()->getFlashdata('action');
                echo('<pre>');
                print_r($actionData);
                echo('</pre>');
              }
            ?>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable - Propietarios</h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <button type="button" class="createButton btn btn-primary btn-block"><i class="fa fa-plus"></i> Crear</button>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="DataTable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Identificacion</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td>
                      <form method="POST" name="form1">
                        <input type="hidden" name="ItemID" value="1" />
                        <input type="button" value="Botón 1" data-parent="Landlords/View" onclick="setFormAction(this)" />
                        <input type="button" value="Botón 2" data-parent="Landlords/Edit" onclick="setFormAction(this)" />
                      </form>
                    </td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>Win 95+</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.5
                    </td>
                    <td>Win 95+</td>
                    <td>Win 95+</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer text-sm">
    <strong>Copyright &copy; <?php echo(date('Y')); ?> <a class="text-black"><?php echo(getenv('SiteName')); ?></a></strong>
    All rights reserved
    <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>

<!-- jQuery -->
<script src="<?php echo (base_url('assets/base/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo (base_url('assets/base/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo (base_url('assets/base/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo (base_url('assets/base/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo (base_url('assets/base/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo (base_url('assets/base/dist/js/adminlte.js')); ?>"></script>
<!-- MenuSelector -->
<script src="<?php echo (base_url('assets/customJS/general/menuSelector.js')); ?>"></script>


<!-- Function Action Forms -->
<script>
    function setFormAction(button) {
        // Obtener el valor del atributo data-parent para definir la acción
        var action = button.getAttribute('data-parent');
        // Asignar la URL de la acción al formulario
        document.form1.action = '<?php echo base_url(''); ?>' + action;
        // Enviar el formulario
        document.form1.submit();
    }
</script>
<!-- ./Function Action Forms -->

<script>
  $('.createButton').click(function() {
   window.location = '<?php echo(base_url('Landlords/Add'));?>' + this.id;
  });
</script>
<!-- Data Table Script -->
<script>
  $(function () {
    $('#DataTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      language: {
        url: '//cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json',
      },
    });
  });
</script>
<!-- ./Data Table Script -->


</html>