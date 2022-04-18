<?php

require './functions/function.php';

$auth = onlineUser();

//verificamos que exista usuario autenticado de no ser asi redirigir al sitio web

if (!$auth) {
    header('Location: ../index.php');
}


//conexion DB

require 'config/dbconfig.php';

$db = conectarDB();


//SENTENCIA SQL CONSULTAR REGISTROS IMAGEN_MODAL:
$modals = "SELECT *FROM modal_producto";
$resul_modal = mysqli_query($db, $modals);

//-------------------------------------------------------------//
//---SENTENCIA SQL CONSULTAR REGISTROS TIPOS DE PRODUCTO:-----//
//-------------------------------------------------------------//

 $tipo = "SELECT * FROM tipo_producto";
$resul_tipo = mysqli_query($db, $tipo); 
/* $tipoprod = mysqli_fetch_assoc($resul_tipo); */

/* var_dump($tipopro);
exit; */


//----------------------------------------------------------------//
//----------CONSULTA MULTITABLA INNER JOIN SLQ--------------------//
//----------------------------------------------------------------//

$productos = "SELECT * FROM productos as p
INNER JOIN modal_producto as m
ON p.modal_img_id = m.id_modal WHERE estado_id = 1";
$resulAllProductos = mysqli_query($db, $productos);
/* $ProductosAll = mysqli_fetch_assoc($resulAllProductos); */

//----------------------------------------------------------------//
//-----------Consulta para el modal newproducto.php--------------//
//----------------------------------------------------------------//
 //Visualizamos la consulta SQL que usaremos en el select de (imgModal)
 $prod_modal = mysqli_query($db, $productos); 



 //-----------------------------------------------------------------//
//-----------CONSULTA 3 TABLAS PRODUCTOS, MODAL, TIPO--------------//
//-----------------------------------------------------------------//

//selecionamos el listado de productos con relacion de registro en las tablas tipo_producto y producto_modal (3 Tablas)
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
         /*  $tables3 = mysqli_fetch_assoc($tablesQuery);  */

       



//VALIDAMOS LO QUE LLEGUE POR GET
$registro = $_GET['registro'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null

$update = $_GET['update'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null



/******************************************/
/*======== ELIMINAR UN REGSITRO===========*/
/******************************************/

//COMPROBANDO LO QUE VIAJA POR EL POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if ($id) {
        //Si recibe una nueva imagen Eliminamos la imagen relacionada con nuestro id recibido por POST
        $queryImg = "SELECT small_img FROM productos WHERE id = ${id}";
        $resultadoImg = mysqli_query($db, $queryImg);
        $propiedadImg = mysqli_fetch_assoc($resultadoImg);

          
        unlink('uploads/product/' . $propiedadImg['imagen']);


        //eliminamos el registro relacionado con el id que recibimos por POST
        $query = "DELETE FROM productos WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('location: showProductos.php?registro=3');
        }
    }
}

include 'views/adm_header.php';

?>

<?php
include 'views/adm_menu.php';

?>
 <div class="container">
     <!-- Nav tabs -->
<ul class="nav nav-tabs|pills" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
  <button class="btn btn-info mr-5 ml-0" data-toggle="modal" data-target="#inactivos"><i class="fas fa-image">inactivos</i></button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
  </li>

  <?php 
  include 'modals/inactivos.php';
  ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"> home </div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"> profile </div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab"> messages </div>
</div>
 </div>


<?php
include 'views/adm_footer.php';

?>

