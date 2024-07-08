<?php
require "conexion.php";

if (isset($_GET['id'])) {
    borrarUsuario($mysqli);
}
function borrarUsuario($mysqli) {

    // Obtener datos del formulario
    $id = $_GET['id'];
    //var_dump($_GET);

    // Preparar consulta SQL
    $sql = "DELETE FROM usuario
            WHERE id_user = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id); // corrected type to "i"
    $stmt->execute(); // execute the query

    if ($stmt->affected_rows > 0) {
        echo "Usuario eliminado correctamente";
    } else {
        echo "Hubo un error al eliminar el mensaje: ". $mysqli->error;
    }

    $stmt->close();
}
?>
