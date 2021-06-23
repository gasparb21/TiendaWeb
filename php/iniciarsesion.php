<?php
     require "./conexion.php";
     $correo = $_POST["correo"];
     $contrasena = $_POST["contra"];

     $sql = "select * from usuarios where correo_usuario = '$correo' and contra_usuario = '$contrasena'";

     $resultado = $conexion -> query($sql);

    if ($resultado -> num_rows > 0)
    {
        $row = $resultado -> fetch_assoc();
        session_start();
        $_SESSION['correo_usuario'] = $correo;
        $_SESSION['id_usuario'] = $row['id_usuario'];
        header("location: ../index.php");
    }
    else
    {
        echo "<script>
                alert('Usuario o contraseña incorrectos!');
                window.location= 'http://localhost/tiendaweb/login.php'
            </script>";
    }
    $conexion -> close();
?> 