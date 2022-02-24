
<?php

//Declaramos una funcion con las sentencias para conectarnos a la DataBase

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', '', 'bienes_raices');

    if (!$db) {
        echo "Error al conectar DB";
        exit;
    }

    return $db;
}