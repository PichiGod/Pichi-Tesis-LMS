<?php

require "../../assests/php/LoginBD.php";


if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];

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

    }

}

if (isset($_GET['id_cur'])) {
    $id_curso_seleccionado = $_GET['id_cur'];

    $consultaCurso = mysqli_query($mysqli, "SELECT cursos.nombre_cur, empresa.nombre_empresa
                                    FROM cursos 
                                    LEFT JOIN empresa ON empresa.id_empresa = cursos.Empresa_id_empresa
                                    WHERE id_cur = '$id_curso_seleccionado'");

    if (mysqli_num_rows($consultaCurso) > 0) {
        $datos3 = mysqli_fetch_assoc($consultaCurso);
        $curso = $datos3['nombre_cur'];
        $empresa = $datos3['nombre_empresa'];
    }

    $consultaCalificaciones = mysqli_query($mysqli, "SELECT a.Titulo, a.notaMinima, a.notaMaxima, a.activarPorcentaje, a.Porcentaje,
                                                       (SELECT n.NotaAlumno
                                                        FROM notas n
                                                        WHERE n.Actividad_id_act = a.idActividades AND n.Usuario_id_user = '$usuarios1') AS NotaAlumno,
                                                       (SELECT n.retroalimentacion
                                                        FROM notas n
                                                        WHERE n.Actividad_id_act = a.idActividades AND n.Usuario_id_user = '$usuarios1') AS retroalimentacion
                                                    FROM actividades a
                                                    WHERE a.idCurso_id_cur = '$id_curso_seleccionado'
                                                    AND a.visible = 0;");

    if (mysqli_num_rows($consultaCalificaciones) > 0) {
        while ($datosCalificaciones = mysqli_fetch_assoc($consultaCalificaciones)) {
            $Calificaciones[] = $datosCalificaciones;
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evaluaciones</title>
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
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="header_toggle" id="toggle1">
                    <i class="bx bx-menu" id="header-toggle"></i>
                </div>
                <a class="navbar-brand" href="../../index.php">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>

                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-flex">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!--Cambio de Idioma ver.Español-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" href="#">
                                    <span class="fa-solid fa-earth-americas me-2"></span>Español (Latino America)
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                                            href="viewCalif.php?id_cur=<?php echo $id_curso_seleccionado;?>">Inglés</a>
                                    </li>
                                </ul>
                            </li>
                            <!--Opciones de Usuario ver.Español-->
                            <li class="nav-item dropstart">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="../../assests/archivos/imagen/<?php echo $datos['img_perfil']; ?>" alt=""
                                        width="32" height="32" class="rounded-circle me-2" />
                                    <strong><?php echo $nombreUsuario . " " . $apellidoUsuario; ?></strong>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <a class="nav-link" href="verUser.php">Perfil</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li class="dropdown-item">
                                        <a class="nav-link log-out" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" href="">
                                            <i class="bx bx-log-out log-out-modal"></i>
                                            <span class="ms-2">Cerrar Sesión</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <div class="l-navbar bg-body-tertiary" id="nav-bar">
        <nav class="nav1">
            <div class="nav_list">
                <!-- <div class="nav_link1 visually-hidden" id="toggle2">
                    <i class="bx bx-menu" id="header-toggle2"></i>
                    <span class="nav_name">Cerrar</span>
                </div> -->
                <a href="Inicio.php" class="nav_link1 link-dark ">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Inicio</span>
                </a>
                <a href="tutorial.php" class="nav_link1 link-dark">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name">Tutorial</span>
                </a>
                <a href="cursos.php" class="nav_link1 link-dark">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <?php if ($rol == 0) { ?>
                    <a href="#" class="nav_link1 active">
                        <i class="bx bx-news nav_icon"></i>
                        <span class="nav_name">Evaluaciones</span>
                    </a>
                <?php }
                ; ?>
                <?php if ($rol != 0) { ?>
                    <a href="MenuAdmin.php" class="nav_link1 link-dark">
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

    <!--Contenido-->
    <section>
        <div class="container-fluid bg-blanco my-3 pb-3 shadow">
            <div class="container pt-4 mb-3 pb-3">


                <a href="verCurso.php?id_cur=<?php echo $id_curso_seleccionado; ?>"><i
                        class="fa-solid mt-2 fa-arrow-left" style="font-size:2rem;color:black;"></i></a>
                <p class="fs-1 pt-2"><strong>Calificaciones</strong></p>

                <select class="form-select mb-2" style="width: auto;" aria-label="Default select example" disabled>
                    <option selected><?php echo $curso; ?> - <?php echo $empresa; ?></option>
                    <!-- <option value="1">#0002 Progamacion en PHP - N1664</option>
                <option value="2">#0003 Programacion Web - N1664</option>
                <option value="3">#0004 Frances - N1664</option> -->
                </select>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Actividad</th>
                                <th scope="col">Ponderacion</th>
                                <th scope="col">Calificacion</th>
                                <th scope="col">Rango</th>
                                <th scope="col">Porcentaje</th>
                                <th scope="col">Retroalimentacion</th>
                                <!-- <th scope="col">Aporte total del curso</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($consultaCalificaciones) > 0) {
                                foreach ($Calificaciones as $calif):
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $calif['Titulo']; ?></th>
                                        <?php if ($calif['activarPorcentaje'] == "1") { ?>
                                            <td>-</td>
                                        <?php } else { ?>
                                            <td><?php echo $calif['Porcentaje']; ?>%</td>
                                        <?php }
                                        ; ?>
                                        <?php if ($calif['NotaAlumno'] == null) { ?>
                                            <td>-</td>
                                        <?php } else { ?>
                                            <td><?php echo $calif['NotaAlumno']; ?></td>
                                        <?php }
                                        ; ?>

                                        <td>1 - <?php echo $calif['notaMaxima']; ?></td>
                                        <td><?php echo (($calif['NotaAlumno'] * 100) / $calif['notaMaxima']) ?>%</td>
                                        <?php if ($calif['retroalimentacion'] == null) { ?>
                                            <td>-</td>
                                        <?php } else { ?>
                                            <td><?php echo $calif['retroalimentacion']; ?></td>
                                        <?php }
                                        ; ?>
                                        <!-- <td>20%</td> -->
                                    </tr>
                                <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
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

</html>