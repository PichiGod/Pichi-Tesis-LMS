<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user']) && isset($_SESSION['usuariosActive'])) {

    $usuarios1 = $_SESSION['id_user'];

    $usuariosActivos = $_SESSION['usuariosActive'];

    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, img_perfil, rol, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

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

            $conexionConsultaBBDD = mysqli_query($mysqli, "SELECT * FROM usuario WHERE Empresa_id_empresa = '$empresaUsuario'");

            if (mysqli_num_rows($conexionConsultaBBDD) > 0) {

                while ($datos3 = mysqli_fetch_assoc($conexionConsultaBBDD)) {
                    $usuarios[] = $datos3;

                }

            }

        }

        $conexion3 = mysqli_query($mysqli, "SELECT * FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");

        if (mysqli_num_rows($conexion3) > 0) {

            $cursosCantidad = mysqli_num_rows($conexion3);

        } else {

            $cursosCantidad = 0;

        }

        $conexion4 = mysqli_query(
            $mysqli,
            "SELECT * FROM inscripcion i 
        LEFT JOIN cursos c ON c.id_cur = i.Cursos_id_cur 
        WHERE c.Empresa_id_empresa = '$empresaUsuario'"
        );

        if (mysqli_num_rows($conexion4) > 0) {

            while ($datos4 = mysqli_fetch_assoc($conexion4)) {
                $cursosInscritos[] = $datos4;
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
    <title>Administrar</title>
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                                            href="#">Inglés</a>
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
                <a href="cursos.php" class="nav_link1 link-dark ">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <?php if ($rol != 0) { ?>
                    <a href="MenuAdmin.php" class="nav_link1 active">
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
                    <button type="button" class="btn btn-primary">Cerrar Sesión</button>
                </div>
            </div>
        </div>
    </div>

    <!--Contenido-->
    <section>
        <div class="container-fluid bg-blanco my-3 pb-2 shadow">
            <a href="MenuAdmin.php"><i class="fa-solid mt-2 fa-arrow-left" style="font-size:2rem;color:black;"></i></a>
            <h1 class="text-center pt-2">Administrar Usuario</h1>

            <!-- <form class="d-flex" role="search"> -->
            <input class="form-control me-2" id="searchInput" type="search" placeholder="Search" aria-label="Search">
            <!-- <button class="btn btn-outline-success" type="submit">Filtrar</button> -->
            <!-- </form> -->

            <div class="table-responsive">
                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre(s)</th>
                            <th scope="col">Apellido(s)</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Cursos</th>
                            <?php if ($rol == 2) { ?>
                                <th scope="col">Opciones</th>
                            <?php }
                            ; ?>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php foreach ($usuarios as $usuario) { ?>
                            <tr>
                                <th scope="row"><?php echo $usuario['identificacion_user']; ?></th>
                                <td><?php echo $usuario['nombre_user']; ?></td>
                                <td><?php echo $usuario['apellido_user']; ?></td>
                                <td><?php echo $usuario['direccion_user']; ?></td>
                                <td><?php echo $usuario['correo_user']; ?></td>
                                <td><?php echo $usuario['sexo_user']; ?></td>
                                <td>
                                    <?php if ($usuario['rol'] == 0) {
                                        echo "Estudiante";
                                    } ?>
                                    <?php if ($usuario['rol'] == 1) {
                                        echo "Docente";
                                    } ?>
                                    <?php if ($usuario['rol'] == 2) {
                                        echo "Administrador";
                                    } ?>
                                </td>
                                <td>
                                    <ul>
                                        <?php
                                        $found = false;
                                        foreach ($cursosInscritos as $inscrito) {
                                            if ($inscrito['Usuario_id_user'] == $usuario['id_user']) {
                                                echo "<li>" . $inscrito['nombre_cur'] . "</li>";
                                                $found = true;
                                            }
                                        }
                                        if (!$found) {
                                            echo "<li>N/A</li>";
                                        }
                                        ?>
                                    </ul>
                                </td>
                                <?php if ($rol == 2) { ?>
                                    <td>
                                        <button
                                            onclick="location.href='modifUsuario.php?idUser=<?php echo $usuario['id_user']; ?>'"
                                            class="btn btn-primary me-1">
                                            Modificar
                                        </button>

                                        <?php if ($usuario['rol'] != 2) { ?>
                                            <button onclick="eliminarUser(<?php echo $usuario['id_user'];?>);" class="btn btn-outline-danger">
                                                Eliminar
                                            </button>
                                        <?php } ?>

                                    </td>
                                <?php }
                                ; ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <?php require "../../assests/php/borrarUsuarioMain.php"; ?>

    <script>
        function eliminarUser(id) {
            confimar = confirm('Seguro que quiere eliminar al usuario?');
            if (confimar == true) {
                // e.preventDefault();
                borrarUsuario(id);
                //Accion para borrar usuario
                //alert('El usuario ha sido eliminado');
            }
        }

        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#tableBody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        // When the user clicks on the button, scroll to the top of the document
        // function topFunction() {
        //     document.body.scrollTop = 0; // For Safari
        //     document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
        // }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>