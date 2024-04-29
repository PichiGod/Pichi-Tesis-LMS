<?php
require "conexion.php";


if(isset($_POST['action'])){

    if($_POST['action']=="Login"){

        login();

    }


}



function login(){

global $mysqli;

$cedulaLogin= $_POST['cedulaLogin'];

$contrasenaLogin= $_POST['contrasenaLogin'];

if(empty($cedulaLogin) || empty($contrasenaLogin)){

    echo "Rellene todos los campos ";

    exit;
}

$usuarios= mysqli_query($mysqli, "SELECT id_user, nombre_user, apellido_user, contrasena_user,  rol, identificacion_user 
FROM usuario 
WHERE identificacion_user = '$cedulaLogin'
AND contrasena_user= '$contrasenaLogin'");

if (mysqli_num_rows($usuarios)>0){

    $datos= mysqli_fetch_assoc($usuarios);

    $rol= $datos['rol'];

    if($rol==1){

        $_SESSION['Login']=true;

        $_SESSION['id_user']= $datos['id_user'];

       echo "Bienvenido Administrador";

       

    }else{
        
        $_SESSION['Login']=false;

        $_SESSION['id_user']= $datos['id_user'];

        echo "Bienvenido Usuario";

    }

 

}else{


    echo "Campos invalidos";

    exit;

}

}




?>