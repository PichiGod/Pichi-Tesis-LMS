<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user']) && isset($_SESSION['usuariosActive'])) {

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

        $conexion3 = mysqli_query($mysqli, "SELECT * FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion3) > 0) {

            while ($datos3 = mysqli_fetch_assoc($conexion3)) {
                $cursos[] = $datos3;

            }

            $usuariosActivos= mysqli_query($mysqli, "SELECT Active_online FROM usuario WHERE Empresa_id_empresa = '$empresaUsuario' AND Active_online = '1'");

    if (mysqli_num_rows($usuariosActivos)>0){

         $usuarioResult = mysqli_num_rows($usuariosActivos);

         }

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
    <title>Inicio - Pichi</title>
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

    <style>
        /* Oval 1 */
        .oval {
            /* position: absolute;
            top: 54px;
            left: 105px; */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 133px;
            height: 126px;
            opacity: 90%;
            background-color: rgb(255, 255, 255, 0.7);
            /* white */
            border-radius: 50%;
            border-width: 3px;
            border-color: #15ABFFFF;
            /* secondary-500 */
            border-style: solid;
        }
    </style>
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
                                    href="../en/home.php">Inglés</a>
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
                <a href="#" class="nav_link active">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Inicio</span>
                </a>
                <a href="tutorial.php" class="nav_link link-dark">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name">Tutorial</span>
                </a>
                <a href="cursos.php" class="nav_link link-dark">
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

    <!--Contenido Inicio-->
    <section>
        <div class="container-fluid bg-blanco mt-3 rounded shadow">
            <span class="fs-1"><strong>Bienvenido al gestor de aprendizaje,
                    <?php echo $nombreUsuario . " " . $apellidoUsuario; ?>!
                </strong></span>
        </div>
        <div class="container-fluid bg-blanco mt-3 pt-3 pb-3 mb-3 rounded shadow">
            <div class="row gx-3 gy-2">
                <div class="col-sm col-md-7">
                    <div
                        class="text-center border border-1 border-secondary border-opacity-50  shadow bg-secondary-subtle">
                        <p class="mb-0"><strong>Cursos Inscritos</strong></p>
                        <div class="accordion accordion-flush " id="accordionFlushExample">
                            <!--Copias esto para añadir un curso-->
                            <?php $contador = 0; foreach($cursos as $curso){ 
                                
                                $contador++;
                                ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-<?php echo $contador;?>" aria-expanded="false"
                                        aria-controls="flush-<?php echo $contador;?>">
                                        <?php echo $curso["nombre_cur"] ?>
                                    </button>
                                </h2>
                                <div id="flush-<?php echo $contador;?>" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="card w-100 mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="https://github.com/PichiGod.png"
                                                        class="img-fluid rounded-start" width="150" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h6 class="card-title">José Oropeza</h6>
                                                        <button class="btn btn-primary ">Ir al Curso</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm ">
                    <div
                        class="text-center border border-1 border-secondary border-opacity-50 pb-3 shadow bg-secondary-subtle">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div>
                                <p><strong>Usuarios Activos</strong></p>
                            </div>
                            <div>
                                <div class="oval">
                                    <p class="mt-3 "><strong><?php echo $usuarioResult; ?></strong></p>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
                <!-- <div class="col-sm">
                    <div
                        class="text-center border border-1 border-secondary border-opacity-50 pb-3 shadow bg-secondary-subtle">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div>
                                <p><strong>Cantidad de cursos</strong></p>
                            </div>
                            <div>
                                <div class="oval">
                                    <p class="mt-3 "><strong><?php echo $cursosCantidad; ?></strong></p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div> -->
            </div>
            <hr class="mx-5">
            <div class="row gx-3 gy-3">
                <div class="col">

                    <h5>Recursos</h5>

                    <div class="text-center mb-2 border border-1 border-secondary 
                        border-opacity-50  shadow bg-secondary-subtle">
                        <div class="d-flex flex-row ">
                            <div class="bg-white p-2 pb-0">
                                <img src="../../assests/img/e4cgx0g6.png" class="img-fluid" width="216" alt="...">
                            </div>
                            <div class="vr text-secondary-emphasis"></div>
                            <div class="ms-auto me-auto p-1 pb-0">
                                <p class="text-center fs-5 text-body mb-0">Zlibrary - Libreria virtual gratuita</p>
                                <a class="btn btn-primary my-1" href="https://z-library.es/" target="_blank"
                                    rel="noopener noreferrer">Ir al recurso</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center border border-1 border-secondary 
                        border-opacity-50  shadow bg-secondary-subtle">
                        <div class="d-flex flex-row ">
                            <div class="bg-white p-2 pb-0">
                                <img src="../../assests/img/BBB.jfif" class="img-fluid" width="216" alt="...">
                            </div>
                            <div class="vr text-secondary-emphasis"></div>
                            <div class="ms-auto me-auto p-1 pb-0">
                                <p class="text-center fs-5 text-body mb-0">Big Blue Button - Aula virtual</p>
                                <a class="btn btn-primary my-1" href="https://bigbluebutton.org/" target="_blank"
                                    rel="noopener noreferrer">Ir al recurso</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col">

                    <h5>Notificaciones</h5>

                    <!--Copias esto para hacer una nueva noticifación-->
                    <div class="border pb-1 border-1 border-secondary 
                        border-opacity-50  shadow bg-secondary-subtle">
                        <div class="d-flex flex-column">
                            <div>
                                <p class="mb-0 ms-2 fw-bold fs-5">Ingles</p>
                            </div>
                            <div>
                                <p class="ms-2 mb-0 fs-5">Verbo To-Be</p>
                            </div>
                            <div>
                                <p class="mb-0 ms-2 fs-5"><strong>Fecha de Culminacion: 29/05/2024</strong></p>
                            </div>
                        </div>
                    </div>

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