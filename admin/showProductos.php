<?php

require './functions/function.php';

$auth = onlineUser();

//verificamos que exista usuario autenticado de no ser asi redirigir al sitio web

if (!$auth) {
    header('Location: ../index.php');
}


//conexion DB

require 'config/dbconfig.php';

$db = conectarDB();


//SENTENCIA SQL CONSULTAR REGISTROS IMAGEN_MODAL:
$modals = "SELECT *FROM modal_producto";
$resul_modal = mysqli_query($db, $modals);

//---------------------------------------------------//

 
//SENTENCIA SQL CONSULTAR REGISTROS TIPOS DE PRODUCTO:

$tipo = "SELECT * FROM tipo_producto";
$resul_tipo = mysqli_query($db, $tipo);
/* $tipopro = mysqli_fetch_assoc($resul_tipo); */

/* var_dump($tipopro);
exit; */

//----Consulta para el modal newproducto.php----//


//sentencia SQL consultar registros de productos
$productos = "SELECT *FROM productos";

//Visualizamos la consulta SQL que usaremos en la tabla

$query_prod = mysqli_query($db, $productos);


//Visualizamos la consulta SQL que usaremos en el select de (imgModal)
$prod_modal = mysqli_query($db, $productos);


//VALIDAMOS LO QUE LLEGUE POR GET
$registro = $_GET['registro'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null

$update = $_GET['update'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null



/******************************************/
/*======== ELIMINAR UN REGSITRO===========*/
/******************************************/

//COMPROBANDO LO QUE VIAJA POR EL POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if ($id) {
        //Eliminamos la imagen relacionada con nuestro id recibido por POST
        $queryImg = "SELECT small_img FROM productos WHERE id = ${id}";

        $resultadoImg = mysqli_query($db, $queryImg);

        $propiedadImg = mysqli_fetch_assoc($resultadoImg);


        unlink('uploads/product/' . $propiedadImg['imagen']);


        //eliminamos el registro relacionado con el id que recibimos por POST
        $query = "DELETE FROM productos WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('location: showProductos.php?registro=3');
        }
    }
}

include 'views/adm_header.php';

?>

<?php
include 'views/adm_menu.php';

?>


<!-- Contenido principal -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <div class="col mr-auto">
                            <h3 class="titulo card-title">Listado de Productos</h3>
                        </div>
                          
                        <div class="row d-flex justify-content-end">
                        <div class="row text-nowrap align-items-center">
                            <div class="col">Nuevo Modal :</div>
                            <div class="col"><button class="btn btn-info mr-5 ml-0" data-toggle="modal" data-target="#nuevomodal"><i class="fas fa-image"></i></button>
                            <?php  include 'modals/imgModal.php' ?>
                        </div>
                        </div>

                        <div class="row text-nowrap align-items-center">
                            <div class="col">Nuevo Registro</div>
                            <div class="col"><button class="btn btn-success" data-toggle="modal" data-target="#nuevoproducto"><i class="fas fa-plus-circle"></i></button>
                            <?php  include 'modals/newproducto.php' ?>
                        </div>
                        </div>
                        </div>
                        
                    </div>
                    <hr>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>NOMBRE</th>
                                        <th class="text-center">IMAGEN</th>
                                        <th class="text-center">PRECIO</th>
                                        <th class="text-center">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php while ($productos = mysqli_fetch_assoc($query_prod)): ?>


                                        <tr>
                                            <td><?php echo $productos['id']; ?></td>

                                            <td class="text-uppercase" ><?php echo $productos['nombre']; ?></td>

                                            <td class="w-2 text-center"><img src="uploads/product/<?php echo $productos['small_img']; ?>" alt="" height="45px" width="45px"></td>

                                            <td class="text-uppercase text-center" > $ <?php echo $productos['precio']; ?></td>

                                            <td>
                                                <div class="row text-center">

                                                    <div class="col">
                                                        <!-- VER DETALLES DEL REGISTRO -->

                                                        <form method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
                                                            <button class="btn btn-primary" data-toggle="modal" data-target="#updateproducto<?php echo $productos['id']; ?>"><i class="fab fa-wpforms"></i></button>
                                                        </form>
                                                       
                                                    </div>

                                                    <div class="col">
                                                        <!-- VER DETALLES DEL REGISTRO -->
                                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#modalimg<?php echo $productomodal['id']; ?>"><i class="fas fa-image"></i></button>
                                                    </div>


                                                    <div class="col mx-0">
                                                        <!-- EDITAR REGISTRO -->
                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#updateproducto<?php echo $productos['id']; ?>"><i class="fas fa-edit"></i></button>                                
                                                    </div>

                                                    <div class="col mx-0">
                                                        <!-- ELIMINAR REGISTRO -->
                                                        <form method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $productos['id']; ?>">
                                                            <button type="submit" class="buttondl btn btn-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                     
                                        <?php include 'modals/updateProducto.php' ?>
                                    
                                    

                                   </div>



                                   <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Item</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    </table>
                    
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content -->
</div>

<?php

//CERRAMOS LA CONEXION
mysqli_close($db);
include 'views/adm_footer.php';

?>