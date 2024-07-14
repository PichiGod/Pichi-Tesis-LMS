<?php

session_start();
    //Docker
    $db_host = getenv('DB_HOST'); 
    $db_user = getenv('DB_USER'); 
    $db_password = getenv('DB_PASSWORD'); 
    $db_database = getenv('DB_DATABASE'); 

    $db_port = getenv('DB_PORT');

    if ($db_host === false || $db_user === false || $db_password === false || $db_database === false){
        $db_host = 'localhost'; 
        $db_user = 'root'; 
        $db_password = ''; 
        $db_database = 'pichi';
    }

$mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_database, $db_port);
 


?>