<header class="main-header">
        
    <div class="main-header__title"> <span class="icon-menu fas fa-bars" id="btn-menu"></span> <h1> DrumWorkshop</h1></div>        
    <nav class="main-nav" id="main-nav">
        <ul class="menu">
            <li class="menu__item"><a href="./index.php" class="menu__link">HOME</a></li>
            <li class="menu__item"><a href="./hardware.php" class="menu__link">HARDWARE</a></li>
            <li class="menu__item"><a href="./artists.php" class="menu__link">ARTISTS</a></li>
            <li class="menu__item"><a href="./drums.php" class="menu__link">DRUMSETS</a></li>
            <li class="menu__item"><a href="" class="menu__link">ABOUT US</a></li>

        </ul>
    </nav>
    

    <div class="main-header__txt">
        <span>Need help?</span>
        <p><i class="fas fa-phone"></i> Call 8712555623</p>
    </div>
    <div class="main-header__container">
        

        <?php
            include_once './php/sesionusuario.php'; 
            $userSession = new UserSession();
            if (isset($_SESSION["id_usuario"])) {
                echo "<a href='./php/cerrarsesion.php'>Cerrar sesión</a>";
            }
            else {
                echo "<a href='./login.php'><i class='far fa-user'></i></a>";
            }
        ?>

        <a href="./carrito.php" class="main-header__btn">My cart <i class="fas fa-shopping-cart"></i></a>
        <form action="">
            <input type="search" class="main-header__input" placeholder="Buscar productos">
            <button class="main-header__btn">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    
    <script src="js/menu.js"></script>
</header>