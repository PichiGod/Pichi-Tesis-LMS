<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];

    $conexion1 = mysqli_query($mysqli, "SELECT id_user, Empresa_id_empresa, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

    if (mysqli_num_rows($conexion1) > 0) {

        $datos = mysqli_fetch_assoc($conexion1);

        $empresaUsuario = $datos['Empresa_id_empresa'];

        $nombreUsuario = $datos['nombre_user'];

        $apellidoUsuario = $datos['apellido_user'];

        $idUser = $datos['id_user'];

        $conexion2 = mysqli_query($mysqli, "SELECT nombre_empresa FROM empresa WHERE id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion2) > 0) {

            $datos2 = mysqli_fetch_assoc($conexion2);

            $nombreEmpresa = $datos2['nombre_empresa'];

            $conexionObetenerUsuario = mysqli_query($mysqli, "SELECT id_curso, id_sala FROM usuariosala WHERE id_user = '$idUser'");

            if (mysqli_num_rows($conexionObetenerUsuario) > 0) {

                $datosObtener = mysqli_fetch_assoc($conexionObetenerUsuario);

                $id_curso_seleccionado = $datosObtener['id_curso'];

                $id_sala = $datosObtener['id_sala'];
            
                // Modificamos la consulta para hacer un JOIN con la tabla 'usuario'
                $conexion3 = mysqli_query($mysqli, "
                SELECT usuario.id_user, usuario.nombre_user, usuario.apellido_user, usuariosala.id_sala
                FROM usuariosala 
                JOIN usuario ON usuariosala.id_user = usuario.id_user 
                WHERE usuariosala.id_curso = '$id_curso_seleccionado'
            ");
 
                if (mysqli_num_rows($conexion3) > 0) {
                    while ($datos3 = mysqli_fetch_assoc($conexion3)) {
                        $usuariosSalaActualmente[] = $datos3;
                    }
                }

            }

        }

    }

}

if (!isset($_SESSION['id_user'])) {
    // Redirigir a la página de inicio de sesión o mostrar un mensaje de error
    echo "<script>
        alert('Tu sesión ha expirado. Por favor, entra a la sala si lo deseas nuevamente.');
    </script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat en Linea</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Boxicons icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- Font Awesome  icons (free version)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link rel="stylesheet" href="../../assests/css/colorPallete.css" />
    <link rel="stylesheet" href="../../assests/css/viewUser.css" />
    <link rel="stylesheet" href="../../assests/css/sidebar.css" />

    <!--Sidebar.js-->
    <script src="../../assests/js/sidebar.js"></script>
</head>

<body class="bg-pastel" id="body-pd">
    <!--- Navbar -->
    <header id="header">
        <nav class="navbar sticky-top bg-body-tertiary ">
            <div class="container-fluid ">

                <a class="navbar-brand" href="../../index.php">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>
                <span class="navbar-text fs-4 me-3">Chat en Linea</span>
            </div>
        </nav>
    </header>

    <div class="l-navbar bg-body-tertiary" id="nav-bar">
    <nav class="nav">
        <div class="nav_list" style="overflow: auto">
            <a href="javascript:;" class="nav_link link-dark">
                <i class="bx bx-menu nav_icon" id="header-toggle"></i>
                <span class="nav_name">Usuarios</span>
            </a>

            <div id="listaUsuarios">
                <!-- Aquí se agregarán los usuarios dinámicamente -->
            </div>

        </div>
    </nav>
</div>
    <!--Contenido ChatRoom-->
    <section>
        <div class="col py-3">
            <ul class="list-group-flush mb-5" id="mensajes">
            </ul>

            <div id="input-chat" class="container rounded p-1 bg-secondary-subtle"
                style="position: fixed; bottom: 0px;">
                <div class="form-inline">
                    <div class="d-flex">
                        <div class="input-group">
                            <input id="mensajeInput" type="text" class="form-control">
                            <button type="submit" class="btn btn-primary mx-1" onclick="enviarMensaje()">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
    var idSala = <?php echo $id_sala; ?>; // Asegúrate de pasar el id de la sala correctamente

    function obtenerUsuariosSala() {
        $.ajax({
            url: '../../assests/php/obtenerUsuariosSalaBD.php',
            type: 'post',
            data: { id_sala: idSala },
            success: function(response) {
                var usuarios = JSON.parse(response);
                var listaUsuarios = $('#listaUsuarios');
                listaUsuarios.empty();
                usuarios.forEach(function(usuario) {
                    listaUsuarios.append(
                        '<p href="#" class="nav_link link-dark">' +
                        '<img src="https://github.com/PichiGod.png" width="24" height="24" alt="...">' +
                        '<span><strong>' + usuario.nombre_user + ' ' + usuario.apellido_user + '</strong></span>' +
                        '</p>'
                    );
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener la lista de usuarios:', error);
            }
        });
    }

    // Llamar a la función obtenerUsuariosSala cada 5 segundos
    setInterval(obtenerUsuariosSala, 5000);

    // Obtener la lista de usuarios cuando se carga la página
    $(document).ready(function() {
        obtenerUsuariosSala();
    });
    </script>

<!-- Aquí colocas el script JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        obtenerMensajes(); // Llama a la función para obtener mensajes cuando se carga la página
        setInterval(obtenerMensajes, 5000); // Llama a la función obtenerMensajes cada 5 segundos
    });

    function obtenerMensajes() {
        var id_sala = <?php echo $id_sala; ?>;

        $.ajax({
            url: '../../assests/php/obtenerMensajes.php',
            type: 'GET',
            data: { id_sala: id_sala },
            success: function(response) {
                // Actualizar el área de mensajes con los mensajes obtenidos del servidor
                document.getElementById("mensajes").innerHTML = response;
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener los mensajes:', error);
            }
        });
    }

    function enviarMensaje() {
        // Obtener el mensaje ingresado por el usuario
        var mensaje = document.getElementById("mensajeInput").value;

        // Formatear el mensaje con el nombre del usuario y la hora actual
        var fecha = new Date();
        var hora = fecha.getHours();
        var minutos = fecha.getMinutes();
        var horaActual = (hora < 10 ? "0" : "") + hora + ":" + (minutos < 10 ? "0" : "") + minutos;
        var mensajeFormateado = `
          <li class="list-group-item bg-white p-1 my-1 rounded">
            <div id="userName" class="ms-2 text-break">
                <span><strong><?php echo $nombreUsuario . ' ' . $apellidoUsuario; ?></strong></span>
                <span>${horaActual}</span>
            </div>
            <div id="mensaje" class="ms-2 text-break">
                ${mensaje}
            </div>
        </li>
    `;
        // Crear un objeto con los datos del mensaje
        var data = {
            mensaje: mensajeFormateado,
            id_usuario: <?php echo $idUser; ?>, // Obtener el ID del usuario desde PHP
            id_sala: <?php echo $id_sala; ?> // Obtener el ID de la sala desde PHP
        };

        // Realizar la petición AJAX para enviar los datos al servidor
        $.ajax({
            url: '../../assests/php/enviarMensaje.php', // Ruta al archivo PHP que maneja la inserción del mensaje
            type: 'POST',
            data: data,
            success: function(response) {
                // Llamar a la función para obtener los mensajes y actualizar la vista
                obtenerMensajes();
            },
            error: function(xhr, status, error) {
                // Manejar el error en caso de que ocurra
                console.error('Error al enviar el mensaje:', error);
            }
        });

        // Limpiar el campo de entrada de texto
        document.getElementById("mensajeInput").value = "";
    }
</script>

<script>
// Variable para almacenar el temporizador
let inactivityTimer;

// Función para reiniciar el temporizador
function resetInactivityTimer() {
    clearTimeout(inactivityTimer);
    inactivityTimer = setTimeout(function() {
        // Obtener el ID de usuario desde alguna fuente, por ejemplo, una variable PHP
        var idUsuario = <?php echo $idUser; ?>;
        
        // Realizar una solicitud AJAX para desconectar al usuario
        $.ajax({
            url: '../../assests/php/salirSalaBD.php',
            type: 'POST',
            data: { id_user: idUsuario }, // Pasar el ID de usuario como dato POST
            success: function(response) {
                console.log('Usuario desconectado debido a inactividad.');
                // Mostrar mensaje de desconexión y redirigir
                alert('Has sido desconectado por inactividad. Por favor, inicia sesión nuevamente.');
                window.location.href = 'login.php'; // Redirigir a la página de inicio de sesión o cualquier otra página adecuada
            },
            error: function(xhr, status, error) {
                console.error('Error al desconectar al usuario:', error);
            }
        });
    }, 5 * 60 * 1000); // 5 minutos en milisegundos
}

// Función para manejar la actividad del usuario
function handleUserActivity() {
    resetInactivityTimer();
}

// Eventos para detectar la actividad del usuario
document.addEventListener('mousemove', handleUserActivity);
document.addEventListener('keypress', handleUserActivity);
document.addEventListener('click', handleUserActivity);

// Iniciar el temporizador al cargar la página
resetInactivityTimer();

</script>

<script>
window.addEventListener('beforeunload', function(event) {
// Envía una solicitud AJAX al servidor para eliminar al usuario de la tabla 'usuariosala'
var xhr = new XMLHttpRequest();
xhr.open('POST', '../../assets/php/salirSalaBD.php', true);
xhr.send();
});
</script>

</body>

</html>
