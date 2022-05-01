<?php

//-------------------------------------------------------------//
//----------------- LISTADO DE CATEGORIAS  --------------------//
//-------------------------------------------------------------//

require './functions/function.php';

$auth = onlineUser();

//verificamos que exista usuario autenticado de no ser asi redirigir al sitio web

if (!$auth) {
    header('Location: ../index.php');
}


//conexion DB

require 'config/dbconfig.php';

$db = conectarDB();

//sentencia SQL consultar registros de propiedades

$tipos = "SELECT *FROM tipo_producto WHERE estado = 2";

//Visualizamos la consulta SQL

$query_pro = mysqli_query($db, $tipos);


//VALIDAMOS LO QUE LLEGUE POR GET
$registro = $_GET['registro'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null

$update = $_GET['update'] ?? null; //Aplicar a la variable regitro el valor recibido por GET si no exite marcarlo como null




/* ******* ELIMINAR UN REGSITRO ****** */

//COMPROBANDO LO QUE VIAJA POR EL POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if ($id) {
        //Eliminamos la imagen relacionada con nuestro id recibido por POST
        $queryImg = "SELECT tipo_img FROM tipo_producto WHERE id = ${id}";

        $resultadoImg = mysqli_query($db, $queryImg);

        $propiedadImg = mysqli_fetch_assoc($resultadoImg);


        unlink('uploads/type/' . $propiedadImg['imagen']);


        //eliminamos el registro relacionado con el id que recibimos por POST
        $query = "DELETE FROM tipo_producto WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('location: showTipo.php?registro=3');
        }
    }
}

include 'views/adm_header.php';

?>

<?php
include 'views/adm_menu.php';

?>


<!-- Contenido principal -->

<div class="section">
  <div class="content-wrapper w-70 mb-4">

    <!-- Main content -->
    
        <div class="row">
            <div class="col-md-12 mt-2">
                 <div class="card">

                        <div class="card-header">
                                <div class="col mr-auto">
                                    <h3 style="color: red !important;" class="titulo card-title font-weight-bold">CATEGORIAS INACTIVAS</h3>
                                       </div>                           
                                         </div>


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>NOMBRE</th>
                                        <th class="text-center">IMAGEN</th>
                                        <th class="text-center">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php while ($tipos = mysqli_fetch_assoc($query_pro)) : ?>


                            <tr>
                                <td><?php echo $tipos['id']; ?></td>

                                    <td class="text-uppercase" ><?php echo $tipos['tipo_nombre']; ?></td>

                                        <td class="w-2 text-center"><img src="uploads/type/<?php echo $tipos['tipo_img']; ?>" alt="" height="45px" width="45px"></td>

                                            <td>
                                                <div class="row text-center">

                                                    <div class="col mx-0">
                                                        <!-- EDITAR REGISTRO -->
                                                        <div class="col mx-0">
                                                                <button class="btn btn-warning" data-toggle="modal" data-target="#updateTipo<?php echo $tipos['id']; ?>"><i class="fas fa-edit"></i></button>                           
                                                        </div>
                                                           </div>

                                                                <div class="col mx-0">
                                                                    <!-- CAMBIAR ESTADO -->
                                                                    <form action="updateTipoUp.php" method="POST">
                                                                        <input type="hidden" name="id" value="<?php echo $tipos['id']; ?>">
                                                                    <button class="btn btn-success"  type="submit"><i class="fas fa-arrow-up"></i></button> 
                                                                    </form>                               
                                                                </div>

                                                           <div class="col mx-0">
                                                         <!-- ELIMINAR REGISTRO -->
                                                        <button class="buttondl btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $tipos['id']; ?>"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>

                                <?php  include 'modals/updateTipo.php' ?>
                            <?php  include 'modals/newTipoPro.php' ?>
                        <?php  include 'modals/deleteTipo.php' ?>
                    </div>   <!-- /.card-body -->  
                <?php endwhile; ?>
            </tbody>
        <tfoot>
    <tr>
            
        <th>Item</th>
            
             <th>Nombre</th>
            
            <th>Imagen</th>
            
            <th>Acciones</th>
        
        </tr>
    
    </tfoot>
</table>
           
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
 
</div>
<!-- /.container-fluid -->


<!-- /.content -->
</div>

<?php

//CERRAMOS LA CONEXION
mysqli_close($db);
include 'views/adm_footer.php';

?>