
<?php 
include 'views/adm_header.php';
?>

<?php

require '../webincludes/funciones.php';

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
$consultapro = "SELECT *FROM propiedades WHERE id = ${id}";
$resultadopro = mysqli_query($db, $consultapro);
$propiedad = mysqli_fetch_assoc($resultadopro);


/*  echo "<pre>";
var_dump($propiedad);
echo "</pre>";

exit; */

echo "<br>"; 
 


//CONSULTAMOS LA TABLA VENDEDOERES
$vendedores = "SELECT * FROM vendedores";
$resul_vend = mysqli_query($db, $vendedores);

/* $vendedorp = mysqli_fetch_assoc($resul_vend);

echo "<pre>";
var_dump($vendedorp);
echo "</pre>";

exit;  */ 

//ARREGLO PARA LOS MENSAJES DE ERRORES EN LOS INPUT DEL FORMULARIO
$errores = [];

//ASIGNAMOS VALORES DE LA CONSULTA PROPIEDADES A  VARIABLES PARA ASIGNAR UN VALOR A LO INPUT

$titulo          = $propiedad['titulo'];
$precio          = $propiedad['precio'];
$descripcion     = $propiedad['descripcion'];
$habitaciones    = $propiedad['habitaciones'];                                                                                                                                                                                                                                                      
$wc              = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedor        = $propiedad['vendedorid'];
$imagenPropiedad = $propiedad['imagen'];

//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS

