<?php
require "conexion.php";

if (isset($_GET['id'])) {
    BorrarComentario();
}
function BorrarComentario() {
    global $mysqli;

    // Obtener datos del formulario
    $id = $_GET['id'];
    //var_dump($_GET);

    // Preparar consulta SQL
    $sql = "DELETE FROM foro_curso
            WHERE id_foro_cur =?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id); // corrected type to "i"
    $stmt->execute(); // execute the query

    if ($stmt->affected_rows > 0) {
        echo "Mensaje eliminado correctamente";
    } else {
        echo "Hubo un error al eliminar el mensaje: ". $mysqli->error;
    }

    $stmt->close();
}
?>
