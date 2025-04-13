<!-- jQuery -->
<script src="<?php echo(base_url('assets/base/plugins/jquery/jquery.min.js'));?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo(base_url('assets/base/plugins/jquery-ui/jquery-ui.min.js'));?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo(base_url('assets/base/plugins/bootstrap/js/bootstrap.bundle.min.js'));?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo(base_url('assets/base/dist/js/adminlte.js'));?>"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Obtiene la URL actual sin parámetros ni hash
    let path = window.location.pathname;

    // Selecciona todos los enlaces del sidebar
    document.querySelectorAll('.nav-sidebar a').forEach(function (link) {
      let href = link.getAttribute('href');

      // Verifica si la ruta coincide o es un sub-ruta (usuarios/editar, etc.)
      if (path === href || path.startsWith(href + '/')) {
        // Activa el enlace actual
        link.classList.add('active');

        // Si está dentro de un submenú, abre el padre
        let treeview = link.closest('.has-treeview');
        if (treeview) {
          treeview.classList.add('menu-is-opening menu-open');
          let parentLink = treeview.querySelector('a.nav-link');
          if (parentLink) {
            parentLink.classList.add('active');
          }
        }
      }
    });
  });
</script>


</html>