
<?php
//Conectando a la DB

require './config/dbconfig.php';

$db = conectarDB();


//ARREGLO PARA LOS MENSAJES DE ERRORES EN LOS INPUT DEL FORMULARIO

$errores = [];

//ASIGNAMOS VALORES VACIOS A LAS VARIABLES PARA ASIGNAR UN VALOR A LO INPUT Y A RECARGAR POR UN ERROR NO QUEDAR VACIO

$nombre          = '';
$precio          = '';
$ingredientes    = '';
$tipo_id         = '';



//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


/* echo "<pre>";
var_dump($_POST);
echo "</pre>";

echo "<br>";

exit;  */



    /* CAPTURAMOS LOS DATOS ENVIADOS DESDE EL FORMULARIO Y LE ASIGNAMOS UNA VARIABLE */

    /**APLICAMOS REGRA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

    $nombre        = mysqli_real_escape_string($db, $_POST['nombre']);
    $precio        = mysqli_real_escape_string($db, $_POST['precio']);
    $ingredientes  = mysqli_real_escape_string($db, $_POST['ingredientes']);
    $tipo_id       = mysqli_real_escape_string($db, $_POST['tipo_id']);
    $creado        = date('Y/m/d');


    //ASIGNAMOS LOS DATOS DE FILES A UNA VARIABLE

    
    $small_img = $_FILES["small_img"];

  /*   echo "<pre>";
    var_dump($logo_data['name']);
    echo "</pre>";
    echo "<br>";

     exit; */


    //SI ALGUN INPUT LLEGA VACIO MOSTRAR ERROR

    if (!$nombre) {
        $errores[] = "El campo NOMBRE es oblighatorio, debes ingresarlo";
    }

    if (!$precio) {
        $errores[] = "El campo PRECIO  es oblighatorio, debes ingresarlo para poder completar el registro";
    }


    if (!$ingredientes) {
        $errores[] = "Los INGREDIENTES son oblighatorio, debes ingresarlo";
    }


    if (!$tipo_id) {
        $errores[] = "El campo CATEGORIA es oblighatorio, debes ingresarlo";
    }

   
    // Verificamos si el arreglo de errores se encuentra vacio

    if (empty($errores)) {

        /***  SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR ***/

        //CREAR UNA CARPETA
        $carpetaImagenes = 'uploads/product/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }


        //**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**//

        $nombreImagen = md5(uniqid(rand(), true)) . ".webp";


        //capturamos la imagen temporal y la movemos a su carpeta imagenes

        move_uploaded_file($small_img['tmp_name'], $carpetaImagenes . $nombreImagen);
        //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//


        /* echo "<pre>";
        var_dump($logo_data);
        echo "</pre>";
        exit;   */

    //SENTENCIA SQL PARA INSERTAR DATOS A LA DB

     $query = "INSERT INTO productos ( nombre, precio, ingredientes, tipo_id, creado, small_img )
     VALUE ( '$nombre', '$precio', '$ingredientes', '$tipo_id', '$creado', '$nombreImagen' )";

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_insert = mysqli_query($db, $query);

        /*  echo "<pre>";
         var_dump($query);
         echo "</pre>";
         exit;  */   
         


        //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_insert) {

            //direccionando a otra pagina 
            header('location: showProductos.php?registro=1');
        }
    } //fin de la condicion errores vacios




}

?>