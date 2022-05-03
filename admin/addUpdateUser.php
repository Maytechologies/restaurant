<?php

//-------------------------------------------------------------//
//-------------------  addUpdateUser.php  ---------------------//
//-------------------------------------------------------------//

require 'config/dbconfig.php';

$db = conectarDB();




$id = $_POST['id']; 


/* Esta consulta la ejecutamos para poder rescatar el campo photo de la tabla usuarios 
en caso que emn la actualizacion no selecionemos una nueva imagen */
$SQL = "SELECT *FROM usuarios WHERE id = ${id}";
  $queryUser = mysqli_query($db, $SQL);
    $usuarios = mysqli_fetch_assoc($queryUser);




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  /*   echo "<pre>";
    var_dump($usuarios);
    echo "</pre>"; 

    echo "<br>"; 

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>"; 

    echo "<br>"; 

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>"; 
    echo "<br>";  */
    
    

$user_name  = mysqli_real_escape_string($db, $_POST['user_name']);  
$email  = mysqli_real_escape_string($db, $_POST['email']);  
$password  = mysqli_real_escape_string($db, $_POST['password']);  
$tipo_id  = mysqli_real_escape_string($db, $_POST['tipo_id']); 
$passwordmd5   = password_hash($password, PASSWORD_BCRYPT); 

/* si selecionamos una nueva imagen para el usuaio
   Asignamos los datos que se recibe por variable global $_FILES a una variable */

$photoUser = $_FILES['photo'];



/***********************************************/
/**SESION PARA ACTUALIZAR IMAGEN DEL USUARIO****/
/***********************************************/

    //CREAR UNA CARPETA
    $carpetaImagenes = 'uploads/users/';
    if (!is_dir($carpetaImagenes)) { //si no existe esta carpeta
        mkdir($carpetaImagenes); //crea la carpeta
    }

    $nombreImagen = '';

    if ($photoUser['name']) {

        //Eliminamos la imagen actual con los atributos (ruta del archivo y nombre)
        unlink($carpetaImagenes . $usuarios['photo']);

        /**GENERAR UN NOMBRE UNICO y EXTENSION ALEATORIO PARA CADA IMAGEN**/
        $nombreImagen = md5(uniqid(rand(), true)) . ".webp";
       

        //capturamos la imagen temporal y la movemos a su carpeta imagenes*/

        move_uploaded_file($photoUser['tmp_name'], $carpetaImagenes . $nombreImagen);
    
        //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//

        
        
            }else {
                $nombreImagen = $usuarios['photo']; /* Si no llega una imagen nueva asignarle la que ya tiene en su registro actual */
            }

             /****************************************************/
             //SENTENCIA SQL PARA APLICAR UN UPDATE DATOS A LA DB
            /****************************************************/

           // NOTA: teclear cuidadosamente la sentencia SQL, encerrar los campos tipo string entre '' y los campos tipo numero sin comillas
            $query = "UPDATE usuarios SET  user_name = '${user_name}',
                                            email = '${email}',
                                            password = '${passwordmd5}',
                                            photo = '${nombreImagen}',
                                            tipo_id = ${tipo_id}
                                            WHERE id = ${id} ";

           /*  echo "<pre>";
            var_dump($query);
            echo "</pre>";  
            exit; */  
          

             //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

             $resultado_update = mysqli_query($db, $query);

             //direccionando a otra pagina 
             header('location: showUsers.php?registro=2');
         


}

