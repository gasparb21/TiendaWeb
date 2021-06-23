<?php
    require "./conexion.php";

    $idProducto = $_GET["idProducto"];

    $sql = "UPDATE carrito SET cantidad_c = (cantidad_c + 1), precio_total = (precio_unitario * cantidad_c) WHERE id_producto = '$idProducto'";
    if (mysqli_query($conexion, $sql))
    {
        header("location: ../carrito.php");
    }
?>