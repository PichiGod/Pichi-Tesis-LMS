<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];

    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

    if (mysqli_num_rows($conexion1) > 0) {

        $datos = mysqli_fetch_assoc($conexion1);

        $empresaUsuario = $datos['Empresa_id_empresa'];

        $nombreUsuario = $datos['nombre_user'];

        $apellidoUsuario = $datos['apellido_user'];

        $conexion2 = mysqli_query($mysqli, "SELECT nombre_empresa FROM empresa WHERE id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion2) > 0) {

            $datos2 = mysqli_fetch_assoc($conexion2);

            $nombreEmpresa = $datos2['nombre_empresa'];

        }

    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ver Recurso</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- Font Awesome  icons (free version)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link rel="stylesheet" href="/Pichi-Tesis-LMS/assests/css/colorPallete.css" />
    <link rel="stylesheet" href="/Pichi-Tesis-LMS/assests/css/viewUser.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

</head>

<body class="bg-pastel">
    <!--- Navbar -->
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" href="../index.html">
                    <img src="/Pichi-Tesis-LMS/assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>
                <div class="d-flex justify-content-end">
                    <div class="vr me-2"></div>
                    <div class="dropdown me-4 pe-2">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/PichiGod.png" alt="" width="32" height="32"
                                class="rounded-circle me-2" />
                            <strong><?php echo $nombreUsuario . " " . $apellidoUsuario; ?></strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="viewUser.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="../../assests/php/cerrarSesion.php">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary float-start"
        style="width: 280px; height: 100vh; overflow: auto">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="inicio.php" class="nav-link link-dark" aria-current="page">
                    <span class="fa-solid fa-house me-2" witdh="16" height="16"></span>
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-table-columns me-2" witdh="16" height="16"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="cursos.php" class="nav-link active">
                    <i class="fa-solid fa-book me-2" witdh="16" height="16"></i>
                    Cursos
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark ">
                    <i class="fa-solid fa-newspaper me-2" witdh="16" height="16"></i>
                    Evaluaciones
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-gear me-2" witdh="16" height="16"></i>
                    Configuracion
                </a>
            </li>
        </ul>
    </div>

    <section class="Cursos">

        <div class="container-fluid bg-blanco mt-3 shadow w-75" style="margin-left: 20rem">
            <!--Titulo-->
            <div class="container pt-4 pb-3">

                <div class="p-2 mb-2 rounded shadow w-75">
                    <h2><strong>Nombre del Recurso - Seccion (Opcional)</strong></h2>
                </div>
                
                <p>Descripcion e Instrucciones del recurso</p>

                <hr>

                <div class="p-2 my-4 rounded shadow w-75">
                    <h4>Archivos del Recurso (El archivo[s] del recurso)</h4>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <i class="fa-solid fa-file"></i> <a class="ms-2" href="#">Archivo</a>
                    </li>
                </ul>

            </div>
        </div>

    </section>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>