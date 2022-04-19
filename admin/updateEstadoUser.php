<?php

require 'config/dbconfig.php';

$db = conectarDB();


if($_SERVER['REQUEST_METHOD']=='POST'){

    $id = $_POST['id'];
    $consulUser = "SELECT *FROM usuarios WHERE id= ${id}";
      $QueryUser = mysqli_query($db, $consulUser);
        $usuariosDB = mysqli_fetch_assoc($QueryUser);

}

$status = mysqli_real_query($db, $usuariosDB['status']);


  /********************************************************/
  //SENTENCIA SQL PARA APLICAR UN UPDATE AL CAMPO ESTADO_ID
  /*******************************************************/

  $SQLUpdate = "UPDATE usuarios SET status = 2 WHERE id = ${id}";
  $QueryUpdate = mysqli_query($db, $SQLUpdate);

  if ($QueryUpdate) {
      header('location: showUsers.php?registro=2');
  }else{
      header('location: showUsers.php?error=4');
  }