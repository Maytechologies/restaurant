

<!-- -------------------------------------------------------
-------------------DASHBOARD ADMINISTRATOR------------------
--------------------------------------------------------- -->
<?php
require './functions/function.php';
/* echo "<pre>";
var_dump($_SERVER);
echo "</pre>"; */
 

$auth = onlineUser();

$inicio = sesion();

//verificamos que exista usuario autenticado de no ser asi redirigir al sitio web

if (!$auth) {
  header('Location: ../login.php');
}
 

  //conexion DB

  require 'config/dbconfig.php';

  $db = conectarDB();

  //SENETENCIA PARA REGISTRAR VISITAS EFECTUADAS A LA PAGINA DAHSBOARD
  date_default_timezone_set("America/Santiago");
  $ip = $_SERVER['REMOTE_ADDR'];
  $sqlconsultar =$db->query("SELECT *FROM visitas WHERE ip = '$ip' ORDER BY id DESC");
  $contarConsultar = $sqlconsultar->num_rows;

  if ($contarConsultar === 0) {
    $SqlInsertar = $db->query("INSERT INTO visitas (ip, fecha) VALUES ('$ip', now())");
      }else {
        $row = $sqlconsultar->fetch_array();
        $fechaRegistro = $row['fecha'];
        $fechaActual = date("Y-m-d H:i:s");
        $nuevaFecha = strtotime($fechaRegistro."+ 10 minutes");
        $nuevaFecha = date("Y-m-d H:i:s", $nuevaFecha);

          if ($fechaActual >= $nuevaFecha) {
            $SqlInsertar = $db->query("INSERT INTO visitas (ip, fecha) VALUES ('$ip', now())");
          }
     }

     $Consulvisitas = $db->query("SELECT *FROM visitas");
     $num_Visitas = $Consulvisitas->num_rows;
     

