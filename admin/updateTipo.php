<?php
include 'views/adm_header.php';
?>

<?php

require './functions/function.php';

$auth = onlineUser();

//verificamos que exista usuario autenticado de no ser asi redirigir al sitio web



if (!$auth) {
    header('Location: ../index.php');
}


//CAPTURAMOS EL DATO ID EN UNA VARIABLE Y LUEGO VALIDAMOS POR FILTRO QUE ESTE CAMPO SEA UN ENTERO
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

//condicion de no recibir un entero
if (!$id) {
    header('location: /admin');
}

//Conectando a la DB
require 'config/dbconfig.php';

$db = conectarDB();

//CONSULTAMOS EN DB LA TABLA PROPIEDADES SEGUN EL ID RECIBIDO
$consultatipo = "SELECT *FROM tipo_producto WHERE id = ${id}";
$resultadotipo = mysqli_query($db, $consultatipo);
$tipo = mysqli_fetch_assoc($resultadotipo);


 echo "<pre>";
var_dump($tipo);
echo "</pre>";

echo "<br>";

   
 
echo "<br>";

//CONSULTAMOS LA TABLA ESTADO RELACIONADA CON TIPO_PRODUCTO
$estado = "SELECT * FROM estado";
$resul_estado = mysqli_query($db, $estado);

/* $estadotab = mysqli_fetch_assoc($resul_estado); */

/* echo "<pre>";
var_dump($estadotab);
echo "</pre>";

exit;   */



//ARREGLO PARA LOS MENSAJES DE ERRORES EN LOS INPUT DEL FORMULARIO
$errores = [];

//ASIGNAMOS VALORES DE LA CONSULTA PROPIEDADES A  VARIABLES PARA ASIGNAR UN VALOR Al INPUT

$tipo_nombre       = $tipo['tipo_nombre'];
$tipo_img          = $tipo['tipo_img'];
$estado            =$tipo['estado'];


//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    /* CAPTURAMOS LOS DATOS ENVIADOS DESDE EL FORMULARIO Y LE ASIGNAMOS UNA VARIABLE */

    /**APLICAMOS REGLA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

    $tipo_nombre     = mysqli_real_escape_string($db, $_POST['tipo_nombre']);
    $estado          = mysqli_real_escape_string($db, $_POST['estado']);



    //ASIGNAMOS LOS DATOS DE FILES A UNA VARIABLE

    $tipo_img = $_FILES['imagen'];


    //SI ALGUN INPUT LLEGA VACIO MOSTRAR ERROR

    if (!$tipo_nombre) {
        $errores[] = "El campo NOMBRE es oblighatorio, debes ingresarlo";
    }

    

    /* echo "<pre>";
       var_dump($tipo_img['name']);
       echo "</pre>";
        exit; */



    // Verificamos si el arreglo de errores se encuentre vacio

    if (empty($errores)) {


        /***********************************************/
        /**SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR**/
        /***********************************************/

        //CREAR UNA CARPETA
        $carpetaImagenes = 'uploads/type/';
        if (!is_dir($carpetaImagenes)) { //si no existe esta carpeta
            mkdir($carpetaImagenes); //crea la carpeta
        }

        //registramos una variable vacia: 

        $nombreImagen = '';

        //VERIFICAMOS SI EXISTE UNA IMAGEN EN EL REGISTRO

        if ($tipo_img['name']) { //si en la variable imagen existe una imagen nueva

            //Eliminamos ese archivo como atributos (ruta del archivo y nombre)
            unlink($carpetaImagenes . $tipo['imagen']);

            /**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**/
            $nombreImagen = md5(uniqid(rand(), true)) . ".webp";

            //capturamos la imagen temporal y la movemos a su carpeta imagenes*/

            move_uploaded_file($tipo_img['tmp_name'], $carpetaImagenes . $nombreImagen);
            //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//

        } else {
            $nombreImagen = $tipo['tipo_img']; //SI NO EXITE IMAGEN NUEVA CONSERVA LA IMAGEN ACTUAL
        }

        /****************************************************/
        //SENTENCIA SQL PARA APLICAR UN UPDATE DATOS A LA DB
        /****************************************************/

        $query = "UPDATE tipo_producto SET tipo_nombre = '${tipo_nombre}', tipo_img = '${nombreImagen}', estado = '${estado}' WHERE id= ${id} ";



        //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_update = mysqli_query($db, $query);


        //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_update) {

            //direccionando a otra pagina 
            header('location: showTipo.php?registro=2');
        }
    } //fin de la condicion update propiedad




}





?>

<?php
include 'views/adm_menu.php';

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
    <div class="container col-10 bg-white">
        <section class="content">

            <!-- Default box -->

            <div class="card">
                <div class="card-header">
                    <h5>Actualizar Tipo de Producto</h5>
                    <h3 class="card-title w-90">

                        <?php foreach ($errores as $error) : ?>
                            <div class="alert alert-danger" role="alert">
                                <p><?php echo $error; ?></p>
                            </div>
                        <?php endforeach; ?>
                        <br>
                    </h3>


                </div>
            </div>

           
            <!--  STAR FORM UPDATE -->

            <form class="form-group" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-6  col col-12">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Nombre :</label>
                                <input type="text" class="form-control" id="tipo_nombre" name="tipo_nombre" placeholder="Ingresar Nombre" value="<?php echo $tipo_nombre; ?>">
                                <p></p>
                            </div>
                        </div>

                        <div class=" col col-sm-6 col col-12">
                                    <div class="mb-3">
                                        <label for="vendedor" class="form-label">Estado :</label>
                                        <select name="estado" id="estado" class="form-control" value="<?php echo $estado; ?>">


                                            <option value=" ">Selecionar una opcion</option>
                                            <?php while ($estadorsn = mysqli_fetch_assoc($resul_estado)):?> 
                                               <option <?php echo $estado === $estadorsn['id_status'] ? 'selected': '' ;?> value="<?php echo $estadorsn['id_status'];?>"><?php  echo $estadorsn['name_status'];?></option>
                                            <?php  endwhile;?>
                                          

                                        </select>
                                    </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="border w-100 d-flex justify-content-center mb-2 align-items-center">
                            <div class="col-sm-6 ml-5">
                                <label class="tx_img_old" for="imagen_tag">Imagen Actual :</label>
                                 <img class="imgsmall" src="uploads/type/<?php echo $tipo['tipo_img']; ?>" alt="">
                            </div>
                            <div class="col-sm-4">
                                <input type="file" style="border: none;" class="form-control border-0" id="imagen" name="imagen" placeholder="Imagen de la Propiedad" accept="image/jpeg, image/png, image/webp"">
                            </div>
                        </div>    
                      </div>
                  </div> <!-- end row -->

                        <div class="card-footer d-flex justify-content-center">
                            <div class="row">
                                <div class="col mx-4">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>

                                <div class="col mx-4">
                                    <a href="showTipo.php" class="btn btn-danger">Cerrar</a>
                                </div>
                            </div>
                        </div>

            </form> <!-- END FORM -->

    </section>
</div>
</div>
  





<div class="container-fluid">
    <?php
    include 'views/adm_footer.php';
    ?>
</div>