if ($_SERVER['REQUEST_METHOD']==='POST') {



/* CAPTURAMOS LOS DATOS ENVIADOS DESDE EL FORMULARIO Y LE ASIGNAMOS UNA VARIABLE */

/**APLICAMOS REGRA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

$titulo          = mysqli_real_escape_string($db, $_POST['titulo']);
$precio          = mysqli_real_escape_string($db, $_POST['precio']);
$descripcion     = mysqli_real_escape_string($db, $_POST['descripcion']);
$habitaciones    = mysqli_real_escape_string($db, $_POST['habitaciones']);
$wc              = mysqli_real_escape_string($db, $_POST['wc']);
$estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
$vendedor       = mysqli_real_escape_string($db, $_POST['vendedor']);
$creado          = date('Y/m/d');

       




//ASIGNAMOS LOS DATOS DE FILES A UNA VARIABLE

$imagen = $_FILES['imagen'];


//SI ALGUN INPUT LLEGA VACIO MOSTRAR ERROR

if (!$titulo) {
    $errores[] = "El campo TITULO es oblighatorio, debes ingresarlo";

}

if (!$precio) {
    $errores[] = "El campo PRECIO es oblighatorio, debes ingresarlo para poder completar el registro";

}


if (!$descripcion) {
    $errores[] = "El campo DESCRIPCION es oblighatorio, debes ingresarlo";

}

if (strlen($descripcion) < 50 ) {
    $errores[] = "El campo DESCRIPCION debe tener al menos 50 caracteres";

}

if (!$habitaciones) {
    $errores[] = "El campo N° de HABITACIONES es oblighatorio, debes ingresarlo";

}

if (!$wc) {
    $errores[] = "El campo N° de BAÑOS es oblighatorio, debes ingresarlo";

}

if (!$estacionamiento) {
    $errores[] = "El campo N° de ESTACIONAMIENTO es Oblighatorio, debes ingresarlo";

}

if (!$vendedor) {
    $errores[] = "El campo VENDEDOR es obligatorio, debes ingresarlo";

}

/* echo "<pre>";
var_dump($imagen['name']);
echo "</pre>";
exit; */



// Verificamos si el arreglo de errores se encuentre vacio

if (empty($errores)){


/***********************************************/
/**SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR**/
/***********************************************/

//CREAR UNA CARPETA
$carpetaImagenes = '../imagenes/' ;
if (!is_dir($carpetaImagenes)) {
    mkdir($carpetaImagenes);
}

//registramos una variable vacia: 

$nombreImagen = '';

//VERIFICAMOS SI EXISTE UNA IMAGEN EN EL REGISTRO

if ($imagen['name']) { //si en la variable imagen existe una imagen

    //Eliminamos ese archivo como atributos (ruta del archivo y nombre)
    unlink($carpetaImagenes . $propiedad['imagen']);

    /**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**/
    $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg"; 

    //capturamos la imagen temporal y la movemos a su carpeta imagenes*/

     move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen ); 
     //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//
    
}else {
    $nombreImagen = $propiedad['imagen'];
}


 //SENTENCIA SQL PARA APLICAR UN UPDATE DATOS A LA DB

   $query = "UPDATE propiedades SET titulo = '${titulo}', precio = ${precio}, imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones},
                                    wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorid = ${vendedor} WHERE id= ${id} ";

       

//GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_update = mysqli_query($db, $query);


        //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_update) {

            //direccionando a otra pagina 
            header('location: /admin?registro=2');
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
<div class="container">
<section class="content">

  <!-- Default box -->
  
  <div class="card">
    <div class="card-header">
    <h5>Actualizar Propiedad</h5>
      <h3 class="card-title w-90">

      <?php foreach($errores as $error):?>
            <div class="alert alert-danger" role="alert">
                <p><?php echo $error;?></p>
            </div>
      <?php endforeach;?>
            <br>
      </h3>

        
      </div>
    </div>



      
<form class="form-group" method="POST" enctype="multipart/form-data">
       <div class="card-body"> 
           
        <div class="row">
            <div class="col-sm-6  col col-12">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo :</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar Titulo de la Propiedad" value="<?php echo $titulo;?>">
                    <p></p>
                </div>
            </div>

            <div class="col-sm-3  col col-12">
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio :</label>
                    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio de la Propiedad" value="<?php echo $precio;?>">
                    <!-- <div id="emailHelp" class="form-text">Texto para las alertas</div> -->
                </div>
            </div>

        </div>
        <div class="row">
            
            <div class="border w-100 d-flex justify-content-center mb-2 align-items-center">
                <div class="col-sm-6 ml-5">
                    <label class="tx_img_old" for="imagen_tag">Imagen Actual :</label>
                <img class="imgsmall" src="/imagenes/<?php echo $propiedad['imagen'];?>" alt="">
                </div>
                <div class="col-sm-6">
                    <input type="file" class="form-control border-0" id="imagen" name="imagen" placeholder="Imagen de la Propiedad" accept="image/jpeg, image/png, image/webp"">
                </div>
            </div>
           
        </div>

        <div class="col-sm-12  col col-12">
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción :</label>
                   <textarea  class="form-control" id="descripcion" name="descripcion" placeholder="Ingresar la decripcion detallada" cols="100" rows="3"><?php echo $descripcion;?></textarea>
                    <!-- <div id="emailHelp" class="form-text">Texto para las alertas</div> -->
                </div>
            </div>



        <div class="row border-top my-2">
            <h4 class="title-card my-2">Detalles de la Propiedad :</h4>
            
        </div>
           
              <div class="row">
                <div class=" col col-sm-3 col col-12">
                        <div class="mb-3">
                            <label for="habitaciones" class="form-label">Habitaciones :</label>
                            <input type="number" class="form-control" id="habitaciones" name="habitaciones" placeholder="N° de Habitaciones" min="1" max="9" value="<?php echo $habitaciones;?>">
                            <!-- <div id="emailHelp" class="form-text">Texto para las alertas</div> -->
                    </div>
                </div>

                <div class=" col col-sm-3 col col-12">
                <div class="mb-3">
                    <label for="wc" class="form-label">Baños :</label>
                    <input type="number" class="form-control" id="wc" name="wc" placeholder="N° de Baños" min="1" max="9" value="<?php echo $wc;?>">
                    <!-- <div id="emailHelp" class="form-text">Texto para las alertas</div> -->
                </div>
                </div>


                 <div class=" col col-sm-3 col col-12">
                
                        <label for="estacionamiento" class="form-label">Estacionamiento :</label>
                        <input type="number" class="form-control" id="estacionamiento" name="estacionamiento" placeholder="N° de Estacionamineto" min="1" max="9" value="<?php echo $estacionamiento;?>">
                        <!-- <div id="emailHelp" class="form-text">Texto para las alertas</div> -->
                  
                 </div>

                 <div class=" col col-sm-3 col col-12">
                 <div class="mb-3">
                  <label for="vendedor" class="form-label">Vendedor :</label>
                    <select name="vendedor" id="vendedor" class="form-control" value="<?php echo $vendedor;?>">
                        
                        <option value="0" >Selecionar un Vendedor</option>

                        <?php while($vendedorp = mysqli_fetch_assoc($resul_vend)):?>
                            <option <?php echo $vendedor === $vendedorp['id'] ? 'selected':'';?> value="<?php echo $vendedorp['id'];?>"><?php echo $vendedorp['nombre']. "  ". $vendedorp['apellidos'];?></option>

                         <?php endwhile ;?>

                    </select>
                 </div>
                 </div>
              
              </div> <!-- end row -->


              
             

            
</div> <!-- fin card body -->

        <div class="card-footer d-flex justify-content-center">
            <div class="row">
                <div class="col mx-4">
                <button type="submit" class="btn btn-success">Actualizar</button>
                </div>

                <div class="col mx-4">
                <a href="index.php" class="btn btn-danger">Cerrar</a>
                </div>
            </div>
        </div>     
       
 </form>

  </div>

  </div>
</div>


<div class="container-fluid">
<?php
 include 'views/adm_footer.php';
?>
</div>