<?php

function onlineUser() :bool {
   
    session_start();  /* hacemos llamado a la funcion session star */

    $auth = $_SESSION['login'];  /* asignamos el campo login a una variable
 */

    if ($auth) {

        return true;  /* validaremos si en la variable global session existe el dato login */
    }

    return false;
}