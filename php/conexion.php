<?php
    $dbhost = "localhost";
    $dbname = "tiendaweb";
    $dbuser = "root";
    $dbpass = "";
    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(mysqli_connect_errno()){
        printf("Conexión fallida: %s/n", mysqli_connect_errno());
        exit();
    }
?>