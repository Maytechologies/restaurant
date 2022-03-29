<?php

//creamos conexion a db
include './admin/config/dbconfig.php';
$db = conectarDB();


//creamos tipo de usuario root

$id = '1' ;

$tipo_user_name = 'root';


// creamos la consulta SQL la cual creara la sentencia SQL Insert

$inser_tipo = "INSERT INTO tipo_usuario (id, name_tip_user) VALUE ('${id}', '${tipo_user_name}')";

//Ejecutamos la sentencia SQL

mysqli_query($db, $inser_tipo);