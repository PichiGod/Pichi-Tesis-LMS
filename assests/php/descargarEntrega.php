<?php
require "conexion.php";

// Get the file ID or name from the database
$file_name = $_GET['file_name']; // or $_GET['file_name']

// Query the database to retrieve the file
$query = "SELECT archivo FROM entregas WHERE archivo = '$file_name'";
$result = mysqli_query($mysqli, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $file_route = "../archivos/entregas/$file_name";

    // Check if the file exists
    if (file_exists($file_route)) {
        // Read the file contents
        $file_contents = file_get_contents($file_route);

        // Output the file contents to the browser
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
        header('Content-Length: ' . strlen($file_contents));
        // Output the file contents
        echo $file_contents;
        exit;
    } else {
        echo "<html><body><script>alert('Archivo no encontrado'); window.close();</script></body></html>";
        exit;
    }

} else {
    $query = "SELECT archivoAdicional FROM entregas WHERE archivoAdicional = '$file_name'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $file_route = "../archivos/entregas/$file_name";

        // Check if the file exists
        if (file_exists($file_route)) {
            // Read the file contents
            $file_contents = file_get_contents($file_route);

            // Output the file contents to the browser
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
            header('Content-Length: ' . strlen($file_contents));
            // Output the file contents
            echo $file_contents;
            exit;
        } else {
            echo "<html><body><script>alert('Archivo no encontrado'); window.close();</script></body></html>";
            exit;
        }
    }
}
?>