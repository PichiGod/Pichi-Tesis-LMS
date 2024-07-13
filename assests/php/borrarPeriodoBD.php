<?php
require "conexion.php";

if (isset($_GET['id'])) {
    borrarPeriodo($mysqli);
}
function borrarPeriodo($mysqli) {

    // Obtener datos del formulario
    $id = $_GET['id'];
    //var_dump($_GET);

    $mysqli->begin_transaction();

    try {
        $sql = "DELETE FROM inscripcion
        WHERE Periodo_id_peri = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id); // corrected type to "i"
        $stmt->execute(); // execute the query

        // Preparar consulta SQL
        $sql = "DELETE FROM periodo
                WHERE id_peri = ?";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id); // corrected type to "i"
        $stmt->execute(); // execute the query

        if ($stmt->affected_rows > 0) {
            echo "Periodo eliminado correctamente";
        } else {
            echo "Hubo un error al eliminar el periodo: ". $mysqli->error;
        }

        $mysqli->commit(); // commit the transaction

    }catch (Exception $e) {
        $mysqli->rollback();
        echo "Error deleting data: " . $e->getMessage();
        throw $e; // re-throw the exception for debugging purposes
    }    

    $stmt->close();
}
?>