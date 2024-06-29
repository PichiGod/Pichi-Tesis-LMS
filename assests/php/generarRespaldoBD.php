<?php
//require "conexion.php";

//$emp = $_POST['emp'];

//Usar -p$db_password cuando se ponga en el hosting

// $command = "mysqldump -h $db_host -u $db_user  $db_database --where \"Empresa_id_empresa = $emp\" > respaldo.sql";

// exec($command, $output, $return_var);

// if ($return_var === 0) {
//     $filename = "respaldo.sql";
//     $filepath = $filename;
//     if (!file_exists($filepath)) {
//         echo "Error: File $filename does not exist";
//         exit;
//     }
//     if (!is_readable($filepath)) {
//         echo "Error: File $filename is not readable";
//         exit;
//     }
//     $filesize = filesize($filepath);
//     if ($filesize == 0) {
//         echo "Error: File $filename is empty";
//         exit;
//     }

//     header('Content-Type: application/octet-stream');
//     header('Content-Transfer-Encoding: binary');
//     header("Content-Disposition: attachment; filename=\"$filename\"");
//     // header('Content-Length: ' . $filesize);

//     ob_end_clean();
//     readfile($filename);
//     flush();

//     unlink($filename); // delete the file after sending it
//     exit;
// } else {
//     echo "Error creating backup: $return_var";
// }

//BORRAR

// Create a sample SQL query
$sql = "CREATE TABLE users (
  id INT PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255)
);

INSERT INTO users (id, name, email) VALUES
  (1, 'John Doe', 'john@example.com'),
  (2, 'Jane Doe', 'jane@example.com');";

// Create a file with the SQL query
$file_name = 'database_backup_' . date('YmdHis') . '.sql';
$file_path = __DIR__ . '/' . $file_name;
file_put_contents($file_path, $sql);

// Send the file to the browser for download
header('Content-Type: application/sql');
header('Content-Disposition: attachment; filename="' . $file_name . '"');
header('Content-Length: ' . filesize($file_path));
readfile($file_path);

// Remove the file from the server
unlink($file_path);

exit;

?>