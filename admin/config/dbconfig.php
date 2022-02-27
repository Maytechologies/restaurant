
<?php

//Declaramos una funcion con las sentencias para conectarnos a la DataBase

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', '', 'restaurant_card');

    if (!$db) {
        echo "Error al conectar DB";
        exit;
    }

    return $db;
}