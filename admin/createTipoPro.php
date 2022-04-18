<!------------------------------------->
<!--------  createUser.PHP ------------>
<!------------------------------------->

<?php

require './config/dbconfig.php';

$db = conectarDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

/* echo "<pre>";
var_dump($_POST);
echo "</pre>";


echo "<pre>";
var_dump($_FILES);
echo "</pre>";
exit; */

/**APLICAMOS REGRA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

$nombre        = mysqli_real_escape_string($db, $_POST['tipo_nombre']);
$estado        = mysqli_real_escape_string($db, $_POST['estado']);

//ASIGNAMOS LOS DATOS DE FILES A UNA VARIABLE

    
$tipo_img = $_FILES["tipo_img"];


//verificamos que la variable errores llegue vacio de ser asi procedemos


    if (empty($errores)) {

        /***  SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR ***/

        //CREAR UNA CARPETA
        $carpetaImagenes = 'uploads/type/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }


        //**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**//

        $nombreImagen = md5(uniqid(rand(), true)) . ".webp";


        //capturamos la imagen temporal y la movemos a su carpeta imagenes

        move_uploaded_file($tipo_img['tmp_name'], $carpetaImagenes . $nombreImagen);
        //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//


        //SENTENCIA SQL PARA INSERTAR DATOS A LA DB
        $query = "INSERT INTO tipo_producto ( tipo_nombre, tipo_img, estado )
        VALUE ( '$nombre', '$nombreImagen', '$estado')";

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_insert = mysqli_query($db, $query);

        /*  echo "<pre>";
         var_dump($query);
         echo "</pre>";
         exit; 
          */


        //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_insert > 0) {

            //direccionando a otra pagina 
            header('location: showTipo.php?registro=1');
        }else {
            header('location: showTipo.php?error=4');
        }
    } //fin de la condicion errores vacios



    }





