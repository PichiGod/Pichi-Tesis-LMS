<?php

require "../../assests/php/LoginBD.php";

$empresas = array();

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

            while ($row = mysqli_fetch_assoc($conexion2)) {
                $empresas[] = $row['nombre_empresa'];
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
    <title>Ingresar Usuario</title>
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
                                    href="../en/insertUser.php">Inglés</a>
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
                <a href="tutorial.php" class="nav_link link-dark">
                    <i class='bx bx-bookmark nav_icon'></i>
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
            <a href="MenuAdmin.php" class="mt-2 position-absolute"><i class="fa-solid fa-arrow-left"
                    style="font-size:2rem;color:black;"></i></a>
            <h1 class="text-center">Ingresar Usuario</h1>

            <form action="" method="post">
                <input type="hidden" name="" id="action" value="Register">
                <div name="formulario">

                    <hr class="mx-5" />

                    <div>
                        <div class="form-floating mb-3">
                            <input type="text" class="nombreUsuario form-control form" name="formId1" id="nombreUsuario"
                                placeholder="" />
                            <label for="formId1">Nombre de usuario</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3">
                            <input type="text" class="apellidoUsuario form-control form" name="formId1"
                                id="apellidoUsuario" placeholder="" />
                            <label for="formId1">Apellido de usuario</label>
                        </div>
                    </div>


                    <div>
                        <div class="form-floating mb-3">
                            <input type="email" class="correoUsuario form-control form" name="formId1"
                                id="correoUsuario" placeholder="" />
                            <label for="">Correo Electronico</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3">
                            <input type="number" class="rifUsuario form-control form" name="formId2" id="rifUsuario"
                                placeholder="" />
                            <label for="formId1">Cedula</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3">
                            <input type="password" class="contrasenaUsuario form-control form" name="formId3"
                                id="contrasenaUsuario" placeholder="" />
                            <label for="formId1">Contraseña</label>
                        </div>
                    </div>


                    <div>
                        <div class="form-floating mb-3">
                            <input type="text" class="direccionUsuario form-control form" name="formId3"
                                id="direccionUsuario" placeholder="" />
                            <label for="formId1">Dirección</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-4">
                            <select class="GeneroUsuario form-select" aria-label="Default select example"
                                id="GeneroUsuario">
                                <option selected>Masculino</option>
                                <option value="1">Femenino</option>
                            </select>
                            <label for="formId1">Genero</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-4">
                            <select class="Empresa form-select" aria-label="Default select example" id="Empresa"
                                name="Empresa">
                                <option selected disabled>Aqui quiero que la unica opcion sea la empresa del admin
                                </option>
                                <?php foreach ($empresas as $empresa): ?>
                                    <option value="<?php echo $empresa; ?>"><?php echo $empresa; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="Empresa">Empresa</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3">
                            <input type="date" class="fechaNacimiento form-control" id="fechaNacimiento" name="fecha">
                            <label for="formId1">Fecha de Nacimineto</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3 w-auto align-self-center">
                            <input type="number" class="telefonoUsuario form-control" name="formId1"
                                id="telefonoUsuario" placeholder="" />
                            <label for="formId1">Telefono</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3 w-auto">
                            <p class="text-center">Ingresar como:</p>
                            <div class="form-floating mb-3 d-flex justify-content-evenly">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Estudiante
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Profesor
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary mb-4" onclick="submitData();">
                            Ingresar Usuario
                        </button>
                    </div>

                </div>
            </form>
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