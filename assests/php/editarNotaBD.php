<?php
require "conexion.php";

if (isset($_POST['action']) && $_POST['action'] == "editarNota") {
    editarNota($mysqli);
}
function editarNota($mysqli){
    //Agarrar los datos enviados
    $nota = $_POST['nota'];
    $retro = $_POST['retro'];
    $idNota = $_POST['idNota'];

    // Validar campo. 
    if (empty($nota)) {
        echo "Debe enviar la nota de la actividad!!";
        exit;
    };

    // Preparar consulta SQL con el nuevo recurso
    $sql = "UPDATE notas
            SET NotaAlumno = ?, retroalimentacion = ?
            WHERE idNotas = ?";

    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "dsi", $nota, $retro, $idNota);
    if (mysqli_stmt_execute($stmt)) {
        echo "Nota Editada Correctamente";
    } else {
        echo "Hubo un error al asiganr la nota.";
    }

}
?> 