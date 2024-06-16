<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] === "Register") {
    Register();
}

function Register() {
    global $mysqli;

    // Obtener datos del formulario
    $nombreUsuario = $_POST['nombreUsuario'];
    $apellidoUsuario = $_POST['apellidoUsuario'];
    $correoUsuario = $_POST['correoUsuario'];
    $rifUsuario = $_POST['rifUsuario'];
    $direccionUsuario = $_POST['direccionUsuario'];
    $contrasenaUsuario = $_POST['contrasenaUsuario'];
    $GeneroUsuario = $_POST['GeneroUsuario'];
    $Empresa = $_POST['Empresa'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $telefonoUsuario = $_POST['telefonoUsuario'];
    $rbRol = $_POST['rbRol'];
    // $respuestaRol;

    if($rbRol == "Estudiante"){

        $respuestaRol = 0;
    
    }else{

        $respuestaRol = 1;
    }

    // Validar que no haya campos vacíos
    if (empty($nombreUsuario) || empty($apellidoUsuario) || empty($correoUsuario) || empty($rifUsuario) || empty($contrasenaUsuario) 
        || empty($GeneroUsuario) || empty($fechaNacimiento) || empty($telefonoUsuario) || empty($direccionUsuario)) {
        echo "Rellene todos los campos para completar el registro";
        exit;
    }

    // Convertir fecha de nacimiento al formato de la base de datos (YYYY-MM-DD)
    $fechaNacimientoBD = date('Y-m-d', strtotime(str_replace('/', '-', $fechaNacimiento)));

    // Verificar si el usuario ya existe por su RIF
    $result = mysqli_query($mysqli, "SELECT id_user FROM usuario WHERE identificacion_user = '$rifUsuario'");
    if (mysqli_num_rows($result) > 0) {
        echo "El usuario ya está registrado en el sistema, por lo que no se puede continuar con la operación";
        exit;
    }



    // Consultar el id_empresa correspondiente al nombre_empresa seleccionado
    $queryEmpresa = "SELECT id_empresa FROM empresa WHERE nombre_empresa = '$Empresa'";
    $resultEmpresa = mysqli_query($mysqli, $queryEmpresa);

    if (!$resultEmpresa) {
        echo "Error al consultar la empresa";
        exit;
    }

    // Obtener el id_empresa
    $idEmpresa = null;
    if (mysqli_num_rows($resultEmpresa) > 0) {
        $rowEmpresa = mysqli_fetch_assoc($resultEmpresa);
        $idEmpresa = $rowEmpresa['id_empresa'];
    } else {
        echo "No se encontró la empresa especificada";
        exit;
    }

    // Insertar nuevo usuario con el id_empresa correspondiente
    $query = "INSERT INTO usuario (identificacion_user, nombre_user, apellido_user, correo_user, contrasena_user, direccion_user, numero_user, fecha_nacimiento_user, sexo_user, Empresa_id_empresa, rol ) 
              VALUES ('$rifUsuario', '$nombreUsuario', '$apellidoUsuario', '$correoUsuario', '$contrasenaUsuario', '$direccionUsuario', '$telefonoUsuario', '$fechaNacimientoBD', '$GeneroUsuario', '$idEmpresa', '$rbRol')";

    if (mysqli_query($mysqli, $query)) {
        echo "Se ha registrado el Usuario en el sistema";
    } else {
        echo "Error al registrar el usuario: " . mysqli_error($mysqli);
    }
}
?>
