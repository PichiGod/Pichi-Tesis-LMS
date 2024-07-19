<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user']) && isset($_SESSION['usuariosActive'])) {

    $usuarios1 = $_SESSION['id_user'];

    $usuariosActivos = $_SESSION['usuariosActive'];

    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, rol, img_perfil, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

    if (mysqli_num_rows($conexion1) > 0) {

        $datos = mysqli_fetch_assoc($conexion1);

        $empresaUsuario = $datos['Empresa_id_empresa'];

        $rol = $datos['rol'];

        $nombreUsuario = $datos['nombre_user'];

        $apellidoUsuario = $datos['apellido_user'];

        $conexion2 = mysqli_query($mysqli, "SELECT nombre_empresa FROM empresa WHERE id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion2) > 0) {

            $datos2 = mysqli_fetch_assoc($conexion2);

            $nombreEmpresa = $datos2['nombre_empresa'];

        }

        $conexion3 = mysqli_query($mysqli, "SELECT * FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion3) > 0) {

            $cursosCantidad = mysqli_num_rows($conexion3);

        } else {

            $cursosCantidad = 0;

        }

    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage</title>
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
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <div class="header_toggle">
                    <i class="bx bx-menu" id="header-toggle"></i>
                </div>
                <a class="navbar-brand" href="../../index.html">
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
                                    href="../es/MenuAdmin.php">Spanish (Latin America)</a>
                            </li>
                        </ul>
                    </div>
                    <!--Opciones de Usuario ver.Ingles-->
                    <div class="vr me-3"></div>
                    <div class="btn-group dropstart me-4 pe-2">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../../assests/archivos/imagen/<?php echo $datos['img_perfil']; ?>" alt="..."
                                width="32" height="32" class="rounded-circle me-2" />
                            <strong><?php echo $nombreUsuario . " " . $apellidoUsuario; ?></strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li>
                                <a class="dropdown-item" href="viewUser.php">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="btn dropdown-item log-out" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" href="">
                                    <i class="bx bx-log-out log-out-modal"></i>
                                    <span class="ms-2">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar ver.Ingles-->
    <div class="l-navbar bg-body-tertiary" id="nav-bar">
        <nav class="nav">
            <div class="nav_list">
                <a href="home.php" class="nav_link link-dark">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Home</span>
                </a>
                <a href="tutoIngles.php" class="nav_link link-dark">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Tutorial</span>
                </a>
                <a href="courses.php" class="nav_link link-dark">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Courses</span>
                </a>
                <?php if ($rol != 0) { ?>
                    <a href="#" class="nav_link active">
                        <i class="bx bx-cog nav_icon"></i>
                        <span class="nav_name">Manage</span>
                    </a>
                <?php }
                ; ?>
            </div>
        </nav>
    </div>

    <!-- Modal ver.Ingles-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Log Out
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to Log out?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Return
                    </button>
                    <button type="button" onclick="location.href='../../assests/php/cerrarSesion.php'"
                        class="btn btn-primary">Log Out</button>
                </div>
            </div>
        </div>
    </div>

    <!--Contenido-->
    <section>
        <div class="container-fluid bg-blanco my-3 pb-2 shadow">
            <h1 class="text-center">Manage</h1>
            <h3 class="text-center">(<?php echo $nombreEmpresa ?>)</h3>

            <br>
            <div class="row justify-content-center align-items-center g-1 mb-3">
                <label for="usuario">Manage Users</label>
                <hr>
                <div id="usuario" class="col">
                    <?php if ($rol == 2) { ?>
                        <button onclick="location.href='insertUser.php'" class="btn btn-secondary">
                            Register User
                        </button>
                        <button onclick="location.href='enrollUser.php'" class="btn btn-secondary">
                            Enroll Course
                        </button>
                        <button onclick="#" class="btn btn-secondary">
                            Activate/Deactivate Student
                        </button>
                    <?php }
                    ; ?>
                    <button onclick="location.href='manageUser.php'" class="btn btn-secondary">
                        Manage Users
                    </button>
                    <button class="btn btn-secondary">Review Academic Performance</button>
                </div>
            </div>

            <?php if ($rol == 2) { ?>
                <div class="row justify-content-center align-items-center g-1 mb-3">
                    <label for="cursos">Manage Courses</label>
                    <hr>
                    <div id="cursos" class="col">
                        <button onclick="location.href='createCourse.php'" class="btn btn-secondary">Create Course</button>
                        <button onclick="location.href='manageCourse.php'" class="btn btn-secondary">Manage
                            Courses</button>
                        <button onclick="location.href='courseStatus.php'" class="btn btn-secondary">Course
                            visibility/availability</button>
                        <button onclick="location.href='assignTeacher.php'" class="btn btn-secondary">Assign
                            Teacher</button>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center g-1 mb-3">
                    <label for="cursos">Academic Period</label>
                    <hr>
                    <div id="cursos" class="col">
                        <button class="btn btn-secondary">Create new academic period</button>
                        <button class="btn btn-secondary">Edit academic period</button>
                        <button class="btn btn-secondary">View academic periods</button>
                    </div>
                </div>

                <!-- Modal Reportes-->
                <div class="modal fade" id="reportes" tabindex="-1" aria-labelledby="reportes" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="reportes">Menu Reporte</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Select a report to generate
                            </div>
                            <div class="modal-footer">
                                <a href="../../../assests/Reportes/reporteUsuarios.php" target="_blank"
                                    class="btn btn-secondary me-2">User Report</a>
                                <a href="../../../assests/Reportes/reporteCursos.php" target="_blank"
                                    class="btn btn-secondary me-2">Course Report</a>
                                <a href="../../../assests/Reportes/reporteNotas.php" target="_blank"
                                    class="btn btn-secondary me-2">Grade Report</a>
                                <a href='../../../assests/Reportes/reportes.php' target="_blank"
                                    class="btn btn-secondary me-2">General Report
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center g-1 mb-3">
                    <label for="cursos">Report and backup</label> <!-- y respaldo--->
                    <hr>
                    <div id="cursos" class="col">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#reportes"
                            class="btn btn-secondary">Generate
                            Report</button>
                        <button onclick="generarRespaldo(<?php echo $empresaUsuario; ?>)" class="btn btn-secondary">Generate
                            Backup</button>
                    </div>
                </div>
            <?php }
            ; ?>


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