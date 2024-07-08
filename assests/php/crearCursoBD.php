<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] === "NuevoCurso") {

    crearCurso();

}

function crearCurso() {
    global $mysqli;

    // Obtener datos del formulario
    $IDcurso = $_POST['id_cur'];
    $nombreCurso = $_POST['nombreCurso'];
    $visibilidadCurso = $_POST['visibilidadCurso'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    // $inputperiodo = $_POST['inputperiodo'];
    $minimos = $_POST['minimos'];
    $maximos = $_POST['maximos'];

    if(isset($_POST['action2'])){

        $nombreEmpresa= $_POST['action2'];

    }



    // Validar que no haya campos vacíos Ps. Se quito input periodo de la validacion
    if (empty($IDcurso) || empty($nombreCurso) || empty($visibilidadCurso) || empty($fechaInicio) || empty($fechaFin) 
        || empty($minimos) || empty($maximos)){
        echo "Rellene todos los campos para completar el registro";
        exit;
    }

    if ($maximos <= 0 ){
        echo "El valor de maximos debe ser mayor a 0";
        exit;
    }

    if ($minimos <= 0 || $minimos >= $maximos){
        echo "El valor de minimos debe ser mayor a 0 o menor que cupos maximos.";
        exit;
    }

    // Convertir fecha de nacimiento al formato de la base de datos (YYYY-MM-DD)
    $fechaInicioBD = date('Y-m-d', strtotime(str_replace('/', '-', $fechaInicio)));
    $fechaFinBD = date('Y-m-d', strtotime(str_replace('/', '-', $fechaFin)));

    // Verificar si el usuario ya existe por su RIF
    $result = mysqli_query($mysqli, "SELECT id_cur, nombre_cur FROM cursos WHERE nombre_cur= '$nombreCurso'");
    if (mysqli_num_rows($result) > 0) {
        echo "Ya existe este nombre en tus cursos, por favor intente con otro nombre";
        exit;
    }

    // Consultar el id_empresa correspondiente al nombre_empresa seleccionado
    $queryEmpresa = "SELECT id_empresa FROM empresa WHERE nombre_empresa = '$nombreEmpresa'";
    $resultEmpresa = mysqli_query($mysqli, $queryEmpresa);

    if (!$resultEmpresa) {
        echo "Error al consultar la empresa";
        exit;
    }

    // Obtener el id_empresa
    $idEmpresa = null;
    if (mysqli_num_rows($resultEmpresa) > 0) {
        $rowEmpresa = mysqli_fetch_assoc($resultEmpresa);
        $idEmpresa = $rowEmpresa['id_empresa'];
    } else {
        echo "No se encontró la empresa especificada, no se pudo crear el curso";
        exit;
    }

    // Insertar nuevo usuario con el id_empresa correspondiente
    $query = "INSERT INTO cursos (id_cur, nombre_cur, fecha_inicio, cupos_cur_min, cupos_cur_max, Empresa_id_empresa, fecha_fin, visibilidad_curso) 
              VALUES ('$IDcurso', '$nombreCurso', '$fechaInicioBD', '$minimos', '$maximos', '$idEmpresa', '$fechaFinBD', '$visibilidadCurso')";

    if (mysqli_query($mysqli, $query)) {

        $query2 = "INSERT INTO sala (nombre_sala, id_curso) VALUES ('$IDcurso', '$IDcurso')";

        if (mysqli_query($mysqli, $query2)) {

        echo "¡Se ha creado un nuevo curso de forma exitosa!";

        }
        
    } else {
        echo "Error al crear nuevo curso: " . mysqli_error($mysqli);
    }
}
?>
