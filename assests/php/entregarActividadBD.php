<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "EntregarActividad") {
    entregarActividad($mysqli);
}

function entregarActividad($mysqli)
{
    // Get the posted data
    $texto_actividad = $_POST['texto_actividad'];
    $id_User = $_POST['id_User'];
    $id_Act = $_POST['id_Act'];
    $fecha = $_POST['fecha_modif'];

    // Preparar fechas en formato YYYY-MM-DD para MySQL
    $fechahoraMySQL = date('Y-m-d H:i', strtotime($fecha));

    if (isset($_FILES['files'])) {
        // Get the uploaded files
        $files = $_FILES['files'];
    } else {
        $files = null;
    }

    // Create an array to store the uploaded file names
    $uploadedFiles = array();

    if ($files != null) {
        //Loop through the uploaded files
        foreach ($files['name'] as $key => $value) {
            // Get the file extension
            $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
            if (!preg_match('/^(pdf|doc|docx)$/', $fileExtension)) {
                echo "Formato de archivo no permitido. Sube un PDF, DOC o DOCX.";
                exit;
            }

            // // Generate a unique file name
            // $uniqueFileName = uniqid() . ".$fileExtension";

            // Move the uploaded file to a directory
            $uploadDir = "../archivos/entregas/"; // adjust the directory path as needed
            $uploadFile = $uploadDir . $value; // Usar $uniqueFileName para generar un nombre que sea unico
            $i = 0;
            while (file_exists($uploadFile)) {
                $i++;
                $uploadFile = $uploadDir . basename($value, ".$fileExtension") . "_$i.$fileExtension";
            }
            move_uploaded_file($files['tmp_name'][$key], $uploadFile);

            // Add the uploaded file name to the array
            $uploadedFiles[] = basename($uploadFile); //$Usar $uniqueFileName para evitar nombres de archivos repetidos
        }
    }


    // Validar campos. Si no hay texto pero hay archivo hacer el Insert y tambien de que si no hay archivo pero hay texto que haga el insert
    if (empty($texto_actividad)) {
        if (empty($uploadedFiles[0])) {
            echo "Debe subir por lo menos un archivo o enviar un texto";
            exit;
        }
    }
    ;

    // Preparar consulta SQL con la nueva actividad
    $sql = "INSERT INTO entregas (texto_entrega, archivo, archivoAdicional, fecha_modificacion, id_user, id_actividad)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "ssssii", $texto_actividad, $uploadedFiles[0], $uploadedFiles[1], $fechahoraMySQL, $id_User, $id_Act);
    if (mysqli_stmt_execute($stmt)) {
        echo "Entrega Realizada Exitosamente";
    } else {
        echo "Hubo un error al crear la actividad.";
    }
}
?>