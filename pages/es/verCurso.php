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

if (isset($_GET['id_cur'])) {
    $id_curso_seleccionado = $_GET['id_cur'];

    $consultaActividades = mysqli_query($mysqli, "SELECT * FROM actividades WHERE idCurso_id_cur = '$id_curso_seleccionado'");

    if (mysqli_num_rows($consultaActividades) > 0) {
        while ($datosActividad = mysqli_fetch_assoc($consultaActividades)) {
            $Actividades[] = $datosActividad;

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ver Curso</title>
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
                                    href="../en/viewCourses.php">Inglés</a>
                            </li>
                        </ul>
                    </div>
                    <!--Opciones de Usuario ver.Español-->
                    <div class="vr me-3"></div>
                    <div class="btn-group dropstart me-4 pe-2">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/PichiGod.png" alt="" width="32" height="32"
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
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Tutorial</span>
                </a>
                <a href="verCurso.php" class="nav_link active">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <a href="verCalif.php" class="nav_link link-dark">
                    <i class="bx bx-news nav_icon"></i>
                    <span class="nav_name">Evaluaciones</span>
                </a>
                <a href="MenuAdmin.php" class="nav_link link-dark">
                    <i class="bx bx-cog nav_icon"></i>
                    <span class="nav_name">Administrar</span>
                </a>
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

        <div class="container-fluid bg-blanco mt-3 shadow">
            <!--Titulo-->
            <div class="container pt-4 pb-3">

                <div class="p-2 mb-2 rounded shadow ">
                    <h2><strong>Nombre del curso - Empresa</strong></h2>
                </div>

                <div class="p-2 my-4 rounded shadow ">
                    <h4>Esenciales (Para las cosas que siempre va a tener un curso. Osea el Foro y el chat)</h4>
                </div>

                <div class="item-recurso container bg-secondary-subtle text-secondary-emphasis mt-3 p-3">
                    <div>

                        <div>
                            <i class="fa-solid fa-user-tie me-2 p-3 rounded bg-warning-subtle"></i>

                            <span>Foro</span>
                        </div>
                    </div>
                </div>

                <div class="item-recurso container bg-secondary-subtle text-secondary-emphasis mt-3 p-3">
                    <div>

                        <div>
                            <i class="fa-solid fa-bullhorn me-2 p-3 rounded bg-warning-subtle"></i>

                            <span><a href="verChatLinea.php?id_cur=<?php echo $id_curso_seleccionado; ?>">Chat en Linea</a></span>
                        </div>
                    </div>
                </div>

                <div class="p-2 my-4 rounded shadow ">
                    <h4>Contenido de materia (Para recursos de tipo texto, archivo [word, powerpoint, img, etc.])</h4>
                </div>

                <div class="item-recurso d-flex container bg-secondary-subtle text-secondary-emphasis p-3">
                    <div class="">

                        <div class="">
                            <i class="fa-solid fa-note-sticky me-2 p-3 rounded bg-warning-subtle" witdh="35"
                                height="35"></i>
                            <span>Recurso o Documento</span>
                        </div>

                    </div>
                </div>

                <div class="p-2 my-4 rounded shadow ">
                    <h4>Actividades (Estrictamente para actividades de la materia como tareas/entregas)</h4>
                </div>

                 
                <?php 
                
                if (mysqli_num_rows($consultaActividades) > 0) {

                foreach($Actividades as $actividad): ?>
                <div class="item-recurso d-flex container bg-secondary-subtle text-secondary-emphasis p-3" style="padding: 10px;">
                    <div>
                        <div>
                            <i class="fa-solid fa-note-sticky me-2 p-3 rounded bg-warning-subtle" witdh="35" height="35"></i>
                            <span><a href=""><?php echo $actividad['Titulo'] ?></a></span>
                        </div>
                    </div>
                </div>
                <?php endforeach;
                }else{?>

                <div class="item-recurso d-flex container bg-secondary-subtle text-secondary-emphasis p-3" style="padding: 10px;">
                    <div>
                        <div>    
                        <span>No hay Actividades disponibles en este momento</span>
                        </div>
                    </div>
                </div>
                    

                <?php } ?>

                <div class="containerButtonCrearActividadFin">

                    <button type="button" class="botonRegresar btn btn-primary"
                        onclick="location.href='cursos.php'">Regresar</button>

                    <button type="button" class="botonCrearCursoFin btn btn-primary"
                        onclick="location.href='crearActividad.php?id_cur=<?php echo $id_curso_seleccionado; ?>'">
                        Crear Actividad
                    </button>


                </div>

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

<?php


?>

</html>