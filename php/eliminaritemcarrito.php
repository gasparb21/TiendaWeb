<?php
    require "./conexion.php";

    $itemId = $_GET["itemId"];

    $sql = "DELETE FROM carrito WHERE id_producto = '$itemId'";

    if ($consulta = mysqli_query($conexion, $sql))
    {
        header('Location:' . getenv('HTTP_REFERER'));
    }
?>