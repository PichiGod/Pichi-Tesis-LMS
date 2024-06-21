<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];

    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, rol, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

    if (mysqli_num_rows($conexion1) > 0) {

        $datos = mysqli_fetch_assoc($conexion1);

        $empresaUsuario = $datos['Empresa_id_empresa'];

        $nombreUsuario = $datos['nombre_user'];

        $apellidoUsuario = $datos['apellido_user'];

        $rol = $datos['rol'];

        $conexion2 = mysqli_query($mysqli, "SELECT nombre_empresa FROM empresa WHERE id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion2) > 0) {

            $datos2 = mysqli_fetch_assoc($conexion2);

            $nombreEmpresa = $datos2['nombre_empresa'];

        }

    }

}

if (isset($_GET['id_cur']) && isset($_GET['id_rec'])) {
    $id_curso_seleccionado = $_GET['id_cur'];
    $id_recurso_seleccionado = $_GET['id_rec'];

    $consultaCurso = mysqli_query($mysqli, "SELECT cursos.nombre_cur, empresa.nombre_empresa
                                    FROM cursos 
                                    LEFT JOIN empresa ON empresa.id_empresa = cursos.Empresa_id_empresa
                                    WHERE id_cur = '$id_curso_seleccionado'");

    if (mysqli_num_rows($consultaCurso) > 0) {
        $datos3 = mysqli_fetch_assoc($consultaCurso);
        $curso = $datos3['nombre_cur'];
        $empresa = $datos3['nombre_empresa'];
    }

    $consultaRecursos = mysqli_query($mysqli, "SELECT * FROM recursos WHERE id_cur = '$id_curso_seleccionado' AND id_recursos = '$id_recurso_seleccionado'");
    if (mysqli_num_rows($consultaRecursos) > 0) {
        $datosrecurso = mysqli_fetch_assoc($consultaRecursos);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
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
                                    href="../en/viewResource.php">Inglés</a>
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

    <!-- Modal -->
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
                <a href="cursos.php" class="nav_link active">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <a href="verCalif.php?id_cur=<?php echo $id_curso_seleccionado; ?>" class="nav_link link-dark">
                    <i class="bx bx-news nav_icon"></i>
                    <span class="nav_name">Evaluaciones</span>
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

    <section class="Cursos">

        <div class="container-fluid bg-blanco my-3 p-3 rounded shadow">
            <!--Titulo-->
            <div class="container">
                <a href="verCurso.php?id_cur=<?php echo $id_curso_seleccionado; ?>"><i
                        class="fa-solid mt-2 fa-arrow-left" style="font-size:2rem;color:black;"></i></a>

                <div class="p-2 mb-2 rounded shadow ">
                    <h2><strong><?php echo $datosrecurso['nombre_recurso'] ?> - <?php echo $empresa; ?></strong></h2>
                </div>

                <div class="p-2 mb-2 border bg-white rounded">
                    <p class="mb-0">
                    <div class="mx-2">
                        <?php echo $datosrecurso['descripcion_recurso']; ?>
                    </div>
                    </p>
                </div>

                <hr>

                <div class="p-2 my-4 rounded shadow ">
                    <h4>Archivos del Recurso</h4>
                </div>
                <ul class="list-group mb-1">
                    <?php if ($datosrecurso['archivo'] == null && $datosrecurso['archivoAdicional'] == null) { ?>

                        <li class="list-group-item">
                            No hay archivos disponibles
                        </li>
                    <?php } elseif ($datosrecurso['archivo'] != null) { ?>

                        <?php
                        $archivo = $datosrecurso['archivo'];
                        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                        if ($extension == 'doc' || $extension == 'docx') {
                            $icon = '<i class="fa-solid fa-file-word"></i>';
                        } elseif ($extension == 'pdf') {
                            $icon = '<i class="fa-solid fa-file-pdf"></i>';
                        } else {
                            $icon = '<i class="fa-solid fa-file"></i>';
                        }
                        ?>

                        <li class="list-group-item">
                            <?= $icon ?> <a class="ms-2" target="_blank" rel="noopener noreferrer"
                                href="../../assests/php/descargarRecurso.php?file_name=<?= $archivo ?>&id_rec=<?= $id_recurso_seleccionado; ?>"><?= $archivo ?></a>
                        </li>

                    <?php }
                    ;
                    if ($datosrecurso['archivoAdicional'] != null) { ?>
                        <?php
                        $archivoAdicional = $datosrecurso['archivoAdicional'];
                        $extensionAdicional = pathinfo($archivoAdicional, PATHINFO_EXTENSION);
                        if ($extensionAdicional == 'doc' || $extensionAdicional == 'docx') {
                            $iconAdicional = '<i class="fa-solid fa-file-word"></i>';
                        } elseif ($extensionAdicional == 'pdf') {
                            $iconAdicional = '<i class="fa-solid fa-file-pdf"></i>';
                        } else {
                            $iconAdicional = '<i class="fa-solid fa-file"></i>';
                        }
                        ?>

                        <li class="list-group-item">
                            <?= $iconAdicional ?> <a class="ms-2" target="_blank" rel="noopener noreferrer"
                                href="../../assests/php/descargarRecurso.php?file_name=<?= $archivoAdicional ?>&id_rec=<?= $id_recurso_seleccionado; ?>"><?= $archivoAdicional ?></a>
                        </li>
                    <?php }
                    ; ?>
                </ul>

                <button class="btn btn-primary mt-2"
                    onclick="location.href='verCurso.php?id_cur=<?php echo $id_curso_seleccionado; ?>'">Regresar
                </button>

                <?php if ($rol != 0) { ?>
                    <div>
                        <hr>
                        <button
                            onclick="location.href='editarRecurso.php?id_rec=<?php echo $id_recurso_seleccionado; ?>&id_cur=<?php echo $id_curso_seleccionado; ?>'"
                            class="btn btn-primary">Editar
                            Recurso</button>
                        <button onclick="confirmarElim(<?php echo $id_recurso_seleccionado; ?>);"
                            class="btn btn-outline-danger">Eliminar Recurso</button>
                    </div>
                <?php }
                ; ?>

            </div>
        </div>

    </section>

    <script>
        function confirmarElim(id) {
            confirmar = confirm("Esta seguro que quiere eliminar el recurso?");
            if (confirmar == true) {
                //Codigo para eliminar el recurso
                eliminarRecurso(id);
                alert('Se ha eliminado el recurso correctamente');
                window.location.href = "verCurso.php?id_cur=<?php echo $id_curso_seleccionado; ?>";

            }
        }
    </script>

    <?php require "../../assests/php/borrarRecursoMain.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>