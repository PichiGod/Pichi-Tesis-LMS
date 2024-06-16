<?php
require "conexion.php";

if (isset($_GET['id'])) {
    borrarRecurso();
}
function borrarRecurso()
{
    global $mysqli;

    // Obtener datos del formulario
    $id = $_GET['id'];

    $del_archivo1 = mysqli_query($mysqli, "SELECT archivo FROM recursos WHERE id_recursos = '$id'");

    if (mysqli_num_rows($del_archivo1) > 0) {
        $dato1 = mysqli_fetch_assoc($del_archivo1);
        $archivo = $dato1['archivo'];
    } else {
        $archivo = null;
    }

    // Ruta de los archivos del recurso 
    $filePath = '../archivos/recursos/';

    if ($archivo != null) {
        // Borrar archivo en sistema
        if (file_exists($filePath . $archivo)) {
            if (unlink($filePath . $archivo)) {
                //echo "Archivo eliminado del sistema de archivos";
            } else {
                echo "Error al eliminar el archivo del sistema de archivos";
            }
        } else {
            echo "El archivo no existe en el sistema de archivos";
        }
    }

    $del_archivo2 = mysqli_query($mysqli, "SELECT archivoAdicional FROM recursos WHERE id_recursos = '$id'");

    if (mysqli_num_rows($del_archivo2) > 0) {
        $dato2 = mysqli_fetch_assoc($del_archivo2);
        $archivoAdicional = $dato2['archivoAdicional'];
    } else {
        $archivoAdicional = null;
    }

    if ($archivoAdicional != null) {
        // Borrar archivo en sistema
        if (file_exists($filePath . $archivoAdicional)) {
            if (unlink($filePath . $archivoAdicional)) {
                //echo "Archivo eliminado del sistema de archivos";
            } else {
                echo "Error al eliminar el archivo del sistema de archivos";
            }
        } else {
            echo "El archivo no existe en el sistema de archivos";
        }
    }

    // Preparar consulta SQL
    $sql = "DELETE FROM recursos
            WHERE id_recursos = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id); // corrected type to "i"
    $stmt->execute(); // execute the query

    if ($stmt->affected_rows > 0) {
        echo "Recurso eliminado correctamente";
    } else {
        echo "Hubo un error al eliminar el mensaje: " . $mysqli->error;
    }

    $stmt->close();
}
?>