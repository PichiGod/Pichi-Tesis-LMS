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
    $idCurso = $_POST['idCurso']; //idCurso del foro
    $idUser = $_POST['idUser']; //id del Usuario original del mensaje, por si es modificado por un admin   

    // Validar campos obligatorios
    if (empty($mensaje)) {
        echo "Debe completar todos los campos obligatorios.";
        exit;
    }

    // Preparar fechas en formato YYYY-MM-DD para MySQL
    $fechahoraMySQL = date('Y-m-d H:i', strtotime($fechahora));

    // Preparar consulta SQL con la nueva actividad
    $sql = "UPDATE foro_curso 
            SET mensaje = '$mensaje', modif_fecha = '$fechahoraMySQL', usuario_id_user = '$idUser', curso_id_curso = '$idCurso'
            WHERE id_foro_cur = '$id'";

    if (mysqli_query($mysqli, $sql)) {
        echo "Mensaje editado correctamente";
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
}
?>
