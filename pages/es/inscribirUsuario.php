<?php

require "../../assests/php/LoginBD.php";

// Inicializar variables
$nombreCompleto = "";
$identificacion = "";
$correo = "";
$rol = "";
$cursos = [];
// Verificar si hay una sesión activa
if (isset($_SESSION['id_user']) && isset($_SESSION['usuariosActive'])) {

    // Obtener ID de usuario activo
    $usuarios1 = $_SESSION['id_user'];

    // Obtener usuarios activos
    $usuariosActivos = $_SESSION['usuariosActive'];

    // Consulta para obtener datos del usuario actual
    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

    // Verificar si se encontró el usuario actual
    if (mysqli_num_rows($conexion1) > 0) {

        // Extraer datos del usuario actual
        $datos = mysqli_fetch_assoc($conexion1);
        $empresaUsuario = $datos['Empresa_id_empresa'];
        $nombreUsuario = $datos['nombre_user'];
        $apellidoUsuario = $datos['apellido_user'];

        // Consulta para obtener el nombre de la empresa del usuario actual
        $conexion2 = mysqli_query($mysqli, "SELECT nombre_empresa FROM empresa WHERE id_empresa = '$empresaUsuario'");

        // Verificar si se encontró el nombre de la empresa
        if (mysqli_num_rows($conexion2) > 0) {
            $datos2 = mysqli_fetch_assoc($conexion2);
            $nombreEmpresa = $datos2['nombre_empresa'];
        }

        // Consulta para obtener la cantidad de cursos del usuario actual
        $conexion3 = mysqli_query($mysqli, "SELECT * FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");
        $cursosCantidad = mysqli_num_rows($conexion3) > 0 ? mysqli_num_rows($conexion3) : 0;

        // Verificar si se envió el formulario de búsqueda
        if (isset($_GET['identificacion'])) {
            // Obtener la identificación del formulario
            $identificacion = $_GET['identificacion'];

            // Consulta para obtener datos del usuario por identificación
            $consulta_usuario = mysqli_query($mysqli, "SELECT nombre_user, apellido_user, identificacion_user, correo_user, rol FROM usuario WHERE identificacion_user = '$identificacion'");

            // Verificar si se encontraron resultados
            if (mysqli_num_rows($consulta_usuario) > 0) {
                // Extraer datos del usuario
                $datos_usuario = mysqli_fetch_assoc($consulta_usuario);

                // Asignar los datos a variables
                $nombreCompleto = $datos_usuario['nombre_user'] . ' ' . $datos_usuario['apellido_user'];
                $identificacion = $datos_usuario['identificacion_user'];
                $correo = $datos_usuario['correo_user'];
                $rol = $datos_usuario['rol'];

                if($rol == 0){

                    $rol = "Administrador";

                }elseif($rol == 1){

                    $rol = "Docente";
                }else{

                    $rol = "Alumno";
                }
    
                }

            }

            $conexion3 = mysqli_query($mysqli, "SELECT * FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");

            if (mysqli_num_rows($conexion3) > 0) {
                while ($datos3 = mysqli_fetch_assoc($conexion3)) {
                    $cursos[] = $datos3;

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
    <title>Inscribir</title>
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
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70"
                        height="24" />
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
                                    href="#">Inglés</a>
                            </li>
                        </ul>
                    </div>
                    <!--Opciones de Usuario ver.Español-->
                    <div class="vr me-3"></div>
                    <div class="btn-group dropstart me-4 pe-2">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/PichiGod.png" alt="..." width="32" height="32"
                                class="rounded-circle me-2" />
                            <strong>
                                <?php echo $nombreUsuario . " " . $apellidoUsuario; ?>
                            </strong>
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
                <a href="cursos.php" class="nav_link link-dark">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <a href="MenuAdmin.php" class="nav_link active ">
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

    <!--Contenido-->
    <section>
        <div class="container-fluid bg-blanco my-3 pb-2 shadow">
            <!-- Formulario de búsqueda -->

            <!-- Información del usuario -->
            <h1 class="text-center">Inscribir Usuario</h1>
            <form class="d-flex" role="search" method="GET" action="">
                <input class="form-control me-2" type="search" placeholder="Ingrese Identificación" aria-label="Search" name="identificacion" value="<?php echo $identificacion; ?>">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card my-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://github.com/PichiGod.png" class="img-fluid rounded-start" alt="...">
                            </div>

                            
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $nombreCompleto; ?></h5>
                                    <p class="card-text"><b>Identificación:</b> <?php echo $identificacion; ?></p>
                                    <p class="card-text"><b>Correo Electronico:</b> <?php echo $correo; ?></p>
                                    <p class="card-text"><b>Rol: </b><?php echo $rol; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card my-3" style="max-width: 540px;">

                        <div class="card-body overflow-auto " style="height:20rem;">
                            <ul class="list-group overflow-auto">
                                <?php 
                                if(mysqli_num_rows($conexion3) > 0){
                                foreach($cursos as $curso){ ?>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="<?php echo $curso['id_cur'] ?>" id="firstCheckbox">
                                    <label class="form-check-label" for="firstCheckbox"><?php echo $curso['nombre_cur'] ?></label>
                                </li>
                                <?php }}else{ ?>

                                    <h3>No hay cursos disponibles en tu Empresa</h3>

                                <?php } ?>
                            </ul>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary">Inscribir</button>
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