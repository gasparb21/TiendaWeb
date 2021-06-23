<?php
    include_once './sesionusuario.php';

    $userSession = new UserSession();
    $userSession -> closeSession();

    header("location: ../login.php");
?>