<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "CrearActividad") {
    crearActividad();
}

function crearActividad() {
    global $mysqli;

    // Obtener datos del formulario
    $titulo = $_POST['tituloActividad'];
    $contenido = $_POST['texto_actividad'];
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
    if (empty($titulo) || empty($fechaInicio) || empty($fechaFin) || empty($fechaNoti) || empty($maximo) || empty($notaMaxima) || empty($notaMinima) || empty($visibilidad) || empty($activarPorcentaje)) {
        echo "Debe completar todos los campos obligatorios.";
        exit;
    }

    // Manejar archivo principal
    $carpetaDestino = __DIR__ . "/";
    $archivoPrincipal = $_FILES['archivo']['name'];
    $extension = strtolower(pathinfo($archivoPrincipal, PATHINFO_EXTENSION));

    // Validar extensión del archivo
    if (!in_array($extension, ['pdf', 'doc', 'docx'])) {
        echo "Formato de archivo no permitido. Sube un PDF, DOC o DOCX.";
        exit;
    }

    // Mover archivo a carpeta de destino
    $archivoTemporal = $_FILES['archivo']['tmp_name'];
    if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $carpetaDestino . $archivoPrincipal)) {
        echo "Error al mover el archivo principal.";
        exit;
    }

    // Preparar fechas en formato YYYY-MM-DD para MySQL
    $fechaInicioMySQL = date('Y-m-d', strtotime($fechaInicio));
    $fechaFinMySQL = date('Y-m-d', strtotime($fechaFin));
    $fechaNotiMySQL = date('Y-m-d', strtotime($fechaNoti));

    // Preparar consulta SQL con la nueva actividad
    $sql = "INSERT INTO Actividades (Titulo, ContenidoAcitividad, archivosPrincipal, fechaInicio, fechaCulminacion, fechaNotificacion, pesoArchivo, notaMaxima, notaMinima, visible, activarPorcentaje, Porcentaje, idCurso_id_cur)
            VALUES ('$titulo', '$contenido', '$archivoPrincipal', '$fechaInicioMySQL', '$fechaFinMySQL', '$fechaNotiMySQL', '$maximo', '$notaMaxima', '$notaMinima', '$visibilidad', '$activarPorcentaje', '$porcentaje', '$id_curso')";


    if (mysqli_query($mysqli, $sql)) {
        echo "Nueva Actividad Creada Exitosamente";
    }else{

        echo "Hubo un error al crear la actividad";

    }
        
       

    }





?>
