<?php
require "conexion.php";

if (isset($_POST['actionArchivo']) && $_POST['actionArchivo'] === "borrar") {
    borrarArchivo($mysqli);
}

if (isset($_POST['actionArchivo']) && $_POST['actionArchivo'] === "borrarAdicional") {
    borrarArchivoAdicional($mysqli);
}

if (isset($_POST['action']) && $_POST['action'] == "editarRecurso") {
    editarRecurso($mysqli);
}

function borrarArchivo($mysqli)
{
    //Obtener archivo a eliminar 
    $archivo = $_POST['archivo'];
    $id_rec = $_POST['id_rec'];

    // Ruta del archivo a eliminar
    $filePath = '../archivos/recursos/' . $archivo;

    // Borrar archivo en sistema
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            //echo "Archivo eliminado del sistema de archivos/n";
        } else {
            echo "Error al eliminar el archivo del sistema de archivos/n";
        }
    } else {
        echo "El archivo no existe en el sistema de archivos/n";
    }

    //Eliminar archivo de la base de datos
    // Preparar consulta SQL con la nueva actividad
    $sql = "UPDATE recursos 
            SET archivo = null
            WHERE  id_recursos = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_rec);
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
    $id_rec = $_POST['id_rec'];

    // Ruta del archivo a eliminar
    $filePath = '../archivos/recursos/' . $archivoAdicional;

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
    $sql = "UPDATE recursos 
            SET archivoAdicional = null
            WHERE  id_recursos = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_rec);
    if (mysqli_stmt_execute($stmt)) {
        echo "Archivo Eliminado Exitosamente";
    } else {
        echo "Hubo un error al eliminar el archivo.";
    }
}

function editarRecurso($mysqli)
{
    // Get the posted data
    $titulo = $_POST['titulo'];
    $texto_recurso = $_POST['texto_recurso'];
    $id_rec = $_POST['id_rec'];

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
        if (preg_match('/[^a-zA-Z0-9]/', $archivo['name'])) {
            echo 'El archivo contiene caracteres especiales. Por favor, cambie el nombre al archivo.';
            exit;
        }

        // Move the uploaded file to a directory
        $uploadDir = "../archivos/recursos/"; // adjust the directory path as needed
        $uploadFile = $uploadDir . $archivo['name'];
        $i = 0;
        while (file_exists($uploadFile)) {
            $i++;
            $uploadFile = $uploadDir . basename($archivo['name'], ".$fileExtension") . "_$i.$fileExtension";
        }
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
        if (preg_match('/[^a-zA-Z0-9]/', $archivoAdicional['name'])) {
            echo 'El archivo contiene caracteres especiales. Por favor, cambie el nombre al archivo.';
            exit;
        }

        // Move the uploaded file to a directory
        $uploadDir = "../archivos/recursos/"; // adjust the directory path as needed
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

    // Validar campos. Si no hay texto pero hay archivo hacer el Insert y tambien de que si no hay archivo pero hay texto que haga el insert
    if (empty($texto_recurso)) {
        echo "Debe enviar la descripción del recurso";
        exit;
    }
    ;

    if (empty($titulo)) {
        echo "Debe enviar un titulo al recurso";
        exit;
    }
    ;

    $sql = "UPDATE recursos 
        SET nombre_recurso =?, descripcion_recurso =?, archivo = CASE
            WHEN ? IS NOT NULL THEN ?
            ELSE archivo
        END, archivoAdicional = CASE
            WHEN ? IS NOT NULL THEN ?
        ELSE archivoAdicional
        END
        WHERE  id_recursos =?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssi", $titulo, $texto_recurso, $uploadedFiles[0], $uploadedFiles[0], $upload[0], $upload[0], $id_rec);
    if (mysqli_stmt_execute($stmt)) {
        echo "Recurso Editado Exitosamente";
    } else {
        echo "Hubo un error al editar el recurso.";
    }
}
?>