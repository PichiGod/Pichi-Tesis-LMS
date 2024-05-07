<?php

require "conexion.php";

require "LoginBD.php";

if(isset($_SESSION['id_user'])){

    $usuario= $_SESSION['id_user'];

    $destruirSesion= mysqli_query($mysqli, "UPDATE usuario SET Active_online = '0' WHERE id_user = '$usuario'");

    $_SESSION= [];

    session_unset();

    session_destroy();

    header("location: ../../index.html");


}



?>