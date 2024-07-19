<?php
require "conexion.php";

if (isset($_POST['actionArchivo']) && $_POST['actionArchivo'] === "borrar") {
    borrarArchivo($mysqli);
}

if (isset($_POST['actionArchivo']) && $_POST['actionArchivo'] === "borrarAdicional") {
    borrarArchivoAdicional($mysqli);
}

if (isset($_POST['action']) && $_POST['action'] == "editarActividad") {
    editarActividad($mysqli);
}

function borrarArchivo($mysqli)
{
    //Obtener archivo a eliminar 
    $archivo = $_POST['archivo'];
    $id_act = $_POST['id_act'];

    // Ruta del archivo a eliminar
    $filePath = '../archivos/actividades/' . $archivo;

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
    $sql = "UPDATE actividades 
            SET archivosPrincipal = null
            WHERE  idActividades = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_act);
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
    $id_act = $_POST['id_act'];

    // Ruta del archivo a eliminar
    $filePath = '../archivos/actividades/' . $archivoAdicional;

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
    $sql = "UPDATE actividades 
            SET archivosAdicional = null
            WHERE  idActividades = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_act);
    if (mysqli_stmt_execute($stmt)) {
        echo "Archivo Eliminado Exitosamente";
    } else {
        echo "Hubo un error al eliminar el archivo.";
    }
}

function editarActividad($mysqli)
{

    // Get the posted data
    $titulo = $_POST['titulo'];
    $texto_actividad = $_POST['texto_actividad'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $fechaNotif = $_POST['fechaNoti'];
    $notaMaxima = $_POST['notaMaxima'];
    $notaMinima = $_POST['notaMinima'];
    $visible = $_POST['visible'];
    $pesoArchivo = $_POST['pesoArchivo'];
    $activarPorcentaje = $_POST['activarPorcentaje'];
    $porcentaje = $_POST['porcentaje'];
    $id_act = $_POST['id_act'];
    //$id_cur = $_POST['id_cur'];

    // Preparar fechas en formato YYYY-MM-DD para MySQL
    $fechaInicioMySQL = date('Y-m-d', strtotime($fechaInicio));
    $fechaFinMySQL = date('Y-m-d', strtotime($fechaFin));
    $fechaNotifMySQL = date('Y-m-d', strtotime($fechaNotif));

    // Validar campos. Si no hay texto pero hay archivo hacer el Insert y tambien de que si no hay archivo pero hay texto que haga el insert
    // if (empty($texto_actividad)) {
    //     echo "Debe enviar la descripción del recurso";
    //     exit;
    // }
    // ;

    if (empty($titulo)) {
        echo "Debe enviar un titulo al recurso";
        exit;
    }
    ;

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
        $uploadDir = "../archivos/actividades/"; // adjust the directory path as needed
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

        if (preg_match('/[^a-zA-Z0-9]/', $archivoAdicional['name'])) {
            echo 'El archivo contiene caracteres especiales. Por favor, cambie el nombre al archivo.';
            exit;
        }

        // Move the uploaded file to a directory
        $uploadDir = "../archivos/actividades/"; // adjust the directory path as needed
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

    $sql = "UPDATE actividades 
        SET Titulo = ?, ContenidoAcitividad = ?, fechaInicio = ?, fechaCulminacion = ?, fechaNotificacion = ?,
            pesoArchivo = ?, notaMaxima = ?, notaMinima = ?, visible = ?, activarPorcentaje = ?,
            Porcentaje = ?, archivosPrincipal = CASE
            WHEN ? IS NOT NULL THEN ?
            ELSE archivosPrincipal
        END, archivosAdicional = CASE
            WHEN ? IS NOT NULL THEN ?
        ELSE archivosAdicional
        END
        WHERE  idActividades = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "sssssdddiiissssi", $titulo, $texto_actividad, $fechaInicioMySQL, $fechaFinMySQL, $fechaNotifMySQL, $pesoArchivo, $notaMaxima, $notaMinima, $visible, $activarPorcentaje, $porcentaje, $uploadedFiles[0], $uploadedFiles[0], $upload[0], $upload[0], $id_act);
    if (mysqli_stmt_execute($stmt)) {
        echo "Actividad Modificada Exitosamente";
    } else {
        echo "Hubo un error al editar la Actividad.";
    }
}

?>