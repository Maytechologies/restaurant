<?php

//-------------------------------------------------------------//
//-----------------  UpdatePublisher.php  --------------------//
//-------------------------------------------------------------//


//Conectando a la DB
require 'config/dbconfig.php';
$db = conectarDB();

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    echo "<br>";


//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $consulpublisher = "SELECT *FROM promosion WHERE id = ${id}";
       $querypublisher = mysqli_query($db, $consulpublisher);
          $consulta = mysqli_fetch_assoc($querypublisher); 

         /*  echo "<pre>";
          var_dump($publisher);
          echo "</pre>";
          exit; */
      

    if ($consulta['publisher']==1) {

        $query = "UPDATE `promosion` SET `publisher` = '2' WHERE `promosion`.`id` =  ${id}";

    }elseif ($consulta['publisher']=2) {

        $query = "UPDATE `promosion` SET `publisher` = '1' WHERE `promosion`.`id` =  ${id}";
    }
/* 
       echo "<pre>";
          var_dump($query);
          echo "</pre>";
          exit; */ 

    

        /* UPDATE `productos` SET `id`= 1,`nombre`='perro bulldog',`small_img`='imagen.jpg',`precio`= 1500,`ingredientes`='ingredientea, ingredienteB, ingredienteC,',`modal_img_id`= , NULL,`tipo_id`= 2,`estado`= 1 WHERE id = 1; */

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

            $resultado_update = mysqli_query($db, $query);


            if ($resultado_update > 0) {
                header('location: showPromo.php?registro=1');
            }else {
                header('location: showPromo.php?error=4');
            }

        



}


    
