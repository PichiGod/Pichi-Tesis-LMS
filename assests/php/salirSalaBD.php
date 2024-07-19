<?php
// Requerir el archivo de conexión a la base de datos
require "conexion.php";

// Verificar si se recibió el ID del usuario
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    // Eliminar al usuario de la tabla 'usuariosala'

    $consulta = mysqli_query($mysqli, "SELECT id_curso FROM usuariosala WHERE id_user = '$id_user'");

    if (mysqli_num_rows($consulta) > 0){

        $datos= mysqli_fetch_assoc($consulta);

        $curso= $datos['id_curso'];
        $consulta2 = mysqli_query($mysqli, "SELECT id_sala FROM usuariosala WHERE id_curso = '$curso'");

        if (mysqli_num_rows($consulta2) == 1){
            $datos2= mysqli_fetch_assoc($consulta2);
            $sala= $datos2['id_sala'];
            $destruirSesion = mysqli_query($mysqli, "DELETE FROM mensaje WHERE id_sala = '$sala'");
        }

    $query = "DELETE FROM usuariosala WHERE id_user = '$id_user'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        // Si la eliminación fue exitosa, devolver un mensaje de éxito
        echo 'Usuario eliminado de la sala exitosamente.';
    } else {
        // Si ocurrió un error durante la eliminación, devolver un mensaje de error
        echo 'Error al eliminar al usuario de la sala.';
    }

}
} else {
    // Si no se recibió el ID del usuario, devolver un mensaje de error
    echo 'No se recibió el ID del usuario.';
}
?>


