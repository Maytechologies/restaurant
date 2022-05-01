<?php

       /*  echo "<pre>";
         var_dump($_POST);
         echo "</pre>";

         echo "</pre>";

         echo "<pre>";
         var_dump($_FILES);
         echo "</pre>";
  
         exit;  */
         
         

require 'config/dbconfig.php';

$db = conectarDB();
$id = $_POST['id']; 


/* Esta consulta la ejecutamos para poder rescatar el campo photo de la tabla usuarios 
en caso que emn la actualizacion no selecionemos una nueva imagen */
$SQL = "SELECT *FROM promosion WHERE id = ${id}";
  $queryPromo = mysqli_query($db, $SQL);
    $promosion = mysqli_fetch_assoc($queryPromo);




if ($_SERVER['REQUEST_METHOD'] === 'POST') {   

$name         = mysqli_real_escape_string($db, $_POST['name']);  
$description  = mysqli_real_escape_string($db, $_POST['description']);  
$user         = mysqli_real_escape_string($db, $_POST['user']);
$publisher    = mysqli_real_escape_string($db, $_POST['publisher']);
$date         = date("Y-m-d H:i:s");   

/* si selecionamos una nueva imagen para el usuaio
   Asignamos los datos que se recibe por variable global $_FILES a una variable */

$photo = $_FILES['photo'];



/***********************************************/
/**SESION PARA ACTUALIZAR IMAGEN DEL USUARIO****/
/***********************************************/

    //CREAR UNA CARPETA
    $carpetaImagenes = 'uploads/Promo/';
    if (!is_dir($carpetaImagenes)) { //si no existe esta carpeta
        mkdir($carpetaImagenes); //crea la carpeta
    }

    $nombreImagen = '';

    if ($photo['name']) {

        //Eliminamos la imagen actual con los atributos (ruta del archivo y nombre)
        unlink($carpetaImagenes . $usuarios['photo']);

        /**GENERAR UN NOMBRE UNICO y EXTENSION ALEATORIO PARA CADA IMAGEN**/
        $nombreImagen = md5(uniqid(rand(), true)) . ".webp";
       

        //capturamos la imagen temporal y la movemos a su carpeta imagenes*/

        move_uploaded_file($photo['tmp_name'], $carpetaImagenes . $nombreImagen);
    
        //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//

        
        
            }else {
                $nombreImagen = $promosion['photo']; /* Si no llega una imagen nueva asignarle la que ya tiene en su registro actual */
            }

             /****************************************************/
             //SENTENCIA SQL PARA APLICAR UN UPDATE DATOS A LA DB
            /****************************************************/

           // NOTA: teclear cuidadosamente la sentencia SQL, encerrar los campos tipo string entre '' y los campos tipo numero sin comillas
            $query = "UPDATE promosion SET  name = '${name}',
                                            description = '${description}',
                                            publisher = ${publisher},
                                            photo = '${nombreImagen}'
                                            WHERE id = ${id} ";

        /*      echo "<pre>";
            var_dump($query);
            echo "</pre>";  
            exit;   
           */

             //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

             $resultado_update = mysqli_query($db, $query);

          //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_update > 0) {
            header('location: showPromo.php?registro=1');
        }else {
            header('location: showPromo.php?error=4');
        }

    }


            


?>