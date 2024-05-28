<?php
require "conexion.php";


$idUser = $_SESSION['id_user']; // Reutilizamos la variable de sesión existente
$idCurso = mysqli_real_escape_string($mysqli, $_POST['idCurso']);

if (empty($idCurso) || empty($idUser)) {
    echo "Los campos del usuario no se encuentran";
    exit;
}

$verificarCurso = mysqli_query($mysqli, "SELECT * FROM sala WHERE id_curso = '$idCurso'");

if (mysqli_num_rows($verificarCurso) == 0) {
    echo "No hay un chat disponible para este curso";
    exit;
}

$datos = mysqli_fetch_assoc($verificarCurso);
$nombre_curso = $datos['nombre_sala'];
$id_Sala = $datos['id_sala'];

$verificarUsuario = mysqli_query($mysqli, "SELECT id_user FROM usuariosala WHERE id_curso = '$idCurso' AND id_user = '$idUser'");

if (mysqli_num_rows($verificarUsuario) > 0) {
    echo "El usuario tiene una sesión abierta de este chat, intente entrar más tarde";
    exit;
}

$insertarUsuario = "INSERT INTO usuariosala (id_user, id_sala, id_curso) VALUES ('$idUser', '$id_Sala', '$idCurso')";

if (mysqli_query($mysqli, $insertarUsuario)) {
    $_SESSION['id_cursoSesion'] = $idCurso; // Almacenar información del curso en la sesión
    echo "¡Usuario Insertado Correctamente!"; // Mensaje de éxito
} else {
    echo "Error al insertar usuario: " . mysqli_error($mysqli);
}
?>
