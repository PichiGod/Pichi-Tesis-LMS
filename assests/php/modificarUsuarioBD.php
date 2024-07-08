<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] === "modificarUsuario") {
    modificarUsuario($mysqli);
}

function modificarUsuario($mysqli) {

    // Obtener datos del formulario
    $nombreUsuario = $_POST['nombre'];
    $apellidoUsuario = $_POST['apellido'];
    $correoUsuario = $_POST['correo'];
    $rifUsuario = $_POST['cedula'];
    $direccionUsuario = $_POST['direccion'];
    $contrasenaUsuario = $_POST['contrasena'];
    $GeneroUsuario = $_POST['genero'];
    $fechaNacimiento = $_POST['fechaNac'];
    $telefonoUsuario = $_POST['telf'];
    $rol = $_POST['rol'];
    $idUsuario = $_POST['id'];

    // Validar que no haya campos vacíos
    if (empty($nombreUsuario) || empty($apellidoUsuario) || empty($correoUsuario) || empty($rifUsuario) || empty($contrasenaUsuario) 
        || empty($GeneroUsuario) || empty($fechaNacimiento) || empty($telefonoUsuario) || empty($direccionUsuario)) {
        echo "Rellene todos los campos para completar el registro";
        exit;
    }

    // Convertir fecha de nacimiento al formato de la base de datos (YYYY-MM-DD)
    $fechaNacimientoBD = date('Y-m-d', strtotime(str_replace('/', '-', $fechaNacimiento)));

    // Preparar consulta SQL con la nueva actividad
    $sql = "UPDATE usuario
            SET identificacion_user  = ?, nombre_user = ?, apellido_user = ?, correo_user = ?, contrasena_user = ?, direccion_user = ?, numero_user = ?, fecha_nacimiento_user = ?, sexo_user = ?, rol = ?
            WHERE id_user = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssssssssii", $rifUsuario, $nombreUsuario, $apellidoUsuario, $correoUsuario, $contrasenaUsuario, $direccionUsuario, $telefonoUsuario, $fechaNacimientoBD, $GeneroUsuario, $rol, $idUsuario);

    if ($stmt->execute()) {
        echo "Usuario Modificado Correctamente";
    } else {
        echo "Hubo un error al enviar el mensaje: " . $mysqli->error;
    }

    $stmt->close();
}
?>
