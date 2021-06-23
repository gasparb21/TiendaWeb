<?php
    require "./conexion.php";

    $idProducto = $_GET["idProducto"];

    $sql = "UPDATE carrito SET cantidad_c = (cantidad_c - 1), precio_total = (precio_unitario * cantidad_c) WHERE id_producto = '$idProducto'";
    if (mysqli_query($conexion, $sql))
    {
        $sql = "SELECT * FROM carrito WHERE id_producto = '$idProducto'";
        $resultado = $conexion -> query($sql);
        if ($resultado -> num_rows > 0)
        {
            while ($row = $resultado -> fetch_assoc())
            {
                $cantidadProd = $row["cantidad_c"];
                if ($cantidadProd == 0)
                {
                    $sql = "DELETE FROM carrito WHERE id_producto = '$idProducto'";

                    if ($consulta = mysqli_query($conexion, $sql))
                    {
                        header("location: ../carrito.php");
                    }
                }
                else
                {
                    header("location: ../carrito.php");
                }
            }
        }
    }
?>