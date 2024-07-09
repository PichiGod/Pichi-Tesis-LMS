<?php
require "conexion.php";

if (isset($_GET['id'])) {
    borrarCurso($mysqli);
}

function borrarCurso($mysqli) {
    // Obtener datos del formulario
    $id = $_GET['id'];

    $mysqli->begin_transaction();

    try {
        // Delete related records from sala
        $sql = "DELETE FROM sala WHERE id_curso = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $sql = "DELETE FROM actividades WHERE idCurso_id_cur = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    
        // Delete record from cursos
        $sql = "DELETE FROM cursos WHERE id_cur = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    
        $mysqli->commit();
    } catch (Exception $e) {
        $mysqli->rollback();
        echo "Error deleting data: " . $e->getMessage();
    }

    if ($stmt->affected_rows > 0) {
        echo "Curso eliminado correctamente";
    } else {
        echo "Hubo un error al eliminar el mensaje: ". $mysqli->error;
    }

    $stmt->close();
}
?>