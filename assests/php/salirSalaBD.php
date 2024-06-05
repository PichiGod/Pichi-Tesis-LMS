<?php
// Requerir el archivo de conexión a la base de datos
require "conexion.php";

// Verificar si se recibió el ID del usuario
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    // Eliminar al usuario de la tabla 'usuariosala'
    $query = "DELETE FROM usuariosala WHERE id_user = '$id_user'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        // Si la eliminación fue exitosa, devolver un mensaje de éxito
        echo 'Usuario eliminado de la sala exitosamente.';
    } else {
        // Si ocurrió un error durante la eliminación, devolver un mensaje de error
        echo 'Error al eliminar al usuario de la sala.';
    }
} else {
    // Si no se recibió el ID del usuario, devolver un mensaje de error
    echo 'No se recibió el ID del usuario.';
}
?>


