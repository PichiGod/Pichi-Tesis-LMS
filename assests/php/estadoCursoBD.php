<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "hacerInvisible") {
    hacerInvisible($mysqli);
} elseif (isset($_POST['action']) && $_POST['action'] == "hacerVisible") {
    hacerVisible($mysqli);
}

function hacerInvisible($mysqli)
{
    // Get the posted data
    $estadoCur = $_POST['estado'];
    $idCur = $_POST['curso'];
    $nuevoEstado = "Invisible";

    // Validar campos. Si no hay texto pero hay archivo hacer el Insert y tambien de que si no hay archivo pero hay texto que haga el insert
    if (empty($estadoCur) || empty($idCur)) {
        echo "Debe elegir un curso!";
        exit;
    }
    ;

    // Preparar consulta SQL para actualizar el estado del curso
    $sql = "UPDATE cursos
            SET visibilidad_curso = ?
            WHERE id_cur = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nuevoEstado, $idCur);
    if (mysqli_stmt_execute($stmt)) {
        echo "Curso Editado Correctamente";
    } else {
        echo "Hubo un error al asiganr la nota.";
    }
}

function hacerVisible($mysqli)
{
    // Get the posted data
    $estadoCur = $_POST['estado'];
    $idCur = $_POST['curso'];
    $nuevoEstado = "Visible";

    // Validar campos. Si no hay texto pero hay archivo hacer el Insert y tambien de que si no hay archivo pero hay texto que haga el insert
    if (empty($estadoCur) || empty($idCur)) {
        echo "Debe elegir un curso!";
        exit;
    }
    ;

    // Preparar consulta SQL para actualizar el estado del curso
    $sql = "UPDATE cursos
            SET visibilidad_curso = ?
            WHERE id_cur = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nuevoEstado, $idCur);
    if (mysqli_stmt_execute($stmt)) {
        echo "Curso Editado Correctamente";
    } else {
        echo "Hubo un error al asiganr la nota.";
    }
}
?>