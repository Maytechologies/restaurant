

<?php

//Conectando a la DB
require 'config/dbconfig.php';
$db = conectarDB();

   /*  echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    echo "<br>";

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
    exit;  */


 

//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $consulproducto = "SELECT *FROM productos WHERE id = ${id}";
       $queryproducto = mysqli_query($db, $consulproducto);
          $productos = mysqli_fetch_assoc($queryproducto); 

    

    /* CAPTURAMOS LOS DATOS ENVIADOS DESDE EL FORMULARIO Y LE ASIGNAMOS UNA VARIABLE */

    /**APLICAMOS REGLA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

    $estado_id = mysqli_real_escape_string($db, $_POST['estado_id']);
    

        /********************************************************/
        //SENTENCIA SQL PARA APLICAR UN UPDATE AL CAMPO ESTADO_ID
        /*******************************************************/

        $query = "UPDATE `productos` SET `estado_id` = '1' WHERE `productos`.`id` =  ${id}";
       /*  echo "<pre>";
        var_dump($query);
        echo "</pre>";

        exit;   */ 

        /* UPDATE `productos` SET `id`= 1,`nombre`='perro bulldog',`small_img`='imagen.jpg',`precio`= 1500,`ingredientes`='ingredientea, ingredienteB, ingredienteC,',`modal_img_id`= , NULL,`tipo_id`= 2,`estado`= 1 WHERE id = 1; */

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

            $resultado_update = mysqli_query($db, $query);

            //direccionando a otra pagina 
            header('location: showProductos.php?registro=2');
        

    




}


    
