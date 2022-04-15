
<!-------------------------------------------------------
-------------------HEADER WEB SITE -----------------------
--------------------------------------------------------->

<?php 

include './admin/config/dbconfig.php';

$db = conectarDB();

//SENETENCIA PARA REGISTRAR VISITAS EFECTUADAS A LA PAGINA DAHSBOARD
date_default_timezone_set("America/Santiago");
$ip = $_SERVER['REMOTE_ADDR'];
$sqlconsultar =$db->query("SELECT *FROM visitas WHERE ip = '$ip' ORDER BY id DESC");
$contarConsultar = $sqlconsultar->num_rows;

if ($contarConsultar === 0) {
  $SqlInsertar = $bd->query("INSERT INTO visitas (ip, fecha) VALUES ('$ip', now())");
    }else {
      $row = $sqlconsultar->fetch_array();
      $fechaRegistro = $row['fecha'];
      $fechaActual = date("Y-m-d H:i:s");
      $nuevaFecha = strtotime($fechaRegistro."+ 10 minutes");
      $nuevaFecha = date("Y-m-d H:i:s", $nuevaFecha);

        if ($fechaActual >= $nuevaFecha) {
          $SqlInsertar = $db->query("INSERT INTO visitas (ip, fecha) VALUES ('$ip', now())");
        }
   }

   $Consulvisitas = $db->query("SELECT *FROM visitas");
   $num_Visitas = $Consulvisitas->num_rows;
   

/* ===================================================================================== */

//SENETENCIA SQL LISTADO DE PRODUCTOS / MODAL

$tablesProductos = "SELECT p.id, p.nombre, p.small_img, p.precio, p.ingredientes, p.tipo_id, p.creado, t.tipo_nombre, p.modal_img_id as id_modal, m.nombre_modal, m.img_modal, st.id_status as estado_id, st.name_status as estado 
                        FROM productos as p
                        INNER JOIN modal_producto as m
                        ON p.modal_img_id = m.id_modal
                        INNER JOIN tipo_producto as t
                        ON p.tipo_id = t.id
                        INNER JOIN estado as st
                        ON p.estado_id = st.id_status
                        WHERE estado_id = 1";
        $tables3Query = mysqli_query($db, $tablesProductos);



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pepi | Burguer</title>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">

   <!--   plugin Sweealert2 -->
   <link rel="stylesheet" href="../admin/plugins/sweetalert2/sweetalert2.min.css">

   <!-- DataTables -->
   <link rel="stylesheet" href="../plugings/datatables/DataTables-1.11.5/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="../plugings/datatables/DataTables-1.11.5/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="../plugings/datatables/SearchPanes-2.0.0/css/searchPanes.bootstrap4.min.css">
   <link rel="stylesheet" href="../plugings/datatables/SearchPanes-2.0.0/css/searchPanes.bootstrap4.min.css">
   <link rel="stylesheet" href="../admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.css">
  

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- Inicio del header  -->

<header class="header">

   <div id="menu-btn" class="fas fa-bars icons"></div>
   <div id="search-btn" class="fas fa-search icons" style="visibility: hidden;"></div>

   <nav class="navbar">
      <a href="index.php">Inicio</a>
      <a href="menu.php">Menú</a>
      <a href="nosotros.php">Nosotros </a>
      <span class="space">  </span>
      <a href="#reviews"> Clientes </a>
      <a href="#contact"> Contacto </a>
      <a href="/admin/index.php"> sistema </a>
   </nav>

   <a href="#" class="fas fa-shopping-cart icons " style="visibility: hidden;"></a>

   <a href="#home" class="logo"><img src="images/title-img.png" alt=""></a>

   <form action="" class="search-form">
      <input type="search" name="" placeholder="search here..." id="search-box">
      <label for="search-box" class="fas fa-search icons"></label>
   </form>

</header>

<style>
  .botonModal{
    color: #000; 
    font-size: 18px;
     border-radius:5px; 
     background: #ee8118;
      width: 150px; 
      height: 50px; 
      text-align: center;
  }

  .botonModal:hover{
    color:#fff;
    background: #520303;

  }
 
</style>

<!-- final del header  -->



