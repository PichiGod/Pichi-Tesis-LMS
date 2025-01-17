<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];

    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, img_perfil, rol, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

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


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Curso</title>
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
    <link rel="stylesheet" href="../../assests/css/crearCurso.css">
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
                                <!-- ../en/modifPerfil.php -->
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                                            href="../en/createCourse.php">Inglés</a>
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
                <a href="Inicio.php" class="nav_link1 link-dark">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Inicio</span>
                </a>
                <a href="tutorial.php" class="nav_link1 link-dark">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name">Tutorial</span>
                </a>
                <a href="cursos.php" class="nav_link1 active">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
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

    <section class="crearCurso">

        <form action="" autocomplete="off" method="post">

            <input type="hidden" name="action" id="action" value="NuevoCurso">

            <input type="hidden" name="action2" id="action2" value="<?php echo $nombreEmpresa ?>">

            <div class="container-fluid bg-blanco mt-3 shadow">
                <a href="MenuAdmin.php"><i class="fa-solid mt-2 fa-arrow-left"
                        style="font-size:2rem;color:black;"></i></a>

                <div class="TituloCrearCurso">

                    <h3 class="TituloCrear"><b>Crear Nuevo Curso Activo</b></h3>

                </div>

                <div class="DivPrinFormulario">
                    <div class="divIDCrear">
                        <label for="id_cur">ID Curso</label>
                        <?php



                        // Consultar el último ID de curso utilizado
                        $consulta_ultimo_id = mysqli_query($mysqli, "SELECT MAX(id_cur) AS ultimo_id FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");

                        if ($consulta_ultimo_id) {
                            $datos_ultimo_id = mysqli_fetch_assoc($consulta_ultimo_id);
                            $ultimo_id = $datos_ultimo_id['ultimo_id'];

                            if ($ultimo_id) {
                                // Extraer los dos últimos dígitos numéricos del ID
                                $ultimo_numero = intval(substr($ultimo_id, strrpos($ultimo_id, '_') + 1));
                                $siguiente_numero = $ultimo_numero + 1;

                                // Generar el nuevo ID con el número siguiente
                                $nuevo_id_cur = 'Cur_' . $nombreEmpresa . '_' . sprintf('%02d', $siguiente_numero);
                            } else {
                                // Si no hay ningún ID anterior, comenzar desde 01
                                $nuevo_id_cur = 'Cur_' . $nombreEmpresa . '_01';
                            }
                        } else {
                            // Manejar el caso en que no se puede obtener el último ID
                            $nuevo_id_cur = 'Cur_01';
                        }
                        ?>
                        <input type="text" class="id_cur form-control" id="id_cur" name="id_cur"
                            value="<?php echo htmlspecialchars($nuevo_id_cur); ?>" readonly>
                    </div>


                    <div class="div1Crear">

                        <label for="">Nombre Completo del Curso</label>

                        <input type="text" class="nombreCurso form-control" id="nombreCurso" name="nombreCurso"
                            placeholder="Nombre del Curso">

                    </div>



                    <div class="div2Crear">

                        <label for="">Visibilidad del Curso</label>

                        <select class="visibilidadCurso seleccion form-select" id="visibilidadCurso"
                            name="visibilidadCurso" aria-label="Default select example">
                            <option selected>Visible</option>
                            <option value="Invisible">Invisible</option>
                        </select>

                    </div>


                    <div class="div3Crear">

                        <label for="">Fecha de Inicio</label>

                        <input type="date" class="fechaInicio form-control" id="fechaInicio" name="fechaInicio">

                    </div>


                    <div class="div4Crear">

                        <label for="">Fecha de Culminación</label>

                        <input type="date" class="fechaFin form-control" id="fechaFin" name="fechaFin">

                    </div>

                    <!-- <div class="div45Crear">

                        <label for="">Nombre del periodo</label>

                        <input type="text" class="inputperiodo form-control" id="inputperiodo" name="inputperiodo"
                            placeholder="Nombre del periodo">

                    </div> -->


                    <div class="div5Crear">

                        <label for="">Cupos Minimos del Curso</label>

                        <input type="number" class="minimos form-control" id="minimos" name="minimos" placeholder="0">

                    </div>


                    <div class="div6Crear">

                        <label for="">Cupos Maximos del Curso</label>

                        <input type="number" class="maximos form-control" id="maximos" name="maximos" placeholder="0">

                    </div>


                </div>


                <div class="containerButtonCrearCursoFin">

                    <button type="button" class="botonRegresar btn btn-primary"
                        onclick="location.href='cursos.php'">Regresar</button>

                    <button type="button" class="botonCrearCursoFin btn btn-primary" onclick="submitData();">Crear
                        Curso</button>


                </div>


            </div>

        </form>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <?php require "../../assests/php/crearCursoMain.php"; ?>

</body>

</html>