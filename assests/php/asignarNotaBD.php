<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "asignarNota") {
    asignarNota($mysqli);
}
function asignarNota($mysqli){
    //Agarrar los datos enviados
    $nota = $_POST['nota'];
    $retro = $_POST['retro'];
    $idUser = $_POST['idUser'];
    $id_act = $_POST['id_act'];
    $id_ent = $_POST['id_ent'];
    $id_cur = $_POST['id_cur'];

    // Validar campo. 
    if (empty($nota)) {
        echo "Debe enviar la nota de la actividad!!";
        exit;
    };

    // Preparar consulta SQL con el nuevo recurso
    $sql = "INSERT INTO notas (NotaAlumno, retroalimentacion, Usuario_id_user , Cursos_id_cur , Actividad_id_act, Entregas_id_entregas)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "dsisii", $nota, $retro, $idUser, $id_cur, $id_act, $id_ent);
    if (mysqli_stmt_execute($stmt)) {
        echo "Nota Asignada Correctamente";
    } else {
        echo "Hubo un error al asiganr la nota.";
    }

}
?> 