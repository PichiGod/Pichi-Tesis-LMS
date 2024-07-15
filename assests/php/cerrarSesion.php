<?php
//Santiago es gay
require "conexion.php";
require "LoginBD.php";

if (isset($_SESSION['id_user'])) {
    $usuario = $_SESSION['id_user'];

    // Verificar si el id_user está presente en usuariosala
    $consulta = mysqli_query($mysqli, "SELECT id_user FROM usuariosala WHERE id_user = '$usuario'");
    
    if (mysqli_num_rows($consulta) > 0) {
        // Si hay un registro en usuariosala, eliminarlo
        $destruirSesion = mysqli_query($mysqli, "DELETE FROM usuariosala WHERE id_user = '$usuario'");
    }

    if(isset($_SESSION['id_user'])){

        $usuario= $_SESSION['id_user'];
    
        $destruirSesion= mysqli_query($mysqli, "UPDATE usuario SET Active_online = '0' WHERE id_user = '$usuario'");
    
        $_SESSION= [];
    }
    
    // Limpiar y destruir la sesión
    $_SESSION = [];
    session_unset();
    session_destroy();

    // Redirigir al usuario al inicio
    header("location: ../../index.php");
    //header("location: https://pichi.up.railway.app/");
    exit; // Asegura que el script se detenga después de redirigir
}
?>