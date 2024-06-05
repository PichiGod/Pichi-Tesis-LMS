<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "EnviarComentario") {
    EnviarComentario();
}

function EnviarComentario() {
    global $mysqli;

    // Obtener datos del formulario
    $mensaje = $_POST['mensaje'];
    $fechahora = $_POST['fechahora']; // Cambio: Obtener el contenido del editor Quill
    $idCurso = $_POST['idCurso']; //idCurso del foro
    $idUser = $_POST['idUser']; //id del Usuario que mando el mensaje   

    // Validar campos obligatorios
    if (empty($mensaje)) {
        echo "Debe completar todos los campos obligatorios.";
        exit;
    }

    // Preparar fechas en formato YYYY-MM-DD para MySQL
    $fechahoraMySQL = date('Y-m-d H:i', strtotime($fechahora));

    // Preparar consulta SQL con la nueva actividad
    $sql = "INSERT INTO foro_curso (mensaje, modif_fecha, usuario_id_user, curso_id_curso)
            VALUES ('$mensaje', '$fechahoraMySQL', '$idUser' , '$idCurso')";

    if (mysqli_query($mysqli, $sql)) {
        echo "Nuevo Mensaje Enviado Exitosamente";
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
}
?>
