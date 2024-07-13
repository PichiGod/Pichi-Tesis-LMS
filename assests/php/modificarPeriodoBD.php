<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] === "modificarPeriodo") {
    modificarPeriodo($mysqli);
}

function modificarPeriodo($mysqli) {

    // Obtener datos del formulario
    $idPeri = $_POST['id'];
    $fechaIni = $_POST['fechaIni'];
    $fechaFin = $_POST['fechaFin'];

    // Validar que no haya campos vacíos
    if (empty($idPeri) || empty($fechaIni) || empty($fechaFin)) {
        echo "Rellene todos los campos para completar el registro";
        exit;
    }

    // Convertir fecha de nacimiento al formato de la base de datos (YYYY-MM-DD)
    $fechaIniBD = date('Y-m-d', strtotime(str_replace('/', '-', $fechaIni)));
    $fechaFinBD = date('Y-m-d', strtotime(str_replace('/', '-', $fechaFin)));

    // Preparar consulta SQL con la nueva actividad
    $sql = "UPDATE periodo
            SET fecha_ini_peri = ?, fecha_fin_peri = ?
            WHERE id_peri = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", $fechaIni, $fechaFin, $idPeri);

    if ($stmt->execute()) {
        echo "Periodo Modificado Correctamente";
    } else {
        echo "Hubo un error al enviar el mensaje: " . $mysqli->error;
    }

    $stmt->close();
}
?>