/* ===================================================================================== */
  

  //sentencia SQL consultar registros de usuarios
  $usuariosDB = "SELECT COUNT(*) FROM usuarios";
  $queryUsers = mysqli_query($db, $usuariosDB);
  $resulUsers = mysqli_fetch_row($queryUsers);
  $Users = $resulUsers['0'];

  //Consulta avanzada a tabla usuarios
  $users = "SELECT u.id, u.user_name, u.email, u.password, u.photo, tp.name_tip_user as perfil, u.tipo_id
            FROM usuarios as u INNER JOIN tipo_usuario as tp ON u.tipo_id = tp.id";
             $queryAllUser = mysqli_query($db, $users);
            /*  $usuarios = mysqli_fetch_assoc($queryAllUser); */


  //Sentencia SQL Consultar registro de Categorias
  $categoriasDB = "SELECT COUNT(*) FROM tipo_producto";
  $queryCategory = mysqli_query($db, $categoriasDB);
  $resulCattegory = mysqli_fetch_row($queryCategory);
  $Categorys = $resulCattegory['0'];


  //Sentencia SQL Consultar Cantidad de registros de Productos
  $ProductosDB = "SELECT COUNT(*) FROM productos";
  $queryProducto = mysqli_query($db, $ProductosDB);
  $resulProducto = mysqli_fetch_row($queryProducto);
  $Products = $resulProducto['0'];

 /*  =========================================================================================== */
  

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
            <div class="col-12 mt-2">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <div class="col mr-auto"><h3 class="card-title">DashBoard Principal</h3></div>
                    </div>
                     <div class="container-fluid">
     
        
                          <div class="row">
                          
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                              <div class="info-box shadow">
                                <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                                
                                    <div class="info-box-content">
                                        <span class="info-box-number">Usuarios</span>
                                        <span class="info-box-text">Registrados</span>
                                    </div><!-- /.info-box-content -->
                                    
                                      <div class="info-box-icon shadow-none">
                                          <div class="inner border-0 pt-4">
                                          <p class="fw-bold"><?php echo $Users;?></p>
                                      </div>
                                    </div>
                              </div>  <!-- /.info-box -->
                            </div><!-- /.col -->
                            
                            <div class="col-md-3 col-sm-6 col-12">
                              <div class="info-box shadow">
                                <span class="info-box-icon bg-danger"><i class="fas fa-box"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-number">Categorias</span>
                                  <span class="info-box-text">de Productos</span>
                                </div>
                                <!-- /.info-box-content -->
                                <div class="info-box-icon shadow-none">
                                      <div class="inner border-0 pt-4">
                                          <p class="fw-bold"><?php echo $Categorys;?></p>
                                      </div>
                                    </div>
                              </div>
                              <!-- /.info-box -->
                            </div>

                           
                            <div class="col-md-3 col-sm-6 col-12">
                              <div class="info-box shadow">
                                <span class="info-box-icon bg-primary"><i class="fas fa-box-open"></i></span>

                                <div class="info-box-content">
                                  <span class="info-box-number">Productos</span>
                                  <span class="info-box-text">Registrados</span>
                                </div> <!-- /.info-box-content -->
                               
                                <div class="info-box-icon shadow-none">
                                      <div class="inner border-0 pt-4">
                                          <p class="fw-bold"><?php echo $Products;?></p>
                                      </div>
                                    </div>
                              </div><!-- /.info-box -->
                            </div> <!-- /.col -->

                            <div class="col-md-3 col-sm-6 col-12">
                              <div class="info-box shadow">
                                <span class="info-box-icon bg-success"><i class="fas fa-gifts"></i></span>

                                <div class="info-box-content">
                                      <span class="info-box-number">Promosiones</span>
                                      <span class="info-box-text">Semanales</span>
                                </div> <!-- /.info-box-content -->
                               
                                <div class="info-box-icon shadow-none">
                                        <div class="inner border-0 pt-4">
                                            <p class="fw-bold">3</p>
                                        </div>
                                </div>
                              </div> <!-- /.info-box -->
                             
                            </div><!-- /.col -->
                          </div> <!-- /.row -->
                        

                          <!-- Small Box (Stat card) -->
                          <h6 class="mb-1 mt-2">Small Box</h6>
                          <div class="row">
                            <div class="col-lg-3 col-6">
                              <!-- small card -->
                              <div class="small-box bg-info">
                                <div class="inner">
                                  <h3>150</h3>

                                  <p>New Orders</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-shopping-cart"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                  More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                              </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                              <!-- small card -->
                              <div class="small-box bg-danger">
                                <div class="inner">
                                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                                  <p>Bounce Rate</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                  More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                              </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                              <!-- small card -->
                              <div class="small-box bg-warning">
                                <div class="inner">
                                  <h3>44</h3>

                                  <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-user-plus"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                  More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                              </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                              <!-- small card -->
                              <div class="small-box bg-success">
                                <div class="inner">
                                  <h3 class="mb-0"><?php echo $num_Visitas;?></h3>
                                  <span class="info-box-number">Acceso</span>
                                  <br>
                                  <span class="info-box-text">al DashBoard</span>
                                </div>
                                <div class="icon">
                                  <i class="fas fa-chart-pie"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                  More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                              </div>
                            </div>
                            <!-- ./col -->
                          </div>
                          <!-- /.row -->

                          <h6 class="mt-2 mb-1">Usuarios Del Sistema</h6>
                          <!-- =========================================================== -->
                         
                          <div class="row">
                          <?php while ($usuariosAll = mysqli_fetch_assoc($queryAllUser)):?>
                            <div class="col-md-3">
                              <!-- Widget: user widget style 1 -->
                              <div class="card card-widget widget-user shadow">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bguser" 
                                style="background: linear-gradient(0deg, rgba(64,193,183,1) 0%, rgba(17,139,142,0.9977124638918067) 19%, rgba(6,18,131,0.9725023798581933) 62%);">
                                  <h4 class="widget-user-desc text-white mb-0"><?php echo $usuariosAll['user_name'];?></h4>
                                  <h6 class="widget-user-username text-white"><?php echo $usuariosAll['perfil'];?></h6>
                                </div>
                                <div class="widget-user-image">
                                  <img class="rounded-circle border-0 shadow" 
                                  src="/admin/uploads/users/<?php echo $usuariosAll['photo'];?>"
                                  style="width: 100px; height: 100px;" alt="User Avatar">
                                </div>
                                <div class="card-footer">
                                  <div class="row">
                                    <div class="col-sm-4 border-right">
                                      <div class="description-block">
                                        <h5 class="description-header">3,200</h5>
                                        <span class="description-text">SALES</span>
                                      </div>
                                      <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                      <div class="description-block">
                                        <h5 class="description-header">13,000</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                      </div>
                                      <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                      <div class="description-block">
                                        <h5 class="description-header">35</h5>
                                        <span class="description-text">PRODUCTS</span>
                                      </div>
                                      <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                  </div>
                                  <!-- /.row -->
                                </div>
                              </div>
                              <!-- /.widget-user -->
                            </div>
                            <?php endwhile; ?>
                            <!-- /.col -->
                          </div><!-- /.row -->
                          

       
                    
             </div> <!-- /.card --> 
         </div> <!-- /.col -->
       </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </section> <!-- /.content -->
</div><!-- /.contenido principal -->



<?php

//CERRAMOS LA CONEXION
 mysqli_close($db);
 include 'views/adm_footer.php';

?>

