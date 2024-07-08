<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "deshabilitar") {
    deshabilitar($mysqli);
} elseif (isset($_POST['action']) && $_POST['action'] == "habilitar") {
    habilitar($mysqli);
}

function deshabilitar($mysqli)
{
    // Get the posted data
    $estadoCur = $_POST['estado'];
    $id = $_POST['idInscrip'];
    $nuevoEstado = 1;

    // Validar campos. Si no hay texto pero hay archivo hacer el Insert y tambien de que si no hay archivo pero hay texto que haga el insert
    if (empty($estadoCur) || empty($id)) {
        echo "Debe elegir un curso!";
        exit;
    }
    ;

    // Preparar consulta SQL para actualizar el estado del curso
    $sql = "UPDATE inscripcion
            SET solvencia_estu = ?
            WHERE id_inscripcion = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $nuevoEstado, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Alumno Editado Correctamente";
    } else {
        echo "Hubo un error al asiganr la nota.";
    }
}

function habilitar($mysqli)
{
    // Get the posted data
    $estadoCur = $_POST['estado'];
    $id = $_POST['idInscrip'];
    $nuevoEstado = 0;

    // Validar campos. Si no hay texto pero hay archivo hacer el Insert y tambien de que si no hay archivo pero hay texto que haga el insert
    if (empty($estadoCur) || empty($id)) {
        echo "Debe elegir un curso!";
        exit;
    }
    ;

    // Preparar consulta SQL para actualizar el estado del curso
    $sql = "UPDATE inscripcion
            SET solvencia_estu = ?
            WHERE id_inscripcion = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $nuevoEstado, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Alumno Editado Correctamente";
    } else {
        echo "Hubo un error al asiganr la nota.";
    }
}
?>