<?php
    require "./conexion.php";
    include_once './sesionusuario.php';
    $userSession = new UserSession();

    if (isset($_SESSION["id_usuario"]))
    {
        $idProducto = $_GET["id_producto"];
        $idUsuario = $_GET["id_usuario"];
        $idSession = session_id();

        $sql = "SELECT * FROM carrito WHERE id_producto = '$idProducto' AND id_sesion != 'compra_realizada'";
        $resultado = $conexion -> query($sql);
        if ($resultado -> num_rows == 0)
        {
            $sql = "INSERT INTO carrito (id_carrito, id_usuario, id_producto, id_sesion, cantidad_c, precio_unitario, precio_total) VALUES ('', '$idUsuario', '$idProducto', '$idSession', '1', (SELECT precio_P FROM productos WHERE id_producto = '$idProducto'), (SELECT precio_P FROM productos WHERE id_producto = '$idProducto'))";
            if (mysqli_query($conexion, $sql))
            {
               header("location: ../carrito.php");
            }
        }
        else
        {
            $sql = "UPDATE carrito SET cantidad_c = (cantidad_c + 1), precio_total = (precio_unitario * cantidad_c) WHERE id_producto = '$idProducto'";
            if (mysqli_query($conexion, $sql))
            {
                header("location: ../carrito.php");
            }
        }
    }
    else
    {
        echo "
            <script>
                alert('Debes estar registrado para añadir productos al carrito');
                window.location= 'http://localhost/tiendaweb/login.php'
            </script>
        ";
    }
?>