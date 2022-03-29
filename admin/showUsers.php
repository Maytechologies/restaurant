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



//seleccionamos el listado de usuarios de la tabla user

$users = "SELECT u.id, u.user_name, u.email, u.photo, tp.name_tip_user as perfil 
FROM usuarios as u INNER JOIN tipo_usuario as tp ON u.tipo_id = tp.id";

$queryAllUser = mysqli_query($db, $users);
/* $resulUser = mysqli_fetch_assoc($queryAllUser); */
/* var_dump($resulUser); */

//-------------------------------------------------------------//
//---SENTENCIA SQL CONSULTAR REGISTROS TIPOS DE PRODUCTO:-----//
//-------------------------------------------------------------//

$tipou = "SELECT * FROM tipo_usuario";
$resul_tipou = mysqli_query($db, $tipou); 


//incluimos las vistas header y menua de nuestros template admin
include 'views/adm_header.php';


include 'views/adm_menu.php';

?>


<!---------------------INICIAMOS EL CONTENIDO DE LA SESION----------------->


<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
    </div>
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <div class="col mr-auto">
                            <h3 class="titulo card-title">Listado de Usuarios</h3>
                        </div>
                          
                        <div class="row d-flex justify-content-end">
                                <div class="row text-nowrap align-items-center">
                                    <div class="col">Nuevo Modal :</div>
                                    <div class="col"><button class="btn btn-info mr-5 ml-0" data-toggle="modal" data-target="#nuevomodal"><i class="fas fa-image"></i></button></div>
                                    
                                </div>

                                <div class="row text-nowrap align-items-center">
                                     <div class="col">Nuevo Registro :</div>
                                    <div class="col"><button class="btn btn-success" data-toggle="modal" data-target="#nuevousuario"><i class="fas fa-plus-circle"></i></button></div>
                                    <?php  include 'modals/newuser.php' ?>
                            
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
                                    <th class="text-center">FOTO</th>
                                    <th>NOMBRE</th>
                                    <th>CORREO ELECTRONICO</th>
                                    <th class="text-center">PERFIL</th>
                                    <th class="text-center">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php while ($usuarios = mysqli_fetch_assoc($queryAllUser)): ?>
                                    <tr>
                                        <td><?php echo $usuarios['id']; ?></td>

                                        <td class="w-2 text-center"><img src="uploads/users/<?php echo $usuarios['photo']; ?>" alt="" height="45px" width="45px"></td>

                                        <td class="text-uppercase" ><?php echo $usuarios['user_name']; ?></td>

                                        <td class="text-uppercase" ><?php echo $usuarios['email']; ?></td>


                                        <td class="text-uppercase text-center" ><?php echo $usuarios['perfil']; ?></td>

                                        <td>
                                            <div class="row text-center">

                                                <div class="col">
                                                    <!-- VER DETALLES DEL REGISTRO -->
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalficha<?php echo $usuarios['id']; ?>"><i class="fab fa-wpforms"></i></button>
                                                </div>

                                                <div class="col mx-0">
                                                    <!-- EDITAR REGISTRO -->
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#updateproducto<?php echo $usuarios['id']; ?>"><i class="fas fa-edit"></i></button>                                
                                                </div>

                                                <div class="col mx-0">
                                                    <!-- ELIMINAR REGISTRO -->
                                                    <form method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $usuarios['id']; ?>">
                                                        <button type="submit" class="buttondl btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    
                                    <?php  include 'modals/newUser.php' ?>

                               </div> <!-- End Card Body -->



                               <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Item</th>
                        <th class="text-center">foto</th>
                        <th>Nombre</th>
                        <th>Correo Eléctronico</th>
                        <th class="text-center" >Perfil</th>
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


