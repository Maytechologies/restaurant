<?php

//------------------------------------------------------------------//
//-------LISTADO DE PROMOSIONES  ACTIVAS- > showPromo.php----------//
//-----------------------------------------------------------------//

require './functions/function.php';


$auth = onlineUser();

$sesion = sesion();
         



//verificamos que exista usuario autenticado de no ser asi redirigir al sitio web

if (!$auth) {
    header('Location: ../index.php');
}


//conexion DB

require 'config/dbconfig.php';

$db = conectarDB();


//seleccionamos el listado de usuarios con relacion de registro en la tabla tipo_usuario

$promos = "SELECT *FROM promosion WHERE publisher = 2";
$SQLPromo = mysqli_query($db, $promos);
/* print_r($SQLPromo);
exit; */



/******************************************/
/*======== ELIMINAR UN REGSITRO===========*/
/******************************************/

//COMPROBANDO LO QUE VIAJA POR EL POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if ($id) {
        //Eliminamos la imagen relacionada con nuestro id recibido por POST
        $queryPromo = "SELECT photo FROM promosion WHERE id = ${id}";
        $resultPromo = mysqli_query($db, $queryPromo);
        $DelPromo = mysqli_fetch_assoc($resultPromo);


        unlink('uploads/Promo/' . $DelPromo['photo']);


        //eliminamos el registro relacionado con el id que recibimos por POST
        $query = "DELETE FROM promosion WHERE id = ${id}";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('location: showPromo.php?registro=3');
            
        }
    }
}


//incluimos las vistas header y menu de nuestros template admin
include 'views/adm_header.php';
include 'views/adm_menu.php';
?>


<!---------------------INICIAMOS EL CONTENIDO DE LA SESION----------------->


<div class="content-wrapper mb-4">

<section class="content">
        <div class="container-fluid">
            
    </div>
        <div class="row">
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <div class="col">
                            <h3 class="titulo card-title font-weight-bold mx-2">PROMOSIONES</h3> <span class="text-danger font-weight-bold">Inactivas</span>
                               </div>
                          
                                        <div class="row d-flex justify-content-end"> 
                                      <div class="row text-nowrap align-items-center">
                                     <div class="col">Nuevo Registro :</div>
                                    <div class="col"><button class="btn btn-success" data-toggle="modal" data-target="#nuevapromo"><i class="fas fa-plus-circle"></i></button></div>
                                   
                                </div>      
                           </div>
                        
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th class="text-center">FOTO</th>
                                    <th>NOMBRE</th>
                                    <th>FECHA</th>
                                    <th class="text-center">USUARIO</th>
                                    <th class="text-center">ACCIONES</th>
                                </tr>
                            </thead>
                          <tbody>

                            <?php while ($promos = mysqli_fetch_assoc($SQLPromo)): ?>
                                    <tr>

                                        <td class="w-2 text-center"><img class="imgsmall" src="uploads/promo/<?php echo $promos['photo']; ?>"></td>

                                            <td class="text-uppercase" ><?php echo $promos['name']; ?></td>

                                               <td class="text-uppercase" ><?php echo $promos['date']; ?></td>

                                       
                                                  <td class="text-uppercase text-center" ><?php echo $promos['user']; ?></td>

                                                  <input type="hidden" name="publisher" value="<?php echo $promos['publisher']; ?>">

                                                  

                                        <td>
                                            <div class="row text-center">
                                                             <div class="col mx-0">
                                                                <!-- EDITAR REGISTRO -->
                                                                <button class="btn btn-warning" data-toggle="modal" data-target="#update<?php echo $promos['id']; ?>"><i class="fas fa-edit"></i></button>                           
                                                              </div>

                                                              <div class="col mx-0">
                                                                   <!-- PUBLISHER UP-DOW -->
                                                                     <form action="updatePublisher.php" method="POST">
                                                                       <input type="hidden" name="id" value="<?php echo $promos['id']; ?>">
                                                                        <button class="btn btn-success"  type="submit"><i class="fas fa-arrow-up"></i></button> 
                                                                    </form>                               
                                                                </div>

                                                                <div class="col mx-0">
                                                                  <!-- ELIMINAR REGISTRO -->
                                                                  <button class="buttondl btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $promos['id']; ?>"><i class="fas fa-trash"></i></button>
                                                               </div>
                                                </div>
                                         </td>
                                            </div> <!-- End Card Body --> 
                                 
                                   <?php  include 'modals/newpromo.php' ?>
                                <?php  include 'modals/deletePromo.php' ?>
                             <?php  include 'modals/updatePromo.php' ?>
                         </div> <!-- End Card -->
                     <?php endwhile; ?>
                </tbody>
                <tfoot>
                     <tr>
                        
                             <th class="text-center">foto</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                <th class="text-center" >Usuario</th>
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
include 'views/adm_footer.php';
?>


