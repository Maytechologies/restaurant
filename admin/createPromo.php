<!------------------------------------->
<!--------  createPromo.PHP ------------>
<!------------------------------------->

<?php

require './config/dbconfig.php';

$db = conectarDB();

/* 
        echo "<pre>";
         var_dump($_SERVER);
         echo "</pre>";
         exit;  */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



/**APLICAMOS REGRA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

$name         = mysqli_real_escape_string($db, $_POST['name']);
$description  = mysqli_real_escape_string($db, $_POST['description']);
$user         = mysqli_real_escape_string($db, $_POST['user']);
$date         = date("Y-m-d H:i:s");   




//ASIGNAMOS LOS DATOS DE FILES A UNA VARIABLE

    
$photo = $_FILES["photo"];


//verificamos que la variable errores llegue vacio de ser asi procedemos


    if (empty($errores)) {

        /***  SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR ***/

        //CREAR UNA CARPETA
        $carpetaImagenes = 'uploads/Promo/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }


        //**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**//

        $nombreImagen = md5(uniqid(rand(), true)) . ".webp";


        //capturamos la imagen temporal y la movemos a su carpeta imagenes

        move_uploaded_file($photo['tmp_name'], $carpetaImagenes . $nombreImagen);
        //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//


        //SENTENCIA SQL PARA INSERTAR DATOS A LA DB
        $query = "INSERT INTO promosion ( name, description, user, date, photo )
                                  VALUE ( '$name', '$description',  '$user', '$date', '$nombreImagen')";

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_insert = mysqli_query($db, $query);

        /*  echo "<pre>";
         var_dump($query);
         echo "</pre>";
         exit;  */
          


        //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_insert > 0) {

            //direccionando a otra pagina 
            header('location: showPromo.php?registro=1');
        }else {
            header('location: showPromo.php?error=4');
        }
    } //fin de la condicion errores vacios



    }





