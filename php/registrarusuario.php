<?php
   require "./conexion.php";
   $nombre = $_POST["nombre"];
   $correo = $_POST["correo"];
   $contrasena = $_POST["contra"];

   $sql = "insert into usuarios (id_usuario, nombre_usuario, correo_usuario, contra_usuario) values ('', '$nombre', '$correo', '$contrasena')";
   
   if(strlen($contrasena)>=8){
        if (mysqli_query($conexion, $sql))
        {
            echo "<script>
                    alert('Usuario registrado con éxito, ahora puede iniciar sesión.');
                    window.location= 'http://localhost/tiendaweb/login.php'
                </script>";
        }
        else 
        {
            echo "<script>
                    alert('Ocurrió un error');
                    window.location= 'http://localhost/tiendaweb/registro.php'
                </script>";
        }
   }
   else{
    echo "<script>
            alert('La contraseña debe tener al menos 8 caracteres');
            window.location= 'http://localhost/tiendaweb/registro.php'
        </script>";
   }
?>