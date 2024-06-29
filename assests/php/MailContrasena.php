<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

$mail = new PHPMailer(true);

$db_host = $_ENV["DB_HOST"];
$db_user = $_ENV['DB_USER'];
$db_password = $_ENV['DB_PASSWORD'];
$db_database = $_ENV['DB_DATABASE'];
$db_port = $_ENV['DB_PORT'];


if ($db_host === false || $db_user === false ||  $db_password === false || $db_database === false) {
    $db_host = 'localhost'; // Valor predeterminado para el host de la base de datos
    $db_user = 'root'; // Valor predeterminado para el usuario de la base de datos
    $db_password = ''; // Valor predeterminado para la contraseña de la base de datos
    $db_database = 'pichi'; // Valor predeterminado para el nombre de la base de datos
}

$mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_database, $db_port);

try {

$emailtxt = $_POST['txtEmail'];

if (empty($emailtxt)) {
    echo "Enter your email to recover password";
    exit;
}

$usuarios= mysqli_query($mysqli, "SELECT id, contrasena
FROM users 
WHERE email= '$emailtxt'");

if(mysqli_num_rows($usuarios)<=0){

    echo "The user's email does not exist in the database";

}else{

$datos = mysqli_fetch_assoc($usuarios);

$enviarContrasena = $datos['contrasena'];


    // Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'leninmartinezzz8@gmail.com';
    $mail->Password   = 'bgmz kmcc jsxm vulj';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Recipients
    $mail->setFrom('leninmartinezzz8@gmail.com', 'Pichi');
    $mail->addAddress($emailtxt);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Confirma tu cuenta en Pichi';

    // Diseño del correo
    $mensaje = '
        <html>
        <head>
            <link href="https://fonts.googleapis.com/css2?family=Belanosima&family=Mooli&family=Open+Sans&family=Roboto+Condensed:ital@0;1&family=Roboto:wght@100;300;400;900&family=Rubik&family=Tilt+Neon&display=swap" rel="stylesheet">
            <style>
                body {
                    font-family: "Open Sans", sans-serif;
                    background-color: #f7f7f7;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                }
                .container {
                    max-width: 650px;
                    padding: 20px;
                    background-color: #303133 !important;
                    margin-left: 10em;
                    border-radius: 10px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
                    text-align: center; /* Alinea el contenido en el centro */
                }
                h1 {
                    color: #007BFF;

                    justify-content: center;
                }
                p {
                    color: white;
                    margin: 20px 0;
                    justify-content: center;
                    font-size: 16px;
                }
                .button {
                    display: inline-block;
                    padding: 15px 30px;
                    background-color: #007BFF;
                    color: #fff;
                    text-decoration: none;
                    font-size: 16px;
                    border-radius: 5px;
                    transition: background-color 0.3s ease;
                }
                .button:hover {
                    background-color: #0056b3;
                    color: #fff
                }
                img{
                    max-width: 60%;
                    height: 10em;
                    display: block;
                    margin: 0 auto;
                    justify-content: center;
                }
                    @media screen and (max-width: 600px) {
                    /* Estilos para pantallas pequeñas */
                    .container {
                        max-width: 100%;
                        padding: 10px;
                        margin-left: 1em;
                    }
                    h1 {
                        font-size: 20px;
                        
                    }
                    p {
                        font-size: 14px;
                        
                    }
                    .button {
                        padding: 10px 20px;
                        max-width: 100%;
                        color: #fff

                    }

                    img {
                        max-width: 70%;
                        height: 10em;
                        display: block;
                        margin: 0 auto;
    
    
                    }
                }



                
            </style>
        </head>
        <body>
            <div class="container">
                <!----<img src="https://opensea-mining-web-production.up.railway.app/assets/img/logo.png" alt="Logo de OpenSea Mining">----->
                <h1>Recuperar Contraseña - Pichi</h1>
                <p>
                Si recibiste este correo de Pichi, este viene con el proposito de recuperar tu cuenta y crear una nueva contraseña. Si quiere seguir con el proceso entonces presione el boton para cambiar su contraseña.
                </p>
                <p>
                <a class="button" href="https://www.openseamining.app/CambiarContraseña.php?email=' . urlencode($emailtxt) . '">Recuperar cuenta</a>
                </p>
                <p>
                Si no solicitaste este correo, entonces contactenos en nuestro correo.<a href="mailto:lms.pichi@gmail.com">lms.pichi@gmail.com</a>
                </p>
            </div>
        </body>
        </html>
    ';

    $mail->Body = $mensaje;
    $mail->AltBody = 'Este es el cuerpo del correo en texto plano para clientes de correo que no admiten HTML';

    $mail->send();
    echo 'A verification message was sent to your email';

    

    exit();

            }

        }catch (Exception $e) {
    echo "There was an error sending the email: {$mail->ErrorInfo}";
}


?>