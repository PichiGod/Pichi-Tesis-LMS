<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] === "modificarPerfil") {
    modificarPerfil($mysqli);
}

function modificarPerfil($mysqli) {

    // Obtener datos del formulario
    $idUser = $_POST['id'];
    $dirr = $_POST['dirr'];
    $telf = $_POST['telf'];
    $password = $_POST['password'];
    if (empty($password)) {
        $password = null;
    }

    if (isset($_FILES['img'])) {
        // Get the uploaded files
        $files = $_FILES['img'];
    } else {
        $files = null;
    }

    // Validar que no haya campos vacíos
    if (empty($idUser) || empty($dirr) || empty($telf)) {
        echo "Rellene todos los campos para completar el registro";
        exit;
    }

    if ($files != null) {
        $file = $_FILES['img'];
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!preg_match('/^(png|jpeg|jpg)$/', $fileExtension)) {
            echo "Formato de archivo no permitido. Sube un PNG, JPG o JPEG.";
            exit;
        }

        $sql = "SELECT img_perfil FROM usuario WHERE id_user = '$idUser'";
        $conexion5 = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($conexion5) > 0) {
            $datos5 = mysqli_fetch_assoc($conexion5);
            if ($datos5['img_perfil'] != 'default.png'){
                // Ruta del archivo a eliminar
                $filePath = '../archivos/imagen/' . $datos5['img_perfil'];

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
            }
        }

        // Move the uploaded file to a directory
        $uploadDir = "../archivos/imagen/";
        $uploadFile = $uploadDir . $file['name'];
        $i = 0;
        while (file_exists($uploadFile)) {
            $i++;
            $uploadFile = $uploadDir . basename($file['name'], ".$fileExtension") . "_$i.$fileExtension";
        }
        move_uploaded_file($file['tmp_name'], $uploadFile);

        $uploadedFile = basename($uploadFile);

        $sql = "UPDATE usuario 
                SET direccion_user = ?, numero_user = ?, img_perfil = ?, contrasena_user = CASE
                WHEN ? IS NOT NULL THEN ?
                ELSE contrasena_user
                END
                WHERE id_user = ?";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sssssi", $dirr, $telf, $uploadedFile, $password, $password, $idUser);

        if ($stmt->execute()) {
            echo "Perfil Modificado Correctamente";
        } else {
            echo "Hubo un error al modificar perfil: " . $mysqli->error;
        }

    } else {
        $sql = "UPDATE usuario 
                SET direccion_user = ?, numero_user = ?, contrasena_user = CASE
                WHEN ? IS NOT NULL THEN ?
                ELSE contrasena_user
                END
                WHERE id_user = ?";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssssi", $dirr, $telf, $password, $password, $idUser);

        if ($stmt->execute()) {
            echo "Perfil Modificado Correctamente";
        } else {
            echo "Hubo un error al modificar perfil: " . $mysqli->error;
        }
    }

    $stmt->close();
}
?>