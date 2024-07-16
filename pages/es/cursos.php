<?php

require "../../assests/php/LoginBD.php";

$cursos = [];

if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];

    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, rol, img_perfil, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

    if (mysqli_num_rows($conexion1) > 0) {

        $datos = mysqli_fetch_assoc($conexion1);

        $rol = $datos['rol'];

        $empresaUsuario = $datos['Empresa_id_empresa'];

        $nombreUsuario = $datos['nombre_user'];

        $apellidoUsuario = $datos['apellido_user'];

        $conexion2 = mysqli_query($mysqli, "SELECT nombre_empresa FROM empresa WHERE id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion2) > 0) {

            $datos2 = mysqli_fetch_assoc($conexion2);

            $nombreEmpresa = $datos2['nombre_empresa'];

            if ($rol == 2) {
                $conexion3 = mysqli_query($mysqli, "SELECT * FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");

                if (mysqli_num_rows($conexion3) > 0) {
                    while ($datos3 = mysqli_fetch_assoc($conexion3)) {
                        $cursos[] = $datos3;

                    }

                }
            } else {
                $conexion3 = mysqli_query(
                    $mysqli,
                    "SELECT i.solvencia_estu, 
                c.id_cur, c.nombre_cur, c.fecha_inicio, c.cupos_cur_min, c.cupos_cur_max, c.fecha_fin, c.visibilidad_curso
                FROM cursos c
                LEFT JOIN inscripcion i ON i.Cursos_id_cur = c.id_cur 
                WHERE Empresa_id_empresa = '$empresaUsuario' AND i.Usuario_id_user = '$usuarios1'"
                );

                if (mysqli_num_rows($conexion3) > 0) {
                    while ($datos3 = mysqli_fetch_assoc($conexion3)) {
                        $cursos[] = $datos3;

                    }

                }
            }

        }

    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cursos</title>
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
    <link rel="stylesheet" href="../../assests/css/style (2).css">
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
                <a class="navbar-brand" href="../../index.php">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>

                <div class="d-flex flex-wrap justify-content-end">
                    <!--Cambio de Idioma ver.Español-->
                    <div class="vr me-2"></div>
                    <div class="nav-item dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary"
                                href="#">Español (Latino America)</a>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                                    href="../en/courses.php">Inglés</a>
                            </li>
                        </ul>
                    </div>
                    <!--Opciones de Usuario ver.Español-->
                    <div class="vr me-3"></div>
                    <div class="btn-group dropstart me-4 pe-2">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../../assests/archivos/imagen/<?php echo $datos['img_perfil'];?>" alt="" width="32" height="32"
                                class="rounded-circle me-2" />
                            <strong><?php echo $nombreUsuario . " " . $apellidoUsuario; ?></strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li>
                                <a class="dropdown-item" href="verUser.php">Perfil</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="btn dropdown-item log-out" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" href="">
                                    <i class="bx bx-log-out log-out-modal"></i>
                                    <span class="ms-2">Cerrar Sesión</span>
                                </a>
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
                <a href="Inicio.php" class="nav_link link-dark">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Inicio</span>
                </a>
                <a href="tutorial.php" class="nav_link link-dark">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name">Tutorial</span>
                </a>
                <a href="#" class="nav_link active">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <?php if ($rol != 0) { ?>
                    <a href="MenuAdmin.php" class="nav_link link-dark">
                        <i class="bx bx-cog nav_icon"></i>
                        <span class="nav_name">Administrar</span>
                    </a>
                <?php }
                ; ?>
            </div>
        </nav>
    </div>

    <!-- Modal LogOut ver.Español -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Cerrar Sesión
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Esta seguro que quiere cerrar sesión?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Regresar
                    </button>
                    <button type="button" onclick="location.href='../../assests/php/cerrarSesion.php'"
                        class="btn btn-primary">Cerrar Sesión</button>
                </div>
            </div>
        </div>
    </div>

    <section class="Cursos">
        <div class="container-fluid bg-blanco pb-3 my-3 shadow">
            <h1 class="heading"><b>Cursos Activos Actualmente</b></h1>

            <div class="container">
                <div class="row gy-3 mb-4">
                    <?php foreach ($cursos as $curso) { ?>
                        <?php if ($curso['visibilidad_curso'] == "Visible" && $rol == "0" || $rol == "1") { ?>
                            <div class="col">
                                <div class="card" style="width: 18rem">
                                    <div class="card-body">
                                        <?php
                                        // Determinar la clase de fondo según la visibilidad del curso
                                        $bgClass = ($curso['visibilidad_curso'] == 'Invisible') ? 'bg-danger' : 'bg-success';
                                        ?>
                                        <span class="card-text text-bg-success rounded p-1 fs-6 <?php echo $bgClass; ?>">Estatus
                                            del curso: <?php echo $curso['visibilidad_curso']; ?></span>
                                        <p class="mt-2 card-text text-end">Fecha de Creación:</p>
                                        <p class="card-text text-end"><?php echo $curso['fecha_inicio']; ?></p>
                                        <h4 class="card-title text-start"><?php echo $curso['nombre_cur']; ?></h4>
                                        <?php if (isset($curso['solvencia_estu']) && $curso['solvencia_estu'] == "1") { ?>
                                            <button class="btn btn-primary mt-2" onclick="aviso();">
                                                Ver Curso
                                            </button>
                                        <?php } else { ?>
                                            <a class="btn btn-primary mt-2"
                                                href="verCurso.php?id_cur=<?php echo $curso['id_cur']; ?>">Ver Curso</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } elseif ($rol != 0) { ?>
                            <div class="col">
                                <div class="card" style="width: 18rem">
                                    <div class="card-body">
                                        <?php
                                        // Determinar la clase de fondo según la visibilidad del curso
                                        $bgClass = ($curso['visibilidad_curso'] == 'Invisible') ? 'bg-danger' : 'bg-success';
                                        ?>
                                        <span class="card-text text-bg-success rounded p-1 fs-6 <?php echo $bgClass; ?>">Estatus
                                            del curso: <?php echo $curso['visibilidad_curso']; ?></span>
                                        <p class="mt-2 card-text text-end">Fecha de Creación:</p>
                                        <p class="card-text text-end"><?php echo $curso['fecha_inicio']; ?></p>
                                        <h4 class="card-title text-start"><?php echo $curso['nombre_cur']; ?></h4>
                                        <a class="btn btn-primary mt-2"
                                            href="verCurso.php?id_cur=<?php echo $curso['id_cur']; ?>">Ver Curso</a>

                                    </div>
                                </div>
                            </div>
                        <?php }
                        ; ?>
                    <?php } ?>
                </div>
            </div>

            <?php if ($rol == 2) { ?>
                <div class="containerButtonCrearCurso">
                    <button type="button" class="botonCrearCurso btn btn-primary" onclick="location.href='crearCurso.php'">
                        Crear Nuevo Curso
                    </button>
                </div>
            <?php }
            ; ?>
        </div>
    </section>

    <script>
        function aviso() {
            alert('Usuario, usted no esta solvente para ver este curso.');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>