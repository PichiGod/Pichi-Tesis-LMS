<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "CrearActividad") {
    crearActividad();
}

function crearActividad()
{
    global $mysqli;

    // Obtener datos del formulario
    $titulo = $_POST['tituloActividad'];
    $contenido = $_POST['texto_actividad']; // Cambio: Obtener el contenido del editor Quill
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $fechaNoti = $_POST['fechaNoti'];
    $maximo = $_POST['maximo'];
    $notaMaxima = $_POST['notaMaxima'];
    $notaMinima = $_POST['notaMinima'];
    $visibilidad = $_POST['visibilidadActividad'];
    $activarPorcentaje = $_POST['selectActivarPorcentaje'];
    $porcentaje = $_POST['porcentajeActividad'];
    $id_curso = $_POST['actionID_CUR']; // ID del curso seleccionado

    // Validar campos obligatorios
    if (empty($contenido) || empty($fechaInicio) || empty($fechaFin) || empty($fechaNoti) || empty($maximo) || empty($notaMaxima) || empty($notaMinima) || empty($visibilidad) || empty($activarPorcentaje)) {
        echo "Debe completar todos los campos obligatorios.";
        //echo $contenido;
        exit;
    }

    // Manejar archivo principal
    $carpetaDestino = "../archivos/actividades/";
    //Railway
    if (!file_exists($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }
    $archivoPrincipal = isset($_FILES['archivo']['name']) ? $_FILES['archivo']['name'] : null;
    $archivoAdicional = isset($_FILES['archivo1']['name']) ? $_FILES['archivo1']['name'] : null;

    // Validar extensión del archivo principal
    if (!empty($archivoPrincipal)) {
        $extension = strtolower(pathinfo($archivoPrincipal, PATHINFO_EXTENSION));
        if (!in_array($extension, ['pdf', 'doc', 'docx'])) {
            echo "Formato de archivo principal no permitido. Sube un PDF, DOC o DOCX.";
            exit;
        } else {
            if (preg_match('/[^a-zA-Z0-9\.]/', $archivoPrincipal)) {
                echo 'El archivo contiene caracteres especiales. Por favor, cambie el nombre al archivo.';
                exit;
            }
            $archivoPrincipal = NULL;
        }
    }

    // Validar extensión del archivo adicional si no está vacío
    if (!empty($archivoAdicional)) {
        $extension2 = strtolower(pathinfo($archivoAdicional, PATHINFO_EXTENSION));
        if (!in_array($extension2, ['pdf', 'doc', 'docx'])) {
            echo "Formato de archivo adicional no permitido. Sube un PDF, DOC o DOCX.";
            exit;
        }
    } else {
        if (preg_match('/[^a-zA-Z0-9\.]/', $archivoAdicional)) {
            echo 'El archivo contiene caracteres especiales. Por favor, cambie el nombre al archivo.';
            exit;
        }
        $archivoAdicional = NULL;
    }

    // Mover archivo principal a carpeta de destino
    if (!empty($archivoPrincipal)) {
        // Set permissions for the upload directory
        chmod($carpetaDestino, 0777);
        if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $carpetaDestino . $archivoPrincipal)) {
            echo "Error al mover el archivo principal.";
            exit;
        }
    }

    // Mover archivo adicional a carpeta de destino si no está vacío
    if (!empty($archivoAdicional)) {
        // Set permissions for the upload directory
        chmod($carpetaDestino, 0777);
        if (!move_uploaded_file($_FILES['archivo1']['tmp_name'], $carpetaDestino . $archivoAdicional)) {
            echo "Error al mover el archivo adicional.";
            exit;
        }
    }

    // Preparar fechas en formato YYYY-MM-DD para MySQL
    $fechaInicioMySQL = date('Y-m-d', strtotime($fechaInicio));
    $fechaFinMySQL = date('Y-m-d', strtotime($fechaFin));
    $fechaNotiMySQL = date('Y-m-d', strtotime($fechaNoti));

    // Preparar consulta SQL con la nueva actividad
    $sql = "INSERT INTO Actividades (Titulo, ContenidoAcitividad, archivosPrincipal, archivosAdicional, fechaInicio, fechaCulminacion, fechaNotificacion, pesoArchivo, notaMaxima, notaMinima, visible, activarPorcentaje, Porcentaje, idCurso_id_cur)
            VALUES ('$titulo', '$contenido', '$archivoPrincipal', " . ($archivoAdicional ? "'$archivoAdicional'" : "NULL") . ", '$fechaInicioMySQL', '$fechaFinMySQL', '$fechaNotiMySQL', '$maximo', '$notaMaxima', '$notaMinima', '$visibilidad', '$activarPorcentaje', '$porcentaje', '$id_curso')";

    if (mysqli_query($mysqli, $sql)) {
        echo "Nueva Actividad Creada Exitosamente";
    } else {
        echo "Hubo un error al crear la actividad.";
    }
}
?>