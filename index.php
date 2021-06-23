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

        <div class="container-slider">
            <div class="slider" id="slider">
                <div class="slider__section">
                    <img src="https://i.ibb.co/wgQXpkh/img2.jpg" alt="" class="slider__img">
                    <div class="slider__content">
                        <h2 class="slider__title">NEW Dave Grohl signature snare drum</h2>
                        <p class="slider__txt">Check the legendary sound</p>
                        <a href="" class="btn btn-info slider__link">SEE MORE</a>
                    </div>
                </div>
                <div class="slider__section">
                    <img src="https://i.ibb.co/tYwNN6F/img3.jpg" alt="" class="slider__img">
                    <div class="slider__content">
                        <h2 class="slider__title">New finishes arriving</h2>
                        <p class="slider__txt">Check the new colors and finishes</p>
                        <a href="" class="btn btn-info slider__link">CHECK OUT</a>
                    </div>
                </div>
                <div class="slider__section">
                    <img src="https://i.ibb.co/xJRmtbj/img4.jpg" alt="" class="slider__img">
                    <div class="slider__content">
                        <h2 class="slider__title">Gold hardware 9000 series</h2>
                        <p class="slider__txt">Your favorite hardware now in gold</p>
                        <a href="./hardware.php" class="btn btn-info slider__link">SEE NOW</a>
                    </div>
                </div>
                <div class="slider__section">
                    <img src="https://i.ibb.co/gdHFQfw/img5.jpg" alt="" class="slider__img">
                    <div class="slider__content">
                        <h2 class="slider__title">Collector's series</h2>
                        <p class="slider__txt">Perfect combination, perfect sound</p>
                        <a href="./drums.php" class="btn btn-info slider__link">SHOP NOW</a>
                    </div>
                </div>
            </div>
                <div class="slider__btn slider__btn--right" id="btn-right">&#62</div>
                <div class="slider__btn slider__btn--left" id="btn-left">&#60</div>
        </div>
        <main class="main">
            <h2 class="main-title" >New on DW</h2>
            
        <section class="container-productos">

            <?php
                require "./php/conexion.php";
                $sql = "select * from productos where id_producto BETWEEN ((SELECT MAX(id_producto) FROM productos) - 7) AND (SELECT MAX(id_producto) FROM productos) ORDER BY id_producto DESC";
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
                            <div class='producto'>
                                <img src='$imagen' class='img-producto' alt=''>
                                <div class='descripcion-prod'>
                                    <h3 class='titulo-prod'>$descripcion</h3>
                                    <span class='precio-prod'>$$precio</span>
                                </div>
                                <a href='./php/agregaracarrito.php?id_producto=$id_producto&id_usuario=$id_usuario' class=''><i class='icono-producto fas fa-cart-plus'></i></a> 
                            </div>
                                ";
                        }
                        else{
                            echo "
                            <div class='producto'>
                                <img src='$imagen' class='img-producto' alt=''>
                                <div class='descripcion-prod'>
                                    <h3 class='titulo-prod'>$descripcion</h3>
                                    <span class='precio-prod'>$$precio</span>
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
        
        
        <script src="js/slider.js"></script>
    </body>
</html>
