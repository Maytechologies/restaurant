<!------------------------------------->
<!------ Modal createUser.PHP --------->
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
echo "</pre>"; */

/**APLICAMOS REGRA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

$nombre        = mysqli_real_escape_string($db, $_POST['user_name']);
$email         = mysqli_real_escape_string($db, $_POST['email']);
$password      = mysqli_real_escape_string($db, $_POST['password']);
$tipo_id       = mysqli_real_escape_string($db, $_POST['tipo_id']);
$passwordmd5  = md5($password);



//ASIGNAMOS LOS DATOS DE FILES A UNA VARIABLE

    
$photo = $_FILES["photo"];

 //SI ALGUN INPUT LLEGA VACIO MOSTRAR ERROR

 if (!$nombre) {
    $errores[] = "El campo NOMBRE es oblighatorio, debes ingresarlo";
}

if (!$email) {
    $errores[] = "El campo EMAIL  es oblighatorio, debes ingresarlo para poder completar el registro";
}


if (!$tipo_id) {
    $errores[] = "El PERFIL es oblighatorio, debes ingresarlo";
}


if (!$photo) {
    $errores[] = "El campo FOTO es oblighatorio, debes ingresarlo";
}

//verificamos que la variable errores llegue vacio de ser asi procedemos


    if (empty($errores)) {

        /***  SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR ***/

        //CREAR UNA CARPETA
        $carpetaImagenes = 'uploads/users/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }


        //**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**//

        $nombreImagen = md5(uniqid(rand(), true)) . ".webp";


        //capturamos la imagen temporal y la movemos a su carpeta imagenes

        move_uploaded_file($photo['tmp_name'], $carpetaImagenes . $nombreImagen);
        //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//


        //SENTENCIA SQL PARA INSERTAR DATOS A LA DB
        $query = "INSERT INTO usuarios ( user_name, email, password, photo, tipo_id )
        VALUE ( '$nombre', '$email', '$passwordmd5', '$nombreImagen', '$tipo_id')";

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_insert = mysqli_query($db, $query);

        /*  echo "<pre>";
         var_dump($query);
         echo "</pre>";
         exit; 
          */


        //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_insert) {

            //direccionando a otra pagina 
            header('location: showUsers.php?registro=1');
        }
    } //fin de la condicion errores vacios



    }





