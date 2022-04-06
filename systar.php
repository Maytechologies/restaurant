<?php 

//creamos conexion a db
include './admin/config/dbconfig.php';
$db = conectarDB();


//creamos datos en variables 
$user_name = 'Marco A. Yanez';

$email = 'staroffic@gmail.com';

$password = 'admin1321';

$passwordHash = password_hash($password, PASSWORD_BCRYPT); //encriptamos el password

$tipo_id = '1';

$photo = 'user.jpg';


//creamos la consulta SQL la cual creara el Usuario master
$insert = "INSERT INTO usuarios (user_name, email, password, photo, tipo_id) VALUE ('${user_name}', '${email}', '${passwordHash}', '${photo}', '${tipo_id}')";


//Ejecutamos la  conexion a DB y consulta SQL con los datos en variables
mysqli_query($db, $insert);



?>