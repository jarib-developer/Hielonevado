<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/base/plugins/fontawesome-free/css/all.min.css')); ?>">
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
            <h1>Formulario</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-8">
        <!-- Form -->
      <!-- Default box -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Agregar Propietario</h3>
        </div>
        <form id="miFormulario" action="<?php echo (base_url('Landlords/Add/Action')); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?> <!-- Token CSRF -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <!-- Vista previa -->
              <div class="form-group text-center">
                <img id="preview" src="<?= base_url('assets/images/Avatars/DefaultAvatar.png') ?>" alt="Vista previa" class="img-thumbnail rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover;">
              </div>
              <!-- Botón que simula el input file -->
              <div class="form-group text-center">
                <input type="file" name="foto" id="foto" accept="image/*" style="display: none;" onchange="previewImage(event)">
                <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('foto').click();"><i class="fas fa-camera"></i></button>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tipo de Identificación *</label>
                <select name="idpersonsIdentificationType" class="form-control select2" style="width: 100%;">
                  <option value="">-- Seleccione --</option>
                  <?php foreach ($IdentificationTypes as $type): ?>
                    <option value="<?= esc($type['id']) ?>">
                      <?= esc($type['name']) ?> (<?= esc($type['abb']) ?>)
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Identificación *</label>
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-id-card"></i></span></div>
                  <input type="text" name="identification" class="form-control" placeholder="Identificación" data-nc="true" data-required="true" autocomplete="off">
                </div>
              </div>
              <!-- Teléfono -->
                <div class="form-group">
                  <label>Teléfono</label>
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone"></i></span></div>
                    <input type="text" name="phone" class="form-control" placeholder="Teléfono" data-n="true">
                  </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <!-- Nombre -->
              <div class="form-group">
                <label>Nombre</label>
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                    <input type="text" name="name" class="form-control" placeholder="Nombre" data-titlecase="true" data-lns="true" data-required="true">
                </div>
              </div>
              <!-- Primer Apellido -->
              <div class="form-group">
                <label>Apellido</label>
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-tag"></i></span></div>
                  <input type="text" name="lastname" class="form-control" placeholder="Primer Apellido"
                        data-titlecase="true" data-lns="true" data-required="true">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Segundo Nombre -->
              <div class="form-group">
                <label>Segundo Nombre</label>
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                  <input type="text" name="surname" class="form-control" placeholder="Segundo Nombre"
                        data-titlecase="true" data-lns="true">
                </div>
              </div>
              <!-- Segundo Apellido -->
              <div class="form-group">
                <label>Segundo Apellido</label>
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-tag"></i></span></div>
                  <input type="text" name="surlastname" class="form-control" placeholder="Segundo Apellido"
                        data-titlecase="true" data-lns="true">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- Correo -->
              <div class="form-group">
                <label>Correo</label>
                <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
                  <input type="email" name="mail" class="form-control" placeholder="Correo Electrónico" data-required="true" data-min="true">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary" disabled >Guardar</button>
        </div>
        <!-- /.card-footer-->
        </form>
      </div>
      <!-- /.card -->
      <!-- /.form -->
      </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Footer -->
    <?= $this->include('footer') ?>
  <!-- /.Footer -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo (base_url('assets/base/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo (base_url('assets/base/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo (base_url('assets/base/dist/js/adminlte.js')); ?>"></script>


<!-- Custom SCRIPTS -->
<!-- MenuSelector -->
<script src="<?php echo (base_url('assets/customJS/general/menuSelector.js')); ?>"></script>
<!-- image Preview -->
<script src="<?php echo (base_url('assets/customJS/image/imagrePreviewOnForm.js')); ?>"></script>

<script>
$(document).ready(function () {
  const $form = $('#miFormulario');
    const $submitBtn = $form.find('button[type="submit"]');
    const $selectDocType = $form.find('select[name="document_type_id"]');
    const $identificacionInput = $form.find('input[name="identification"]');

    // Función que bloquea o habilita el campo identificación según el valor del select
    function toggleIdentificacion() {
        const valorSeleccionado = $selectDocType.val();

        if (valorSeleccionado === '') {
            $identificacionInput.prop('disabled', true).val('').removeClass('is-valid is-invalid');
        } else {
            $identificacionInput.prop('disabled', false);
        }

        validarRequeridos(); // Se vuelve a validar el formulario por si cambia el estado
    }

    // Asocia el evento change al select
    $selectDocType.on('change', toggleIdentificacion);

    // Llamado inicial por si ya tiene un valor cargado al renderizar
    toggleIdentificacion();

    /**
     * Valida todos los campos con data-required.
     * Aplica clase is-invalid a los vacíos o inválidos.
     * Habilita/deshabilita el botón de submit.
     */
    function validarRequeridos() {
        let todosValidos = true;

        $form.find('[data-required="true"]').each(function () {
            const $campo = $(this);
            const valor = $.trim($campo.val());

            // Validar campo vacío
            if (valor === '') {
                $campo.addClass('is-invalid').removeClass('is-valid');
                todosValidos = false;
                return; // Continúa al siguiente campo
            }

            // Validación especial para email
            if ($campo.attr('name') === 'mail') {
                const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!regexCorreo.test(valor)) {
                    $campo.addClass('is-invalid').removeClass('is-valid');
                    todosValidos = false;
                    return;
                }
            }

            // Si pasa todas las validaciones
            $campo.removeClass('is-invalid').addClass('is-valid');
        });

        $submitBtn.prop('disabled', !todosValidos);
    }

    // Recorre todos los inputs con clase .form-control
    $('.form-control').each(function () {
        const $input = $(this);
        const attributes = $input.data(); // Todos los data-* como objeto

        // Solo letras
        if (attributes.l) {
            $input.on('input', function () {
                this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
            });
        }
        // Solo letras Primera mayuscula y sin epacios
        if (attributes.lns) {
          $input.on('input', function () {
              // Elimina cualquier carácter que no sea una letra
              this.value = this.value.replace(/[^a-zA-Z]/g, '');
              // Convierte la primera letra a mayúscula y el resto a minúscula
              this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase();
          });
        }


        // Solo números
        if (attributes.n) {
            $input.on('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        }
        // Formatea el campo de teléfono con guiones en formato xxx-xxx-xxxx
        if ($input.attr('name') === 'phone') {
            $input.on('input', function () {
                formatearTelefono(this);
            });
        }

        // Números y guiones (sin espacios)
        if (attributes.nc) {
            $input.on('input', function () {
                this.value = this.value.replace(/[^0-9-]/g, '');
            });
        }

        // Todo a mayúsculas
        if (attributes.cap) {
            $input.on('input', function () {
                this.value = this.value.toUpperCase();
            });
        }

        // Todo a minúsculas
        if (attributes.min) {
            $input.on('input', function () {
                this.value = this.value.toLowerCase();
            });
        }

        // Separador de miles
        if (attributes.money) {
            $input.on('input', function () {
                let value = this.value.replace(/[^0-9]/g, '');
                if (value) {
                    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                }
                this.value = value;
            });
        }

        // Primera letra de cada palabra en mayúscula
        if (attributes.titlecase) {
            $input.on('input', function () {
                this.value = this.value
                    .toLowerCase()
                    .replace(/\b\w/g, function (l) {
                        return l.toUpperCase();
                    });
            });
        }

        // Solo la primera letra en mayúscula
        if (attributes.firstupper) {
            $input.on('input', function () {
                const texto = this.value.toLowerCase();
                this.value = texto.charAt(0).toUpperCase() + texto.slice(1);
            });
        }

        // Validación en tiempo real
        if (attributes.required) {
            $input.on('input', validarRequeridos);
        }

        // Validación de email
        if ($input.attr('name') === 'mail') {
            $input.on('input', function () {
                const email = this.value.trim();
                const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
                if (email.length === 0 || isValid) {
                    $input.removeClass('is-invalid').addClass('is-valid');
                } else {
                    $input.removeClass('is-valid').addClass('is-invalid');
                }
                validarRequeridos(); // Actualiza el estado del botón
            });
        }
    });

    function formatearTelefono(input) {
    let valor = input.value.replace(/\D/g, ''); // Solo dígitos

    // Solo aplicar el formato si tiene exactamente 10 dígitos
    if (valor.length === 10) {
        input.value = valor.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
    } else {
        // Si tiene más de 10 dígitos, agrega el formato hasta el 10vo dígito y agrega el resto al final
        if (valor.length > 10) {
            const primerosDiez = valor.substring(0, 10);
            const extra = valor.substring(10);
            const formateado = primerosDiez.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
            input.value = formateado + extra;
        } else {
            // Si tiene menos de 10, se mantiene como está (sin formato)
            input.value = valor;
        }
    }
}

    // Validación inicial al cargar
    validarRequeridos();
});
</script>

</body>
</html>
