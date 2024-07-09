<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] === "modificarCurso") {
    modificarCurso($mysqli);
}

function modificarCurso($mysqli) {

    // Obtener datos del formulario
    $idCur = $_POST['id'];
    $nombreCur = $_POST['nombreCur'];
    $visibilidad = $_POST['visibilidad'];
    $fechaIni = $_POST['fechaIni'];
    $fechaFin = $_POST['fechaFin'];
    $cuposMin = $_POST['cuposMin'];
    $cuposMax = $_POST['cuposMax'];

    // Validar que no haya campos vacíos
    if (empty($idCur) || empty($nombreCur) || empty($visibilidad) || empty($fechaIni) || empty($fechaFin) 
        || empty($cuposMin) || empty($cuposMax)) {
        echo "Rellene todos los campos para completar el registro";
        exit;
    }

    // Convertir fecha de nacimiento al formato de la base de datos (YYYY-MM-DD)
    $fechaIniBD = date('Y-m-d', strtotime(str_replace('/', '-', $fechaIni)));
    $fechaFinBD = date('Y-m-d', strtotime(str_replace('/', '-', $fechaFin)));

    // Preparar consulta SQL con la nueva actividad
    $sql = "UPDATE cursos
            SET nombre_cur = ?, fecha_inicio = ?, cupos_cur_min = ?, cupos_cur_max = ?, fecha_fin = ?, visibilidad_curso = ?
            WHERE id_cur = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssiisss", $nombreCur, $fechaIni, $cuposMin, $cuposMax, $fechaFin, $visibilidad, $idCur);

    if ($stmt->execute()) {
        echo "Curso Modificado Correctamente";
    } else {
        echo "Hubo un error al enviar el mensaje: " . $mysqli->error;
    }

    $stmt->close();
}
?>
