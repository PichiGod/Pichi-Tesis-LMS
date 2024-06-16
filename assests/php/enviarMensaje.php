<?php
// Requerir el archivo de conexión a la base de datos
require "conexion.php";

// Verificar si se recibieron los datos del mensaje
if (isset($_POST['mensaje']) && isset($_POST['id_usuario']) && isset($_POST['id_sala'])) {
    // Obtener los datos del mensaje desde la solicitud AJAX
    $mensaje = $_POST['mensaje'];
    $id_usuario = $_POST['id_usuario'];
    $id_sala = $_POST['id_sala'];
    $fecha_hora_actual = date('Y-m-d H:i:s');
    // Insertar el mensaje en la tabla de mensajes
    $query = "INSERT INTO mensaje (id_user, id_sala, contenido, fecha_envio) VALUES ('$id_usuario', '$id_sala', '$mensaje', '$fecha_hora_actual')";
    $resultado = mysqli_query($mysqli, $query);

    // Verificar si la inserción fue exitosa
    if ($resultado) {
        // Obtener todos los mensajes de la sala
        $query_mensajes = "SELECT mensaje.id_user, mensaje.contenido, usuario.nombre_user, usuario.apellido_user 
                           FROM mensaje 
                           INNER JOIN usuario ON mensaje.id_user = usuario.id_user 
                           WHERE id_sala = '$id_sala'";
        $resultado_mensajes = mysqli_query($mysqli, $query_mensajes);

        // Verificar si hay mensajes en la sala
        if (mysqli_num_rows($resultado_mensajes) > 0) {
            // Construir el HTML para mostrar todos los mensajes
            $mensajes_html = '';
            while ($fila = mysqli_fetch_assoc($resultado_mensajes)) {
                // Construir el HTML para cada mensaje utilizando los datos de la fila
                $nombre_usuario = $fila['nombre_user'] . ' ' . $fila['apellido_user'];
                $contenido_mensaje = $fila['contenido'];
                //$hora_mensaje = $fila['hora_envio'];

                // Formatear el HTML para cada mensaje
                $mensajes_html .= '<li class="list-group-item bg-white p-2 my-2 rounded">';
                $mensajes_html .= '<div id="userName" class="ms-1 text-break">';
                //$mensajes_html .= '<span>' . $hora_mensaje . '</span>';
                $mensajes_html .= '</div>';
                $mensajes_html .= '<div id="mensaje" class="ms-3 text-break">' . $contenido_mensaje . '</div>';
                $mensajes_html .= '</li>';
            }
        } else {
            // Si no hay mensajes en la sala, mostrar un mensaje indicando eso
            $mensajes_html = '<li class="list-group-item bg-white p-2 my-2 rounded">No hay mensajes en esta sala.</li>';
        }

        // Enviar el HTML de los mensajes de vuelta al cliente
        echo $mensajes_html;
    } else {
        // Si la inserción falla, devolver un mensaje de error al cliente
        echo 'Error al insertar el mensaje en la base de datos';
    }
} else {
    // Si no se recibieron todos los datos del mensaje, devolver un mensaje de error al cliente
    echo 'Faltan datos del mensaje';
}
?>

