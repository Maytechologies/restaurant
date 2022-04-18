<?php

//-------------------------------------------------------------//
//-------------------  addUpdateUTipo.php  ---------------------//
//-------------------------------------------------------------//

require 'config/dbconfig.php';

$db = conectarDB();
$id = $_POST['id']; 


/* Esta consulta la ejecutamos para poder rescatar el campo photo de la tabla usuarios 
en caso que emn la actualizacion no selecionemos una nueva imagen */
$SQL = "SELECT *FROM tipo_producto WHERE id = ${id}";
  $queryTipo = mysqli_query($db, $SQL);
    $Tipos= mysqli_fetch_assoc($queryTipo);




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$tipo_nombre  = mysqli_real_escape_string($db, $_POST['tipo_nombre']);  
$estado  = mysqli_real_escape_string($db, $_POST['estado']);  

/* si selecionamos una nueva imagen para el usuaio
   Asignamos los datos que se recibe por variable global $_FILES a una variable */

$tipo_img = $_FILES['tipo_img'];



/***********************************************/
/**SESION PARA ACTUALIZAR IMAGEN DEL USUARIO****/
/***********************************************/

    //CREAR UNA CARPETA
    $carpetaImagenes = 'uploads/type/';
    if (!is_dir($carpetaImagenes)) { //si no existe esta carpeta
        mkdir($carpetaImagenes); //crea la carpeta
    }

    $nombreImagen = '';

    if ($tipo_img['name']) {

        //Eliminamos la imagen actual con los atributos (ruta del archivo y nombre)
        unlink($carpetaImagenes . $tipos['tipo_img']);

        /**GENERAR UN NOMBRE UNICO y EXTENSION ALEATORIO PARA CADA IMAGEN**/
        $nombreImagen = md5(uniqid(rand(), true)) . ".webp";
       

            //capturamos la imagen temporal y la movemos a su carpeta imagenes*/

            move_uploaded_file($tipo_img['tmp_name'], $carpetaImagenes . $nombreImagen);
        
            //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//

        
        
            }else {
                $nombreImagen = $Tipos['tipo_img']; /* Si no llega una imagen nueva asignarle la que ya tiene en su registro actual */
            }

             /****************************************************/
             //SENTENCIA SQL PARA APLICAR UN UPDATE DATOS A LA DB
            /****************************************************/

           // NOTA: teclear cuidadosamente la sentencia SQL, encerrar los campos tipo string entre '' y los campos tipo numero sin comillas
            $query = "UPDATE tipo_producto SET  tipo_nombre = '${tipo_nombre}',
                                                  tipo_img = '${nombreImagen}',
                                                    estado = ${estado}
                                                      WHERE id = ${id} ";
          

             //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

             $resultado_update = mysqli_query($db, $query);

             //direccionando a otra pagina 
             header('location: showTipo.php?registro=2');
         


}

