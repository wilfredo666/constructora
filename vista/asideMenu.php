<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="pruebaB">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="inicio" class="brand-link">
        <img src="<?php echo $base_url; ?>assest/dist/img/AdminLTELogo.png"
          class="brand-image img-circle elevation-3" style="opacity: .8" style="width:300px">
        <span class="brand-text font-weight-light">Sitema Constructora</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo $base_url; ?>assest/dist/img/user2-160x160.jpg"
              class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" id="usuarioLogin"><?php echo $_SESSION['nombre']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <?php
            if ($_SESSION["categoria"] == "Administrador") {
            ?>
              <li class="nav-header">ADMINISTRACION</li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo $base_url; ?>VUsuario" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Lista de usuarios</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-street-view"></i>
                  <p>
                    Personal
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VPersonal" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Lista de Personal</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-university"></i>
                  <p>
                    Inmuebles
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VInmueble" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Lista de Inmuebles</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    Clientes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VCliente" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Lista de Clientes</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-user-circle"></i>
                  <p>
                    Proveedores
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VProveedor" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Lista de Proveedores</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php
            }

            ?>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  Proyectos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VProyecto" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Lista de Proyectos</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">INVENTARIOS</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-grip-horizontal"></i>
                <p>
                  Materiales
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VMaterial" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Lista de Materiales</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-grip-horizontal"></i>
                <p>
                  Herramientas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VHerramientas" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Lista de Herramientas</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">OTROS MOVIMIENTOS</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-tty"></i>
                <p>
                  Adquisiciones
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VAdquisicion" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Lista de Adquisiciones</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-money"></i>
                <p>
                  Plan de Cobro
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VPlanCobro" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Lista de Plan de Cobros</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">COMERCIAL</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cash-register"></i>
                <p>
                  Ventas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>


              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="FNuevaVenta" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Nueva Venta</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VListaVenta" class="nav-link">
                    <i class="fa fa-server nav-icon text-info"></i>
                    <p>Lista de Ventas</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VSalidaMaterial" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Reporte Salidas</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-boxes"></i>
                <p>
                  Ingreso
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>


              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="FNotaIngreso" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Ingreso Materiales</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VIngresoMaterial" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Ver Ing Materiales</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="FNotaIngresoHerr" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Ingreso Herramientas</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Reportes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>


              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="RepMateriales" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Materiales</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="salir" class="nav-link text-cyan">
                <i class="fas fa-power-off nav-icon"></i>
                <p>
                  Salir
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>