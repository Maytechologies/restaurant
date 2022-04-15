<?php

//-------------------------------------------------------------//
//-------SESION LISTADO DE USUARIOS - > showUsers.php----------//
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



//seleccionamos el listado de usuarios de la tabla user

$users = "SELECT u.id, u.user_name, u.email, u.password, u.photo, tp.name_tip_user as perfil, u.tipo_id
FROM usuarios as u INNER JOIN tipo_usuario as tp ON u.tipo_id = tp.id";

$queryAllUser = mysqli_query($db, $users);
/* $resulUser = mysqli_fetch_assoc($queryAllUser); */
/* var_dump($resulUser); */

//-------------------------------------------------------------//
//---SENTENCIA SQL CONSULTAR REGISTROS TIPOS DE USUARIOS:------//
//-------------------------------------------------------------//

$tipou = "SELECT * FROM tipo_usuario";
$resul_tipou = mysqli_query($db, $tipou); // este query lo aplicamos en la etiqueta select del formulario de registro

/******************************************/
/*======== ELIMINAR UN REGSITRO===========*/
/******************************************/

//COMPROBANDO LO QUE VIAJA POR EL POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if ($id) {
        //Eliminamos la imagen relacionada con nuestro id recibido por POST
        $queryUser = "SELECT photo FROM usuarios WHERE id = ${id}";
        $resultadoUser = mysqli_query($db, $queryUser);
        $DelUser = mysqli_fetch_assoc($resultadoUser);


        unlink('uploads/Users/' . $DelUser['photo']);


        //eliminamos el registro relacionado con el id que recibimos por POST
        $query = "DELETE FROM usuarios WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('location: showUsers.php?registro=3');
            
        }
    }
}


//incluimos las vistas header y menu de nuestros template admin
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
                            <h3 class="titulo card-title font-weight-bold">USUARIOS DEL SISTEMA</h3>
                               </div>
                          
                                        <div class="row d-flex justify-content-end"> 
                                      <div class="row text-nowrap align-items-center">
                                     <div class="col">Nuevo Usuario :</div>
                                    <div class="col"><button class="btn btn-success" data-toggle="modal" data-target="#nuevousuario"><i class="fas fa-plus-circle"></i></button></div>
                                    <?php  include 'modals/newuser.php' ?>
                                </div>
                               
                        </div>
                        
                    </div>

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

                                        <td class="w-2 text-center"><img class="imgsmall" src="uploads/users/<?php echo $usuarios['photo']; ?>"></td>

                                        <td class="text-uppercase" ><?php echo $usuarios['user_name']; ?></td>

                                        <td class="text-uppercase" ><?php echo $usuarios['email']; ?></td>

                                         <input type="hidden" name="password" value="<?php echo $usuarios['password']; ?>">
                                         <input type="hidden" name="perfil" value="<?php echo $usuarios['perfil']; ?>">
                                         <input type="hidden" name="tipo_id" value="<?php echo $usuarios['tipo_id']; ?>">
                                       

                                        <td class="text-uppercase text-center" ><?php echo $usuarios['perfil']; ?></td>

                                        <td>
                                            <div class="row text-center">
                                                             <div class="col mx-0">
                                                                <!-- EDITAR REGISTRO -->
                                                                <button class="btn btn-warning" data-toggle="modal" data-target="#updateUser<?php echo $usuarios['id']; ?>"><i class="fas fa-edit"></i></button>                           
                                                              </div>

                                                                <div class="col mx-0">
                                                                  <!-- ELIMINAR REGISTRO -->
                                                                  <button class="buttondl btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $usuarios['id']; ?>"><i class="fas fa-trash"></i></button>
                                                               </div>
                                                </div>
                                            </div>   
                                  <?php  include 'modals/newUser.php' ?>
                             <?php  include 'modals/deleteUser.php' ?>
                             <?php  include 'modals/updateUser.php' ?>
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
                    </div> <!-- /.card-body -->
                </div> <!-- /.col --> 
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content -->

<?php

//CERRAMOS LA CONEXION
mysqli_close($db);
include 'views/adm_footer.php';

?>


