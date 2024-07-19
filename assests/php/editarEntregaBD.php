<?php
require "conexion.php";

if (isset($_POST['actionArchivo']) && $_POST['actionArchivo'] === "borrar") {
    borrarArchivo($mysqli);
}

if (isset($_POST['actionArchivo']) && $_POST['actionArchivo'] === "borrarAdicional") {
    borrarArchivoAdicional($mysqli);
}

if (isset($_POST['action']) && $_POST['action'] == "editarEntrega") {
    editarEntrega($mysqli);
}

function borrarArchivo($mysqli)
{
    //Obtener archivo a eliminar 
    $archivo = $_POST['archivo'];
    $id_ent = $_POST['id_ent'];

    // Ruta del archivo a eliminar
    $filePath = '../archivos/entregas/' . $archivo;

    // Borrar archivo en sistema
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            //echo "Archivo eliminado del sistema de archivos/n";
        } else {
            echo "Error al eliminar el archivo del sistema de archivos";
        }
    } else {
        echo "El archivo no existe en el sistema de archivos";
    }

    //Eliminar archivo de la base de datos
    // Preparar consulta SQL con la nueva actividad
    $sql = "UPDATE entregas 
            SET archivo = null
            WHERE  id_entregas = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_ent);
    if (mysqli_stmt_execute($stmt)) {
        echo "Archivo Eliminado Exitosamente";
    } else {
        echo "Hubo un error al eliminar el archivo.";
    }
}

function borrarArchivoAdicional($mysqli)
{
    //Obtener archivo a eliminar 
    $archivoAdicional = $_POST['archivoAdicional'];
    $id_ent = $_POST['id_ent'];

    // Ruta del archivo a eliminar
    $filePath = '../archivos/entregas/' . $archivoAdicional;

    // Borrar archivo en sistema
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            //echo "Archivo eliminado del sistema de archivos";
        } else {
            echo "Error al eliminar el archivo del sistema de archivos";
        }
    } else {
        echo "El archivo no existe en el sistema de archivos";
    }

    //Eliminar archivo de la base de datos
    // Preparar consulta SQL con la nueva actividad
    $sql = "UPDATE entregas 
            SET archivoAdicional = null
            WHERE  id_entregas = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_ent);
    if (mysqli_stmt_execute($stmt)) {
        echo "Archivo Eliminado Exitosamente";
    } else {
        echo "Hubo un error al eliminar el archivo.";
    }
}

function editarEntrega($mysqli)
{

    // Get the posted data
    $texto_entrega = $_POST['texto_entrega'];
    $fecha = $_POST['fecha_modif'];
    $id_ent = $_POST['id_ent'];
    //$id_act = $_POST['id_act'];

    // Preparar fechas en formato YYYY-MM-DD para MySQL
    $fechahoraMySQL = date('Y-m-d H:i', strtotime($fecha));

    if (isset($_FILES['archivo'])) {
        $archivo = $_FILES['archivo'];
    } else {
        $archivo = null;
    }

    if (isset($_FILES['archivoAdicional'])) {
        $archivoAdicional = $_FILES['archivoAdicional'];
    } else {
        $archivoAdicional = null;
    }

    // Create an array to store the uploaded file names
    $uploadedFiles = array();
    $upload = array();

    //Loop through the uploaded files
    if ($archivo != null) {
        // Get the file extension
        $fileExtension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        if (!preg_match('/^(pdf|doc|docx)$/', $fileExtension)) {
            echo "Formato de archivo no permitido. Sube un PDF, DOC o DOCX.";
            exit;
        }
        if (preg_match('/[^\w\.]/', $archivo['name'])) {
            echo 'El archivo contiene caracteres especiales. Por favor, cambie el nombre al archivo.';
            exit;
        }

        // Move the uploaded file to a directory
        $uploadDir = "../archivos/entregas/"; // adjust the directory path as needed
        //Railway
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadFile = $uploadDir . $archivo['name'];
        $i = 0;
        while (file_exists($uploadFile)) {
            $i++;
            $uploadFile = $uploadDir . basename($archivo['name'], ".$fileExtension") . "_$i.$fileExtension";
        }
        // Set permissions for the upload directory
        chmod($uploadDir, 0777);
        move_uploaded_file($archivo['tmp_name'], $uploadFile);

        // Add the uploaded file name to the array
        $uploadedFiles[] = basename($uploadFile);
    }

    //Loop through the uploaded files
    if ($archivoAdicional != null) {
        // Get the file extension
        $fileExtension = pathinfo($archivoAdicional['name'], PATHINFO_EXTENSION);
        if (!preg_match('/^(pdf|doc|docx)$/', $fileExtension)) {
            echo "Formato de archivo no permitido. Sube un PDF, DOC o DOCX.";
            exit;
        }
        if (preg_match('/[^\w\.]/', $archivo['name'])) {
            echo 'El archivo contiene caracteres especiales. Por favor, cambie el nombre al archivo.';
            exit;
        }

        // Move the uploaded file to a directory
        $uploadDir = "../archivos/entregas/"; // adjust the directory path as needed
        //Railway
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadFile = $uploadDir . $archivoAdicional['name'];
        $i = 0;
        while (file_exists($uploadFile)) {
            $i++;
            $uploadFile = $uploadDir . basename($archivoAdicional['name'], ".$fileExtension") . "_$i.$fileExtension";
        }
        // Set permissions for the upload directory
        chmod($uploadDir, 0777);
        move_uploaded_file($archivoAdicional['tmp_name'], $uploadFile);

        // Add the uploaded file name to the array
        $upload[] = basename($uploadFile);

    }

    $sql = "UPDATE entregas 
        SET texto_entrega = ?, fecha_modificacion = ?, archivo = CASE
            WHEN ? IS NOT NULL THEN ?
            ELSE archivo
        END, archivoAdicional = CASE
            WHEN ? IS NOT NULL THEN ?
        ELSE archivoAdicional
        END
        WHERE  id_entregas = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $texto_entrega, $fechahoraMySQL, $uploadedFiles[0], $uploadedFiles[0], $upload[0], $upload[0], $id_ent);
    if (mysqli_stmt_execute($stmt)) {
        echo "Entrega Modificada Exitosamente";
    } else {
        echo "Hubo un error al editar la entrega.";
    }
}

?>