<?php
include './views/adm_header.php';
?>

<?php

require './functions/function.php';

$auth = onlineUser();

//verificamos que exista usuario autenticado de no ser asi redirigir al sitio web

if (!$auth) {
    header('Location: ../index.php');
}

//VALIDAMOS LO QUE LLEGUE POR GET
$registro = $_GET['registro'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null

$update = $_GET['update'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null

//Conectando a la DB

require './config/dbconfig.php';

$db = conectarDB();


//ARREGLO PARA LOS MENSAJES DE ERRORES EN LOS INPUT DEL FORMULARIO

$errores = [];

//ASIGNAMOS VALORES VACIOS A LAS VARIABLES PARA ASIGNAR UN VALOR A LO INPUT Y A RECARGAR POR UN ERROR NO QUEDAR VACIO

$name_data     = '';
$address_data  = '';
$phone_data    = '';
$email_data    = '';
$logo_data     = '';
$manager       = '';


//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


/* echo "<pre>";
var_dump($_POST);
echo "</pre>";

echo "<br>";

exit; */



    /* CAPTURAMOS LOS DATOS ENVIADOS DESDE EL FORMULARIO Y LE ASIGNAMOS UNA VARIABLE */

    /**APLICAMOS REGRA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

    $name_data            = mysqli_real_escape_string($db, $_POST['name_data']);
    $address_data         = mysqli_real_escape_string($db, $_POST['address_data']);
    $phone_data           = mysqli_real_escape_string($db, $_POST['phone_data']);
    $email_data           = mysqli_real_escape_string($db, $_POST['email_data']);
    $manager              = mysqli_real_escape_string($db, $_POST['manager']);
    
    $create_data          = date('Y/m/d');


    //ASIGNAMOS LOS DATOS DE FILES A UNA VARIABLE

    
    $logo_data = $_FILES["logo_data"];

  /*   echo "<pre>";
    var_dump($logo_data['name']);
    echo "</pre>";
    echo "<br>";

     exit; */


    //SI ALGUN INPUT LLEGA VACIO MOSTRAR ERROR

    if (!$name_data) {
        $errores[] = "El campo NOMBRE es oblighatorio, debes ingresarlo";
    }

    if (!$address_data) {
        $errores[] = "El campo DIRECCION  es oblighatorio, debes ingresarlo para poder completar el registro";
    }

    if (!$logo_data) {
        $errores[] = "Una IMAGEN es obligatoria, debes subir una imagen al registro";
    }

    if (!$phone_data) {
        $errores[] = "El campo TELEFONO es oblighatorio, debes ingresarlo";
    }


    if (!$email_data) {
        $errores[] = "El campo EMAIL es oblighatorio, debes ingresarlo";
    }

    if (!$manager) {
        $errores[] = "El campo GERENTE es oblighatorio, debes ingresarlo";
    }






    // Verificamos si el arreglo de errores se encuentra vacio

    if (empty($errores)) {

        /***  SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR ***/

        //CREAR UNA CARPETA
        $carpetaImagenes = 'uploads/datos/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }


        //**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**//

        $nombreImagen = md5(uniqid(rand(), true)) . ".webp";


        //capturamos la imagen temporal y la movemos a su carpeta imagenes

        move_uploaded_file($logo_data['tmp_name'], $carpetaImagenes . $nombreImagen);
        //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//


        /* echo "<pre>";
        var_dump($logo_data);
        echo "</pre>";
        exit;   */

    //SENTENCIA SQL PARA INSERTAR DATOS A LA DB

     $query = "INSERT INTO datos ( name_data, address_data, phone_data, email_data, logo_data, manager )
     VALUE ( '$name_data', '$address_data', '$phone_data', '$email_data', '$nombreImagen', '$manager' )";

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_insert = mysqli_query($db, $query);

         /* echo "<pre>";
         var_dump($query);
         echo "</pre>";
         exit;    */
         


        //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_insert) {

            //direccionando a otra pagina 
            header('location: regDatos.php?registro=1');
        }
    } //fin de la condicion errores vacios




}

?>

<?php
include './views/adm_menu.php';

?>



<!-- Contenido principal -->
<div class="content-wrapper">


<!-- Contenido Principal -->
<div class="container mt-5 col col-10">
        

        <?php foreach ($errores as $error) : ?>
             <div class="alert alert-danger" role="alert">
                <p><?php echo $error; ?></p>
            </div>
        <?php endforeach; ?>
                       

    <div class="card card-primary shadow">
            <div class="card-header">
                <h3 class="card-title">Datos de la Empresa</h3>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="row">
                    <div class="col col-sm-6 col col-12">
                        <div class="form-group">
                            <label for="name_data">Nombre :</label>
                            <input type="text" class="form-control" id="name_data"  name="name_data" placeholder="Nombre de la Empresa">
                        </div>
                    </div>

                   <div class="col col-sm-6 col col-12">
                        <div class="form-group">
                            <label for="address_data">Dirección :</label>
                            <input type="text" class="form-control" id="address_data"  name="address_data" placeholder="Dirección Tributaria">
                        </div>
                    </div>
                  </div>

                  <div class="row">

                  <div class="col col-sm-6 col col-12">
                        <div class="form-group">
                            <label for="phone_data">Telefono :</label>
                            <input type="text" class="form-control" id="phone_data" name="phone_data" placeholder="Telefono Principal">
                        </div>
                  </div>

                  <div class="col col-sm-6 col col-12">
                        <div class="form-group">
                                <label for="email_data">Email :</label>
                                <input type="email" class="form-control" id="email_data" name="email_data" placeholder="Email de la Empresa">
                        </div>
                  </div>

                  </div>

                <div class="row">
                    <div class="col col-sm-6 col col-12">
                        <div class="form-group">
                            <label for="manager">Gerencia</label>
                            <input type="text" class="form-control" id="manager" name="manager" placeholder="Nombre de Gerente">
                        </div>
                    </div>

                    <div class="col col-sm-6 col col-12">
                        <div class="form-group">
                            <label for="logo_data">Logo :</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="logo_data" style="border: none;" name="logo_data" placeholder="Selecciona la imagen del Logo" accept="image/jpeg, image/png, image/webp">
                                  
                                </div>
                            
                            </div>
                        </div>
                    </div>
                  </div>
                 
                  <hr>

                  <div class="card-footer bg-light">
                   <div class="row text-center">
                       <div class="col col-6">
                           <button class="btn btn-success">Registrar</button>
                       </div>

                    

                       <div class="col col-6">
                           <button  class="btn btn-danger">Cerrar</button>
                       </div>

                   </div>
                  </div>
            </form>
         </div>
    </div>
</div>

</div>



<div class="container-fluid">
    <?php
    include './views/adm_footer.php';
    ?>
</div>