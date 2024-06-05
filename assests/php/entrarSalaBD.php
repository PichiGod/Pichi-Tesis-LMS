<?php
require "conexion.php";

$idUser = $_SESSION['id_user'];
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
    echo "Ya estás en el curso";
    exit;
}

$insertarUsuario = "INSERT INTO usuariosala (id_user, id_sala, id_curso) VALUES ('$idUser', '$id_Sala', '$idCurso')";

if (mysqli_query($mysqli, $insertarUsuario)) {
    $_SESSION['id_cursoSesion'] = $idCurso; // Almacenar información del curso en la sesión
    $nombreUsuario = $_SESSION['nombre_user']; // Suponiendo que tienes el nombre del usuario en la sesión
    echo "¡Usuario Insertado Correctamente! $nombreUsuario ha entrado a la sala.";
} else {
    echo "Error al insertar usuario: " . mysqli_error($mysqli);
}
?>
