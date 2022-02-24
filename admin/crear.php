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

//VALIDAMOS LO QUE LLEGUE POR GET
$registro = $_GET['registro'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null

$update = $_GET['update'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null

//Conectando a la DB

require 'config/dbconfig.php';

$db = conectarDB();

//CONSULTAMOS LA TABLA VENDEDOERES

$vendedores = "SELECT * FROM vendedores";

$resul_vend = mysqli_query($db, $vendedores);

//ARREGLO PARA LOS MENSAJES DE ERRORES EN LOS INPUT DEL FORMULARIO

$errores = [];

//ASIGNAMOS VALORES VACIOS A LAS VARIABLES PARA ASIGNAR UN VALOR A LO INPUT Y A RECARGAR POR UN ERROR NO QUEDAR VACIO

$titulo          = '';
$precio          = '';
$descripcion     = '';
$habitaciones    = '';
$wc              = '';
$estacionamiento = '';
$vendedor        = '';

//EJECUTAMOS LA VALIDACION SI EL METODO RECIBIDO ES $_POST ENTOCES CONTINUA CON LA CAPTURA DE DATOS

if ($_SERVER['REQUEST_METHOD']==='POST') {

/* echo "<pre>";
var_dump($_POST);
echo "</pre>";

echo "<br>";
 */


/* CAPTURAMOS LOS DATOS ENVIADOS DESDE EL FORMULARIO Y LE ASIGNAMOS UNA VARIABLE */

/**APLICAMOS REGRA PARA SANITIZAR NUESTRA INFORMACION mysqli_real_escape_string */

$titulo          = mysqli_real_escape_string($db, $_POST['titulo']);
$precio          = mysqli_real_escape_string($db, $_POST['precio']);
$descripcion     = mysqli_real_escape_string($db, $_POST['descripcion']);
$habitaciones    = mysqli_real_escape_string($db, $_POST['habitaciones']);
$wc              = mysqli_real_escape_string($db, $_POST['wc']);
$estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
$vendedor        = mysqli_real_escape_string($db, $_POST['vendedor']);
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

if (!$imagen) {
    $errores[] = "Una IMAGEN es obligatoria, debes subir una imagen al registro";

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

/* SESION PARA SUBIR IMAGEN A NUESTRO SERVIDOR*/

//CREAR UNA CARPETA
$carpetaImagenes = '../imagenes/' ;
if (!is_dir($carpetaImagenes)) {
    mkdir($carpetaImagenes);
}


//**GENERAR UN NOMBRE UNICO y ALEATORIO PARA CADA IMAGEN**//

$nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";


//capturamos la imagen temporal y la movemos a su carpeta imagenes

move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
                                     //* AQUI SI REEMPLAZAMOS LA EXTENCION JPG X WEBP LOGRAMOS UNA IMAGEN ACTA PARA SITIOS WEB *//




 //SENTENCIA SQL PARA INSERTAR DATOS A LA DB

    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorid)
    VALUE ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedor')";

    //GUARDAMOS LA CONSULTA SQL  INSERT EN UNA VARIABLE

        $resultado_insert = mysqli_query($db, $query);

        /*  echo "<pre>";
         var_dump($query);
         echo "</pre>";
         exit;  */



        //CONDICIONAMOS SI SE REALIZO LA INSERCION

        if ($resultado_insert) {

            //direccionando a otra pagina 
            header('location: /admin?registro=1');
        }
        

  } //fin de la condicion errores vacios

   

    
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
    <h5>Registro de Propiedad</h5>
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



      
<form class="form-group" method="POST" action="" enctype="multipart/form-data">
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

            <div class="col-sm-3  col col-12">
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen :</label>
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
                <button type="submit" class="btn btn-success">Registrar</button>
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