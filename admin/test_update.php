

<?php

//Conectando a la DB
require 'config/dbconfig.php';
$db = conectarDB();


    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    echo "<br>";

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";

    exit;
    
        


     

//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    

    /* CAPTURAMOS LOS DATOS ENVIADOS DESDE EL FORMULARIO Y LE ASIGNAMOS UNA VARIABLE */

    /**APLICAMOS REGLA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

    $nombre          = mysqli_real_escape_string($db, $_POST['nombre']);
    $precio          = mysqli_real_escape_string($db, $_POST['precio']);
    $tipo_id         = mysqli_real_escape_string($db, $_POST['tipo_id']);
    $ingredientes    = mysqli_real_escape_string($db, $_POST['ingredientes']);
    $precio          = mysqli_real_escape_string($db, $_POST['precio']);



    //ASIGNAMOS LOS DATOS DE FILES A UNA VARIABLE

   $small_img = $_FILES['small_img'];


    //SI ALGUN INPUT LLEGA VACIO MOSTRAR ERROR

    if (!$nombre) {
        $errores[] = "El campo NOMBRE es oblighatorio, debes ingresarlo";
    }

    

    /* echo "<pre>";
       var_dump($small_img['name']);
       echo "</pre>";
        exit; */



    // Verificamos si el arreglo de errores se encuentre vacio

    if (empty($errores)) {


        /***********************************************/
        /**SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR**/
        /***********************************************/

        //CREAR UNA CARPETA
        $carpetaImagenes = 'uploads/product/';
        if (!is_dir($carpetaImagenes)) { //si no existe esta carpeta
            mkdir($carpetaImagenes); //crea la carpeta
        }

        //registramos una variable vacia: 

        $nombreImagen = '';

        //VERIFICAMOS SI EXISTE UNA IMAGEN EN EL REGISTRO

        if ($small_img['name']) { //si en la variable imagen existe una imagen nueva

            //Eliminamos ese archivo como atributos (ruta del archivo y nombre)
            unlink($carpetaImagenes . $producto['small_img']);

            /**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**/
            $nombreImagen = md5(uniqid(rand(), true)) . ".webp";

            //capturamos la imagen temporal y la movemos a su carpeta imagenes*/

            move_uploaded_file($small_img['tmp_name'], $carpetaImagenes . $nombreImagen);
            //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//

        } else {
            $nombreImagen = $producto['small_img']; //SI NO EXITE IMAGEN NUEVA CONSERVA LA IMAGEN ACTUAL
        }

        /****************************************************/
        //SENTENCIA SQL PARA APLICAR UN UPDATE DATOS A LA DB
        /****************************************************/

        $query = "UPDATE productos SET  id = ${id}, nombre = '${nombre}', small_img = '${nombreImagen}', precio = ${precio}, producto_id = ${producto_id}, ingredientes = '${ingredientes}', modal_img_id = NULL, tipo_id = ${tipo_id}, estado =   WHERE id = ${id} ";

        /* UPDATE `productos` SET `id`= 1,`nombre`='perro bulldog',`small_img`='imagen.jpg',`precio`= 1500,`ingredientes`='ingredientea, ingredienteB, ingredienteC,',`modal_img_id`= , NULL,`tipo_id`= 2,`estado`= 1 WHERE id = 1; */

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_update = mysqli_query($db, $query);

            //direccionando a otra pagina 
            header('location: showProductos.php?registro=2');
        

    } //fin de la condicion update propiedad




}


    
