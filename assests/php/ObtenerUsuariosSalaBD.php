<?php
require "conexion.php";

if (isset($_POST['id_sala'])) {
    $id_sala = $_POST['id_sala'];

    $query = "
    SELECT usuario.id_user, usuario.nombre_user, usuario.apellido_user, usuario.img_perfil
    FROM usuariosala 
    JOIN usuario ON usuariosala.id_user = usuario.id_user 
    WHERE usuariosala.id_sala = '$id_sala'";

    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        $usuarios = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }
        echo json_encode($usuarios);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode(["error" => "ID de sala no proporcionado"]);
}
?>