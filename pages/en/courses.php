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
    <title>Courses</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- Font Awesome  icons (free version)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link rel="stylesheet" href="../../assests/css/colorPallete.css" />
    <link rel="stylesheet" href="../../assests/css/viewUser.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../../assests/css/style (2).css">

</head>

<body class="bg-pastel" id="body-pd">
    <!--- Navbar -->
    <header id="header">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <div class="header_toggle">
                    <i class="bx bx-menu" id="header-toggle"></i>
                </div>
                <a class="navbar-brand" href="../index.html">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>

                <div class="d-flex justify-content-end">
                    <!--Cambio de Idioma ver.Ingles-->
                    <div class="vr me-2"></div>
                    <div class="nav-item dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                                href="#">English</a>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary"
                                    href="../es/registro.php">Spanish (Latin America)</a>
                            </li>
                        </ul>
                    </div>
                    <!--Opciones de Usuario ver.Ingles-->
                    <div class="vr me-3"></div>
                    <div class="btn-group dropstart me-4 pe-2">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/PichiGod.png" alt="" width="32" height="32"
                                class="rounded-circle me-2" />
                            <strong><?php echo $nombreUsuario . " " . $apellidoUsuario; ?></strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#">New project... (?)</a></li>
                            <li><a class="dropdown-item" href="#">Settings(?)</a></li>
                            <li>
                                <a class="dropdown-item" href="viewUser.php">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="../../assests/php/cerrarSesion.php">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <div class="l-navbar bg-body-tertiary" id="nav-bar">
        <nav class="nav">
            <div class="nav_list">
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Home</span>
                </a>
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="#" class="nav_link active ">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Courses</span>
                </a>
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-news nav_icon"></i>
                    <span class="nav_name">Evaluations</span>
                </a>
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-cog nav_icon"></i>
                    <span class="nav_name">Configuration</span>
                </a>
            </div>
        </nav>
    </div>

    <section class="Cursos">

        <div class="container-fluid bg-blanco mt-3 shadow w-75" style="margin-left: 20rem;">

            <h1 class="heading"><b>Currently Active Courses</b></h1>

            <div class="container-historial">

                <div class="cubo">

                    <h3 class="estatus-pago">Course Status: Active</h3>

                    <h3 class="fecha-pago">Date of Creation: </h3>

                    <h3 class="Referencia-pago">12/12/2023</h3>

                    <h3 class="monto-pago"><b>Ingles I</b></h3>

                    <button style="cursor: pointer;" type="submit" class="boton-detalles">View Course</button>

                </div>



                <div class="cubo">

                    <h3 class="estatus-pago">Course Status: Active</h3>

                    <h3 class="fecha-pago">Date of Creation:</h3>

                    <h3 class="Referencia-pago">12/12/2023</h3>

                    <h3 class="monto-pago"><b>Programación I</b></h3>

                    <button style="cursor: pointer;" type="submit" class="boton-detalles">View Course</button>

                </div>
                <div class="cubo">

                    <h3 class="estatus-pago">Course Status: Active</h3>

                    <h3 class="fecha-pago">Date of Creation:</h3>

                    <h3 class="Referencia-pago">12/12/2023</h3>

                    <h3 class="monto-pago"><b>Portugues Avanzado</b></h3>

                    <button style="cursor: pointer;" type="submit" class="boton-detalles">View Course</button>

                </div>
                <div class="cubo">

                    <h3 class="estatus-pago">Course Status: Active</h3>

                    <h3 class="fecha-pago">Date of Creation:</h3>

                    <h3 class="Referencia-pago">12/12/2023</h3>

                    <h3 class="monto-pago"><b>Italiano Intermedio</b></h3>

                    <button style="cursor: pointer;" type="submit" class="boton-detalles">View Course</button>

                </div>
            </div>

            <div class="containerButtonCrearCurso">

                <button type="button" class="botonCrearCurso btn btn-primary"
                    onclick="location.href='CreateCourse.php'">Create New Course</button>

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