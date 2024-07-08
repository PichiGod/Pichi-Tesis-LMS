<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "inscribirUsuario") {
    inscribirUsuario($mysqli);
}

function inscribirUsuario($mysqli)
{
    // Obtener datos del formulario
    $idUser = $_POST['idUser'];
    $allValues = json_decode($_POST['allValues'], true);
    $checkedValues = json_decode($_POST['checkedValues'], true);
    $peri = $_POST['peri'];
    $solvencia = 0;

    // Validar campos obligatorios
    if (empty($idUser) || empty($peri)) {
        echo "Debe completar todos los campos obligatorios.";
        exit;
    }

    // Preparar fechas en formato YYYY-MM-DD para MySQL
    $fecha_completa = date("Y-m-d H:i:s");

    // Delete registrations for unchecked courses
    $uncheckedValues = array_diff($allValues, $checkedValues);
    foreach ($uncheckedValues as $curso) {
        $verCursos = mysqli_query($mysqli, "SELECT * FROM inscripcion WHERE Cursos_id_cur = '$curso' AND Usuario_id_user = '$idUser'");
        if (mysqli_num_rows($verCursos) > 0) {
            $stmt = mysqli_prepare($mysqli, "DELETE FROM inscripcion WHERE Cursos_id_cur = ? AND Usuario_id_user = ?");
            mysqli_stmt_bind_param($stmt, "si", $curso, $idUser);
            if (mysqli_stmt_execute($stmt)) {
                //echo 'Se eliminarton el curso correctamente';
            } else {
                echo "Error al eliminar estudiante del curso";
            }
        }
    }

    // Insert or update registrations for checked courses
    foreach ($checkedValues as $curso) {
        $verCursos = mysqli_query($mysqli, "SELECT * FROM inscripcion WHERE Cursos_id_cur = '$curso' AND Usuario_id_user = '$idUser'");

        if (mysqli_num_rows($verCursos) > 0) {
            // User is already in the course, update registration
            $stmt = mysqli_prepare($mysqli, "UPDATE inscripcion SET fecha_incripcion = ?, Periodo_id_peri = ? WHERE Cursos_id_cur = ? AND Usuario_id_user = ?");
            mysqli_stmt_bind_param($stmt, "sisi", $fecha_completa, $peri, $curso, $idUser);
            if (mysqli_stmt_execute($stmt)) {
                //echo 'Se actualizo el curso correctamente';
            } else {
                echo "Error al actualizar estudiante del curso";
            }
        } else {
            // User is not in the course, insert registration
            $stmt = mysqli_prepare($mysqli, "INSERT INTO inscripcion (solvencia_estu, fecha_incripcion, Usuario_id_user, Periodo_id_peri, Cursos_id_cur) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "siis", $solvencia, $fecha_completa, $idUser, $peri, $curso);
            if (mysqli_stmt_execute($stmt)) {
                //echo "Se inserto el curso correctamente";
            } else {
                echo "Error al insertar el curso";
            }
        }
    }

    echo "Cambios realizados correctamente";
}
?>