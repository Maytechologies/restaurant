
  <?php

      $datos = "SELECT *FROM datos";

      //Visualizamos la consulta SQL
      $query_datos = mysqli_query($db, $datos);
      $resultado_datos = mysqli_fetch_assoc($query_datos);


  ?>
 
 <!------------------------------------------------------------------>
    <!------------------ Inicio Menu Sidebar --------------------------->
    <!------------------------------------------------------------------>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index.php" class="brand-link">
      <img src="uploads/datos/<?php echo $resultado_datos['logo_data']; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
      <span class="brand-text font-weight-light text-uppercase" ><?php echo $resultado_datos['name_data'];?></span>
    </a>


    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img class="imgsmall" src="./uploads/users/<?php echo $_SESSION['photo']; ?>" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['user']; ?></a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item">
            <a href="/admin/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>

              <p>
                Panel de Control
              </p>
            </a>
          </li>

          <li class="nav-header">SESIONES</li>
          <li class="nav-item">
            <a href="showTipo.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Categorias</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="modalProducto.php" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Modal Producto</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="showProductos.php" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Productos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="showUsers.php" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="regDatos.php" class="nav-link">
              <i class="nav-icon far fa-circle text-white"></i>
              <p>Datos</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- Final sidebar-menu -->
    </div>
    <!-- Final sidebar -->
  </aside>
<!------------------ Final Menu Sidebar --------------------------->
