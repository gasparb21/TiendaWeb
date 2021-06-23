<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TiendaWeb</title>
    <meta name="viewport" content="width=device-
    width, user-sclaelabel=no, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="Img/imgicon.jpg">
</head>
    <body>
    <table class="table table-bordered text-center">
            <tbody>
                <tr>
                    <th scope="row">Nombre:</th>
                    <td>
                        <?php
                            require "../php/conexion.php";
                            require_once '../php/sesionusuario.php';
                            $userSession = new UserSession();
                            $idUsuario = $_SESSION["id_usuario"];
                            
                            $sql = "SELECT nombre_usuario FROM usuarios WHERE id_usuario = '$idUsuario'";
                            $resultado = $conexion -> query($sql);
                            if ($resultado -> num_rows > 0)
                            {
                                while ($row = $resultado -> fetch_assoc())
                                {
                                    $nombre = $row["nombre_usuario"];
                                    
                                    
                                    echo "$nombre";
                                }
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Fecha de compra:</th>
                    <td>
                        <?php
                            date_default_timezone_set('Mexico/General');
                            $fechaCompra = date('l jS \of F Y h:i:s A');
                            echo $fechaCompra;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">ID Compra:</th>
                    <td>
                        <?php
                            $idCompra = hash("md5", "$idUsuario:$fechaCompra");
                            echo "$idCompra";
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

                <h2 class="main-title" >Carrito de compra</h2>

                        <div id="carrito" class="cont-carrito" >
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php
                                        require "../php/conexion.php";
                                        $subtotal = 0;

                                        if (isset($_SESSION["id_usuario"]))
                                        {
                                            $idUsuario = $_SESSION["id_usuario"];
                                            $idSession = session_id();
                                            
                                            $sql = "SELECT * FROM carrito WHERE id_sesion = '$idSession'";
                                            $resultado = $conexion -> query($sql);
                                            $i = 1;                        
                                                        
                                            if ($resultado -> num_rows > 0)
                                            {                            
                                                while ($row = $resultado -> fetch_assoc())
                                                {
                                                    $cantidad = $row["cantidad_c"];
                                                    $precioTotal = $row["precio_total"];
                                                    $idProducto = $row["id_producto"];
                                                    $sql2 = "SELECT * FROM productos WHERE id_producto = '$idProducto'";
                                                    $resultado2 = $conexion -> query($sql2);

                                                    if ($resultado2 -> num_rows > 0)
                                                    {
                                                        while ($row2 = $resultado2 -> fetch_assoc())
                                                        {
                                                            $itemId = $row2["id_producto"];
                                                            $imagen = $row2["imagen_P"];
                                                            $descripcion = $row2["descripcion_P"];
                                                            $precioUnit = $row2["precio_P"];
                                                            $formattedUnitPrice = number_format($precioUnit, 2, '.', ',');
                                                            $formattedTotalPrice = number_format($precioTotal, 2, '.', ',');
                                                            echo "
                                                                <tr>

                                                                    <th><p class='text-cart'>$descripcion</p></th>
                                                                    <th>
                                                                        <p>
                                                                            $cantidad
                                                                        </p>
                                                                    </th>
                                                                    <th><p class='text-cart' id='unit$i'>$$formattedUnitPrice</p></th>
                                                                    <th><p class='text-cart' id='total$i'>$$formattedTotalPrice</p></th>
                                                                </tr>
                                                            ";
                                                            
                                                            $subtotal += $precioTotal;
                                                            $i++;
                                                        }
                                                    }                                
                                                }
                                            }
                                        }         
                                        
                                        
                                    ?>

                                </tbody>
                               
                                <tr>
                                    <th colspan="4" scope="col" class="text-right">TOTAL : $<?php echo "$subtotal" ?></th>
                                    <th scope="col">
                                        <input id="total" name="monto" class="font-weight-bold border-0" readonly style="background-color: white;"></input>
                                    </th>
                                    <!-- <th scope="col"></th> -->
                                </tr>

                            </table>
                        </div>

                            <?php
                                $sql = "UPDATE productos SET stock = (stock - $cantidad) WHERE id_producto = '$itemId'";
                                mysqli_query($conexion, $sql);
                            ?>

                            <?php
                                $idSession = session_id();
                                $fecha = date('Y-m-d H:i:s', time());
                                $sql2 = "INSERT INTO compra (id_compra, fecha, total_compra, id_usuario) VALUES ('$idCompra', '$fecha', '$subtotal', '$idUsuario')";
                                if (mysqli_query($conexion, $sql2))
                                {
                                    $sql3 = "UPDATE carrito SET id_sesion = 'compra_realizada' WHERE id_sesion = '$idSession'";
                                    mysqli_query($conexion, $sql3);
                                }
                            ?>

        
    </body>
</html>