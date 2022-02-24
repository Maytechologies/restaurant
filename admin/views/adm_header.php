<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Inmobiliaria</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">

<!--   plugin Sweealert2 -->
<link rel="stylesheet" href="./plugins/sweetalert2/sweetalert2.min.css">

 <!-- DataTables -->
 <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.css">
  <link rel="stylesheet" href="./dist/css/estilos.css">

</head>
<body class="hold-transition sidebar-mini">



<!-- -------------------------------------------------------->
<!---------------Inicio Header Principal--------------------->
<!----------------------------------------------------------->

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
        <a href="../../index.php" class="nav-link">Sitio Web</a>
      </li>
      

    <!-- Link Activo Menu lateral -->
    <ul class="navbar-nav ml-auto">
    
    
      <!-- Boton full Screen -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <p><i class="fas fa-expand-arrows-alt"></i>Expandir</p>
        </a>
      </li>

      <div class="d-flex justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="cerrar_sesion.php">
          <p><i class="fa-regular fa-rectangle-xmark"></i>Cerrar Sesión</p>
        </a>
      </li>
      </div>
    </ul>
  </nav>

  <?php 
 //VALIDAMOS LO QUE LLEGUE POR GET
 $registro = $_GET['registro'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null
 $update = $_GET['update'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null
  
  ?>
  <!---------------Final Header Principal--------------------->




 