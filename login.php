<?php
 include 'admin/config/dbconfig.php';

 $db = conectarDB();


     $datos = "SELECT *FROM datos";
      $query_datos = mysqli_query($db, $datos);
        $SQL_datos = mysqli_fetch_assoc($query_datos);
        /* var_dump($SQL_datos); */

      

 //chequear datos enviados por el POST

 $errores = [];



 if ($_SERVER['REQUEST_METHOD']==='POST') {
     
    
        
         
    //Sanetizamos los datos recibidos mediante POST

    $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //si no se recibe email o password

     if (!$email) {
        
        echo "<stript>alert('El Email es necesario o Esta incorrecto')
        window.location='login.php'</script>";
    }

    if (!$password) {
       
        
        echo "<script>alert('El Password es necesario o Esta incorrecto')
        window.location='login.php'</script>";
    } 
    
    if (empty($errores)){ //si no existen errores entonces 

        //verificamos que exista el usuario en la db

        $query = "SELECT *FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);

        
    

        if ($resultado->num_rows) {
        
            $usuario = mysqli_fetch_assoc($resultado);

            $auth = password_verify($password, $usuario['password']);

            if ($auth) {

                echo "<script>alert('Inicio de Sesion correcto')
                window.location='admin/index.php'</script>";

                session_start();

                $_SESSION['user'] = $usuario['user_name'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['photo'] = $usuario['photo'];
                $_SESSION['tipo_id'] = $usuario['tipo_id'];
                $_SESSION['login'] = true;

                
                
            }else {
                echo "<script>alert('El Password no existe!')
                window.location='login.php'</script>";
            }
           

        } else {
            echo "<script>alert('El Usuario ingresado NO EXISTE..!')
            window.location='login.php'</script>";

           
        }
        




    }

  }

?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login | <?php  echo $SQL_datos['name_data'];?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<!--   plugin Sweealert2 -->
<link rel="stylesheet" href="admin/plugins/sweetalert2/sweetalert2.min.css">


<div class="login-box shadow">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="/admin/uploads/datos/<?php  echo $SQL_datos['logo_data'];?>" style="width: 150px;" alt="">
      <a href="../../index2.html" class="h4 mx-1"><b>Empresa</b><?php  echo $SQL_datos['name_data'];?></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingresa Datos para iniciar Sesi??n</p>

      <form method="POST">
        <div class="input-group mb-3">
        <input type="hidden" class="form-control" id="email" name="user_name">
          <input type="hidden" class="form-control" id="email" name="photo">
          <input type="hidden" class="form-control" id="email" name="tipo_id">
          <input type="email" class="form-control" placeholder="Email" id="email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div> 
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-4">
          <a href="index.php" class="btn btn-danger btn-block">Cerrar</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->



<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin//dist/js/demo.js"></script>
<script src="admin/plugins/sweetalert2/sweetalert2.all.min.js" ></script>
</body>
</html>
