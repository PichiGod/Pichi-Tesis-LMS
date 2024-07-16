<?php
require "conexion.php";

if (isset($_GET['id'])) {
    borrarCurso($mysqli);
}

function borrarCurso($mysqli) {
    // Obtener datos del formulario
    $id = $_GET['id'];
    $nuevoEstado = "Invisible";

    // Preparar consulta SQL para actualizar el estado del curso
    $sql = "UPDATE cursos
            SET visibilidad_curso = ?
            WHERE id_cur = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nuevoEstado, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Curso Eliminado Correctamente";
    } else {
        echo "Hubo un error al asiganr la nota.";
    }

    $stmt->close();

    // $mysqli->begin_transaction();

    // try {

    //     $conexion5 = mysqli_query(
    //         $mysqli,
    //         "SELECT * FROM sala
    //     WHERE id_curso = '$id'"
    //     );

    //     if (mysqli_num_rows($conexion5) > 0) {
    //         $datos5 = mysqli_fetch_assoc($conexion5);
    //         $id_sala = $datos5['id_sala'];
    //         $sql = "DELETE FROM seccionhistorial WHERE id_sala = $id_sala";
    //         $result = $mysqli->query($sql);
    //         if (!$result) {
    //             throw new Exception("Error al borrar sala");
    //         }
    //     }

    //     // Delete related records from sala
    //     $sql = "DELETE FROM sala WHERE id_curso = ?";
    //     $stmt = $mysqli->prepare($sql);
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();

    //     $sql = "DELETE FROM actividades WHERE idCurso_id_cur = ?";
    //     $stmt = $mysqli->prepare($sql);
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();
    
    //     // Delete record from cursos
    //     $sql = "DELETE FROM cursos WHERE id_cur = ?";
    //     $stmt = $mysqli->prepare($sql);
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();
    
    //     $mysqli->commit();
    // } catch (Exception $e) {
    //     $mysqli->rollback();
    //     echo "Error deleting data: " . $e->getMessage();
    // }

    // if ($stmt->affected_rows > 0) {
    //     echo "Curso eliminado correctamente";
    // } else {
    //     echo "Hubo un error al eliminar el mensaje: ". $mysqli->error;
    // }

    // $stmt->close();
}
?>