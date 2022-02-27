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

//sentencia SQL consultar registros de propiedades

$tipos = "SELECT *FROM tipo_producto";

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


        unlink('../imagenes/' . $propiedadImg['imagen']);


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
                    <div class="card-header d-flex align-items-center">
                        <div class="col mr-auto">
                            <h3 class="card-title">Tipos de Productos</h3>
                        </div>
                        <div class="row text-nowrap align-items-center">
                            <div class="col">Nuevo Registro</div>
                            <div class="col"><a href="createTipos.php"><button class="btn btn-success"><i class="fas fa-plus-circle"></i></button></a></div>
                        </div>
                    </div>


                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>NOMBRE</th>
                                        <th>IMAGEN</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php while ($tipos = mysqli_fetch_assoc($query_pro)) : ?>

                                        <tr>
                                            <td><?php echo $tipos['id']; ?></td>

                                            <td><?php echo $tipos['tipo_nombre']; ?></td>

                                            <td><img src="uploads/type/<?php echo $tipos['tipo_img']; ?>" alt="" height="30px" width="30px"></td>

                                            <td>
                                                <div class="row text-center">

                                                    <div class="col">
                                                        <!-- VER DETALLES DEL REGISTRO -->
                                                        <button class="btn btn-primary"><i class="fab fa-wpforms"></i></button>
                                                    </div>

                                                    <div class="col mx-0">
                                                        <!-- EDITAR REGISTRO -->
                                                        <a href="updateTipo.php?id=<?php echo $tipos['id']; ?>"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                                    </div>

                                                    <div class="col mx-0">
                                                        <!-- ELIMINAR REGISTRO -->
                                                        <form method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $tipos['id']; ?>">
                                                            <button type="submit" class="buttondl btn btn-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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