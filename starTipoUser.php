<?php

//creamos conexion a db
include './admin/config/dbconfig.php';
$db = conectarDB();


//creamos tipo de usuario root

$id_tipo_user = '1' ;

$tipo_user_name = 'root';


// creamos la consulta SQL la cual creara la sentencia SQL Insert

$inser_tipo = "INSERT INTO tipo_usuario (id_tipo_user, type_user_name) VALUE ('${id_tipo_user}', '${tipo_user_name}')";

//Ejecutamos la sentencia SQL

mysqli_query($db, $inser_tipo);