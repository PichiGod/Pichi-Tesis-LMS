<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "CrearRecurso") {
    crearRecurso($mysqli);
}

function crearRecurso($mysqli)
{
    // Get the posted data
    $titulo = $_POST['titulo'];
    $texto_recurso = $_POST['texto_recurso'];
    $id_cur = $_POST['idCurso'];

    if(isset($_FILES['files'])){
        // Get the uploaded files
        $files = $_FILES['files'];
    }else{
        $files = null;
    }

    // Create an array to store the uploaded file names
    $uploadedFiles = array();

    //Loop through the uploaded files
    if ($files != null) {
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
            $uploadDir = "../archivos/recursos/"; // adjust the directory path as needed
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
    if (empty($texto_recurso)) {
        echo "Debe enviar la descripción del recurso";
        exit;
    };

    if (empty($titulo)) {
        echo "Debe enviar un titulo al recurso";
        exit;
    };

    // Preparar consulta SQL con el nuevo recurso
    $sql = "INSERT INTO recursos (nombre_recurso, descripcion_recurso, archivo, archivoAdicional, id_cur)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $titulo, $texto_recurso, $uploadedFiles[0], $uploadedFiles[1], $id_cur);
    if (mysqli_stmt_execute($stmt)) {
        echo "Recurso Creado Exitosamente";
    } else {
        echo "Hubo un error al crear la actividad.";
    }
}
?>