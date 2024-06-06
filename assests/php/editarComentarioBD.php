<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "EditarComentario") {
    EditarComentario();
}

function EditarComentario() {
    global $mysqli;

    // Obtener datos del formulario
    $id = $_POST['id_comentario'];
    $mensaje = $_POST['mensaje'];
    $fechahora = $_POST['fechahora'];
    //var_dump($_POST);

    // Validar campos obligatorios
    if (empty($mensaje) || empty($id) || empty($fechahora)) {
        echo "Debe completar todos los campos obligatorios.";
        exit;
    }

    // Preparar fechas en formato YYYY-MM-DD para MySQL
    $fechahoraMySQL = date('Y-m-d H:i ', strtotime($fechahora));

    // Preparar consulta SQL con la nueva actividad
    $sql = "UPDATE foro_curso
            SET mensaje = ?, modif_fecha = ?
            WHERE id_foro_cur = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $mensaje, $fechahoraMySQL, $id);

    if ($stmt->execute()) {
        echo "Mensaje editado correctamente";
    } else {
        echo "Hubo un error al enviar el mensaje: " . $mysqli->error;
    }

    $stmt->close();
}
?>
