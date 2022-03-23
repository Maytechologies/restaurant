<?php

require './config/dbconfig.php';

$db = conectarDB();

$errores = [];

echo "<pre>";
var_dump($_POST);
echo "<pre>";

echo "<pre>";
var_dump($_FILES);
echo "<pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


$nombre_modal = $_POST['nombre_modal'];
$imagen = ($_FILES['img_modal']['name']) ;


$img_modal = '';


 $img_modal = ($_FILES["img_modal"]); 



if (!$nombre_modal) {
    $error [] = "Para el registro del modal es necesario el NOMBRE";

    
}

if (!$imagen){
    $error [] = "Es Obligatorio SELECCIONAR UNA IMAGEN";
   
}


if (empty($error)) {
    
//AI NO EXISTE CREAMOS LA CARPETA PARA LAS MIMAGENES DE MODALES

$carpetaModales = 'uploads/modals/';

if(!is_dir($carpetaModales)){
    mkdir($carpetaModales);
}

//NOMBRE UNICO Y EXTENSION WEBP PARA CADA IMAGEN

$nombreImgModal = md5(uniqid(rand(), true)) . ".webp";

 //capturamos la imagen temporal y la movemos a su carpeta imagenes
 move_uploaded_file($img_modal['tmp_name'], $carpetaModales . $nombreImgModal);
 //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//

//SENTENCIA SQL PARA INSERTAR DATOS EN DB

$queryModal = "INSERT INTO modal_producto (nombre_modal, img_modal)
            VALUE ('$nombre_modal', '$nombreImgModal')";

$resultado = mysqli_query($db, $queryModal);

//CONDICIONAMOS SI SE REALIZO LA INSERCION

if ($resultado) {

    //direccionando a otra pagina 
    header('location: showProductos.php?registro=2');
}


}

}