
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo (base_url('assets/base/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo (getenv('SiteName')); ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo (base_url('assets/base/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ($UserData['user']['nickname']); ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
            <a href="<?php echo (base_url('/Dashboard')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-warning">Inicio</span>
              </p>
            </a>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Entidades
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo (base_url('/Landlords')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Propietarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo (base_url('/Locations')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Propiedades</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo (base_url('/Tenants')); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inquilinos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-save"></i>
              <p>
                Documentos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Propietario</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Propiedades</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="<?php echo (base_url('/logout')); ?>" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p class="text">LogOut</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>