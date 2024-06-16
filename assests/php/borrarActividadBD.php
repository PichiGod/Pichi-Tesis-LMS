<?php
require "conexion.php";

if (isset($_GET['id'])) {
    borrarActividad();
}
function borrarActividad()
{
    global $mysqli;

    // Obtener datos del formulario
    $id = $_GET['id'];

    //Borrar archivosPrincipal de los archivos de la plataforma
    $del_archivo1 = mysqli_query($mysqli, "SELECT archivosPrincipal FROM actividades WHERE idActividades = '$id'");

    if (mysqli_num_rows($del_archivo1) > 0) {
        $dato1 = mysqli_fetch_assoc($del_archivo1);
        $archivo = $dato1['archivosPrincipal'];
    } else {
        $archivo = null;
    }

    // Ruta de los archivos del recurso 
    $filePath = '../archivos/actividades/';

    //Si el archivo existe en la base de datos, que lo borre del sistema de archivos
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

    //Lo mismo con archivosAdicional
    $del_archivo2 = mysqli_query($mysqli, "SELECT archivosAdicional FROM actividades WHERE idActividades = '$id'");

    if (mysqli_num_rows($del_archivo2) > 0) {
        $dato2 = mysqli_fetch_assoc($del_archivo2);
        $archivoAdicional = $dato2['archivosAdicional'];
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

    $filePath2 = '../archivos/entregas/';

    //Borrar archivo de la tabla de entregas de los archivos de la plataforma
    $del_archivo3 = mysqli_query($mysqli, "SELECT archivo FROM entregas WHERE id_actividad = '$id'");

    if (mysqli_num_rows($del_archivo3) > 0) {
        $dato3 = mysqli_fetch_assoc($del_archivo3);
        $archivoEntrega = $dato3['archivo'];
    } else {
        $archivoEntrega = null;
    }

    //Si el archivo existe en la base de datos, que lo borre del sistema de archivos
    if ($archivoEntrega != null) {
        // Borrar archivo en sistema
        if (file_exists($filePath2 . $archivoEntrega)) {
            if (unlink($filePath2 . $archivoEntrega)) {
                //echo "Archivo eliminado del sistema de archivos";
            } else {
                echo "Error al eliminar el archivo del sistema de archivos";
            }
        } else {
            echo "El archivo no existe en el sistema de archivos";
        }
    }

    //Lo mismo con archivoAdicional de la tabla de entregas
    $del_archivo4 = mysqli_query($mysqli, "SELECT archivoAdicional FROM entregas WHERE id_actividad = '$id'");

    if (mysqli_num_rows($del_archivo4) > 0) {
        $dato4 = mysqli_fetch_assoc($del_archivo4);
        $archivoAdicionalEntrega = $dato4['archivoAdicional'];
    } else {
        $archivoAdicionalEntrega = null;
    }

    if ($archivoAdicionalEntrega != null) {
        // Borrar archivo en sistema
        if (file_exists($filePath2 . $archivoAdicionalEntrega)) {
            if (unlink($filePath2 . $archivoAdicionalEntrega)) {
                //echo "Archivo eliminado del sistema de archivos";
            } else {
                echo "Error al eliminar el archivo del sistema de archivos";
            }
        } else {
            echo "El archivo no existe en el sistema de archivos";
        }
    }

    //Eliminar todas las entregas relacionadas con la actividad
    $stmt1 = $mysqli->prepare("DELETE FROM entregas WHERE id_actividad = ?");
    $stmt1->bind_param("i", $id);
    $stmt1->execute();

    if ($stmt1->affected_rows > 0) {
        echo "Entregas eliminadas correctamente";
    } else if ($stmt1->errno != 0) {
        echo "Error eliminando entregas: " . $stmt1->error;
    } else {
        echo "No se encontraron entregas";
    }

    // Preparar consulta SQL
    $sql = "DELETE FROM actividades
            WHERE idActividades = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id); // corrected type to "i"
    $stmt->execute(); // execute the query

    if ($stmt->affected_rows > 0) {
        echo "Actividad eliminada correctamente";
    } else {
        echo "Hubo un error al eliminar el mensaje: " . $mysqli->error;
    }

    $stmt->close();
}
?>