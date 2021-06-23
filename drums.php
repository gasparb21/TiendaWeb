<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <title>TiendaWeb</title>
    <meta name="viewport" content="width=device-
    width, user-sclaelabel=no, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mate+SC&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="Img/imgicon.jpg">

</head>
    <body>
        
            <?php
                include "./php/header.php";
            ?>

            <main class="main">
                <h2 class="main-title" >Drumsets</h2>

            <section class="container-drums">

            <?php
                require "./php/conexion.php";
                $sql = "select * from productos where categoria_P='drums'";
                $resultado = $conexion -> query($sql);

                if($resultado -> num_rows > 0)
                {
                    while ($row = $resultado -> fetch_assoc())
                    {
                        $id_producto = $row["id_producto"];
                        $descripcion = $row["descripcion_P"];
                        $imagen = $row["imagen_P"];
                        $precio = $row["precio_P"];
                        
                        if(isset($_SESSION['id_usuario'])){
                            $id_usuario = $_SESSION['id_usuario'];
                            echo "
                            <div class='producto-drums'>
                                <img src='$imagen' class='imagen-drums' alt=''>
                                <div class='descripcion-drums'>
                                    <h3 class='titulo-drums'>$descripcion</h3>
                                    <span class='precio-drums'>$$precio</span>
                                </div>
                                <a href='./php/agregaracarrito.php?id_producto=$id_producto&id_usuario=$id_usuario' class=''><i class='icono-producto fas fa-cart-plus'></i></a> 
                            </div>
                                ";
                        }
                        else{
                            echo "
                            <div class='producto-drums'>
                                <img src='$imagen' class='imagen-drums' alt=''>
                                <div class='descripcion-drums'>
                                    <h3 class='titulo-drums'>$descripcion</h3>
                                    <span class='precio-drums'>$$precio</span>
                                </div>
                                <a href='./login.php' class=''><i class='icono-producto fas fa-cart-plus'></i></a> 
                            </div>
                                ";
                        }
                    }
                }
            ?>



        
        </section>
    
    </main>
        
    </body>
</html>
