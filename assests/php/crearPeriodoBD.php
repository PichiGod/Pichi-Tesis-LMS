<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] === "crearPeriodo") {
    crearPeriodo();
}

function crearPeriodo() {
    global $mysqli;

    // Obtener datos del formulario
    $idPer = $_POST['idPer'];
    $FechaInicioPer = $_POST['FechaInicioPer'];
    $FechaFinPer = $_POST['FechaFinPer'];
    $idEmpresa = $_POST['action2'];

    // Validar que no haya campos vacíos
    if (empty($idPer) || empty($FechaInicioPer) || empty($FechaFinPer)) {
        echo "Rellene todos los campos para completar el registro";
        exit;
    }

    // Convertir fecha al formato de la base de datos (YYYY-MM-DD)
    $fechaInicioBD = date('Y-m-d', strtotime(str_replace('/', '-', $FechaInicioPer)));
    $fechaFinBD = date('Y-m-d', strtotime(str_replace('/', '-', $FechaFinPer)));


        // Verificar si el periodo ya existe por su nombre
        $result = mysqli_query($mysqli, "SELECT nombre_peri FROM periodo WHERE nombre_peri= '$idPer'");
        if (mysqli_num_rows($result) > 0) {
            echo "Ya existe este nombre en tus periodos, por favor intente con otro nombre";
            exit;
        }

        // Insertar nuevo periodo
        $query = "INSERT INTO periodo (nombre_peri, fecha_ini_peri, fecha_fin_peri, id_empresa) VALUES ('$idPer', '$fechaInicioBD', '$fechaFinBD', '$idEmpresa')";
        if (mysqli_query($mysqli, $query)) {
            echo "¡Se ha creado un nuevo periodo de forma exitosa!";
        } else {
            echo "Error al crear nuevo periodo: " . mysqli_error($mysqli);
        }
}
?>
