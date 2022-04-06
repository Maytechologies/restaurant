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
$tipo_nombre  = '';
$tipo_img     = '';
$estado      = '';


//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* echo "<pre>";
var_dump($_POST);
echo "</pre>";

echo "<br>";
 */


    /* CAPTURAMOS LOS DATOS ENVIADOS DESDE EL FORMULARIO Y LE ASIGNAMOS UNA VARIABLE */

    /**APLICAMOS REGRA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */
    $tipo_nombre = mysqli_real_escape_string($db, $_POST['tipo_nombre']);



    //ASIGNAMOS LOS DATOS DE FILES A UNA VARIABLE
    $imagen = $_FILES['imagen'];


    //SI ALGUN INPUT LLEGA VACIO MOSTRAR ERROR
    if (!$tipo_nombre) {
        $errores[] = "El campo NOMBRE es oblighatorio, debes ingresarlo";
    }


    if (!$tipo_img) {
        $errores[] = "Una IMAGEN es obligatoria, debes subir una imagen al registro";
    }



    /* echo "<pre>";
var_dump($imagen['name']);
echo "</pre>";
exit; */



    // Verificamos si el arreglo de errores se encuentra vacio

    if (empty($errores)) {

        /***  SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR ***/

        //CREAR UNA CARPETA
        $carpetaImagenes = 'uploads/type/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }


        //**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**//

        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


        //capturamos la imagen temporal y la movemos a su carpeta imagenes

        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//




        //SENTENCIA SQL PARA INSERTAR DATOS A LA DB

        $query = "INSERT INTO tipo_producto (tipo_nombre, tipo_img)
        VALUE ('$tipo_nombre', '$nombreImagen')";

        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_insert = mysqli_query($db, $query);

        /*   echo "<pre>";
         var_dump($query);
         echo "</pre>";
         exit;   */



        //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_insert) {

            //direccionando a otra pagina 
            header('location: showTipo.php?registro=1');
        }
    } //fin de la condicion errores vacios




}

?>

<?php
include './views/adm_menu.php';

?>



<!-- Contenido principal -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">


                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <!-- Contenido Principal -->
    <div class="container mt-5 w-50">
        <section class="content">


            <?php foreach ($errores as $error) : ?>
                <div class="alert alert-danger" role="alert">
                    <p><?php echo $error; ?></p>
                </div>
            <?php endforeach; ?>

            <!-- Default box -->

            <div class="card  bg-white">
                <div class="card-header">
                    <h5>Registro de Tipo de Producto</h5>
                    <h3 class="card-title w-90">
                    </h3>


                </div>
           




            <form class="form-group" method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo :</label>
                                <input type="text" class="form-control" id="tipo_nombre" name="tipo_nombre" placeholder="Ingresar Nombre" value="<?php echo $tipo_nombre; ?>" required="">
                                <p></p>
                            </div>
                        </div>



                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen :</label>
                                <input type="file" class="form-control border-0" id="imagen" name="imagen" placeholder="Imagen " accept="image/jpeg, image/png, image/webp">
                            </div>
                        </div>
                    </div>
                </div> <!-- fin card body -->
               <hr>

                <div class="card-footer d-flex justify-content-center" style="margin-bottom: -10px;">
            
                    <div class="row">
                        <div class="col mx-4">
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>

                        <div class="col mx-4">
                            <a href="showTipo.php" class="btn btn-danger">Cerrar</a>
                        </div>
                    </div>
                </div>

            </form>
     
        </div>
    </div>

</div>



<div class="container-fluid">
    <?php
    include './views/adm_footer.php';
    ?>
</div>