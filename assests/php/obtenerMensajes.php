<?php
// obtenerMensajes.php

// Incluir el archivo de conexión a la base de datos
require "conexion.php";

// Verificar si se recibió el id_sala
if (isset($_GET['id_sala'])) {
    // Obtener el id_sala desde la solicitud GET
    $id_sala = $_GET['id_sala'];

    // Consulta SQL para obtener los mensajes por id_sala
    $sql = "SELECT mensaje.id_user, mensaje.id_sala, mensaje.contenido, usuario.nombre_user, usuario.apellido_user 
            FROM mensaje
            INNER JOIN usuario ON mensaje.id_user = usuario.id_user
            WHERE mensaje.id_sala = '$id_sala' ORDER BY mensaje.fecha_envio ASC";

    // Ejecutar la consulta
    $result = mysqli_query($mysqli, $sql);

    // Verificar si hay resultados
    if (mysqli_num_rows($result) > 0) {
        // Inicializar una variable para almacenar los mensajes
        $messages = "";

        // Recorrer los resultados y construir la lista de mensajes
        while ($row = mysqli_fetch_assoc($result)) {
            $nombre_apellido = $row['nombre_user'] . ' ' . $row['apellido_user'];
            $messages .= '<li class="list-group-item bg-white p-2 my-2 rounded">
                            <div>' . $row['contenido'] . '</div>
                          </li>';
        }

        // Devolver la lista de mensajes
        echo $messages;
    } else {
        // Si no hay mensajes, devolver un mensaje indicando que no hay mensajes
        echo '<li class="list-group-item bg-white p-2 my-2 rounded">No hay mensajes en esta sala</li>';
    }
} else {
    // Si no se proporcionó el id_sala, devolver un mensaje de error
    echo "Error: Falta el parámetro id_sala en la solicitud";
}
?>