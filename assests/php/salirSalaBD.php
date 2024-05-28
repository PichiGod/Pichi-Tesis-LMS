<?php
require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user']) && isset($_SESSION['id_cursoSesion'])) {
    $idUser = $_SESSION['id_user'];
    $idCurso = $_SESSION['id_cursoSesion'];

    $eliminarUsuario = "DELETE FROM usuariosala WHERE id_user = '$idUser' AND id_curso = '$idCurso'";

    if (mysqli_query($mysqli, $eliminarUsuario)) {
        echo "¡Usuario eliminado correctamente!";
    } else {
        echo "Error al eliminar usuario: " . mysqli_error($mysqli);
    }
} else {
    echo "Usuario no encontrado en la sesión";
}
?>

