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

$empresa = $_POST['empresa'];

if(empty($cedulaLogin) || empty($contrasenaLogin)){

    echo "Rellene todos los campos ";

    exit;
}

$usuarios= mysqli_query($mysqli, "SELECT id_user, nombre_user, apellido_user, contrasena_user,  rol, identificacion_user, Empresa_id_empresa 
FROM usuario 
WHERE identificacion_user = '$cedulaLogin'
AND contrasena_user= '$contrasenaLogin'
AND Empresa_id_empresa = '$empresa'");

if (mysqli_num_rows($usuarios)>0){

    $datos= mysqli_fetch_assoc($usuarios);

    $rol= $datos['rol'];

    $Empresa= $datos['Empresa_id_empresa'];

    $usuariosOnline= $datos['id_user'];

    $CambiarEstatus=  mysqli_query($mysqli, "UPDATE usuario SET Active_online = '1' WHERE id_user = '$usuariosOnline'");

    $usuariosActivos= mysqli_query($mysqli, "SELECT Active_online FROM usuario WHERE Empresa_id_empresa = '$Empresa' AND Active_online = '1'");

    if (mysqli_num_rows($usuariosActivos)>0){


         $_SESSION['usuariosActive'] = mysqli_num_rows($usuariosActivos);


    }



    if($rol==2){

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