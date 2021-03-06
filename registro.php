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
    <body class="body-reg">
    <header class="main-header">
        
        <div class="main-header__title"> <span class="icon-menu fas fa-bars" id="btn-menu"></span> <h1> DrumWorkshop</h1></div>        
        <nav class="main-nav" id="main-nav">
            <ul class="menu">
                <li class="menu__item"><a href="./index.php" class="menu__link">HOME</a></li>
                <li class="menu__item"><a href="./hardware.php" class="menu__link">HARDWARE</a></li>
                <li class="menu__item"><a href="./artists.php" class="menu__link">ARTISTS</a></li>
                <li class="menu__item"><a href="./drums.php" class="menu__link">DRUMS</a></li>
                <li class="menu__item"><a href="" class="menu__link">ABOUT US</a></li>

            </ul>
        </nav>
    </header>
            
        <form class="formulario" action="./php/registrarusuario.php" method="post">

            <h1>Registrate</h1>
            <div class="container-reg">

                <div class="input-container">
                    <i class="fas fa-user icon"></i>
                    <input type="text" placeholder="Nombre completo" name="nombre" required>

                </div>

                <div class="input-container">
                    <i class="fas fa-envelope icon"></i>
                    <input type="email" placeholder="Correo electronico" name="correo" required>
                    
                </div>

                <div class="input-container">
                    <i class="fas fa-key icon"></i>
                    <input type="password" placeholder="Contrase??a" name="contra" required>
                    
                </div>

                <input type="submit" value="Registrarte" class="btn-reg">
                <p>??Ya tienes una cuenta?<a href="login.php" class="reg-link"> Iniciar sesi??n</a></p>

            </div>
        </form>

        <script src="js/menu.js"></script>
    </body>
</head>