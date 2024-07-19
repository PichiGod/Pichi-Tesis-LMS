<?php

require "../../assests/php/LoginBD.php";

$cursos = [];

if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];

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

            $conexion3 = mysqli_query($mysqli, "SELECT c.*, teachers.nombre_user, teachers.apellido_user 
                FROM cursos c 
                LEFT JOIN (
                SELECT i.Cursos_id_cur, u.nombre_user, u.apellido_user
                FROM inscripcion i 
                JOIN usuario u ON i.Usuario_id_user = u.id_user 
                WHERE u.rol = 1
                ) AS teachers ON c.id_cur = teachers.Cursos_id_cur 
                WHERE c.Empresa_id_empresa = '$empresaUsuario';");

            if (mysqli_num_rows($conexion3) > 0) {
                while ($datos3 = mysqli_fetch_assoc($conexion3)) {
                    $cursos[] = $datos3;
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
    <title>Visibilidad Curso</title>
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

    <style>
        .table {
            width: 100%;
            display: block;
            white-space: nowrap;
        }

        #tableBody>tr {
            display: table-row;
        }

        #tableBody>tr>td {
            display: table-cell;
            white-space: nowrap;
        }
    </style>

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
                                            href="../en/courseStatus.php">Inglés</a>
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
                <a href="cursos.php" class="nav_link1 link-dark">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <?php if ($rol != 0) { ?>
                    <a href="MenuAdmin.php" class="nav_link1 active ">
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
        <div class="container-fluid bg-blanco my-3 pb-2 shadow">

            <a href="MenuAdmin.php"><i class="fa-solid mt-2 fa-arrow-left" style="font-size:2rem;color:black;"></i></a>
            <h1 class="text-center pt-2">Visibilidad Curso</h1>
            <h4 class="text-center fw-light">Haga click en un curso para seleccionar</h4>


            <!-- <form class="d-flex" role="search"> -->
            <input class="form-control me-2" id="searchInput" type="search" placeholder="Buscar" aria-label="Search">
            <!-- <button class="btn btn-outline-success" type="submit">Filtrar</button> -->
            <!-- </form> -->

            <form action="">
                <div class="row mt-2 d-flex">
                    <div class="col-md col-sm col-lg-6 mb-2 table-responsive">
                        <table style="height: 280px;" class="table table-bordered table-hover table-striped"
                            id="courseTable">
                            <thead>
                                <tr>
                                    <th scope="col">Id curso</th>
                                    <th scope="col">Nombre curso</th>
                                    <th scope="col">Docente</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php foreach ($cursos as $curso) { ?>
                                    <tr onclick="selectRow(this);">
                                        <td scope="row">
                                            <?php echo $curso['id_cur']; ?>
                                        </td>
                                        <td>
                                            <?php echo $curso['nombre_cur']; ?>
                                        </td>
                                        <td>
                                            <?php if (isset($curso['nombre_user']) && isset($curso['apellido_user'])) {
                                                echo $curso['nombre_user'] . " " . $curso['apellido_user'];
                                            } else {
                                                echo "N/A";
                                            } ?>
                                        </td>
                                        <td>
                                            <span
                                                class="badge <?php echo $curso['visibilidad_curso'] === 'Visible' ? 'text-bg-success' : 'text-bg-danger'; ?>">
                                                <?php echo $curso['visibilidad_curso']; ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 col-md col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" id="selectedCourseTitle">Curso seleccionado</h4>
                                <p class="card-text" id="selectedCourseName"></p>
                                <p class="card-text">Docente: <span id="selectedCourseTeacher"></span></p>
                                <p class="card-text">Estado: <span class="badge text-bg-success"
                                        id="selectedCourseStatus"></span></p>
                                <input type="hidden" id="idCur">
                                <input type="hidden" id="estadoCur">
                            </div>
                            <div class="card-footer">
                                <!-- Botón para activar/desactivar -->
                                <button id="activar" onclick="activarCurso(document.getElementById('idCur').value, document.getElementById('estadoCur').value);" type="button"
                                    class="btn btn-outline-primary disabled">
                                    Activar/Desactivar Curso
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </section>

    <script>
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#tableBody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });

        function selectRow(row) {
            const selectedRow = document.querySelector(".table tbody tr.table-active");
            const buttonActivar = document.getElementById("activar");

            if (selectedRow) {
                selectedRow.classList.remove("table-active");
            }
            row.classList.add("table-active");
            buttonActivar.classList.remove("disabled");

            // Update selected course details
            const idCurso = row.cells[0].innerText;
            const nombreCurso = row.cells[1].innerText;
            const docenteCurso = row.cells[2].innerText;
            const estadoCurso = row.cells[3].innerText.trim();

            document.getElementById("selectedCourseTitle").innerText = "Curso seleccionado: " + nombreCurso;
            document.getElementById("selectedCourseName").innerText = "Nombre curso: " + nombreCurso;
            document.getElementById("selectedCourseTeacher").innerText = docenteCurso;
            document.getElementById("selectedCourseStatus").innerText = estadoCurso;
            document.getElementById("selectedCourseStatus").className = "badge " + (estadoCurso === "Visible" ? "text-bg-success" : "text-bg-danger");

            document.getElementById('idCur').value = idCurso;
            document.getElementById('estadoCur').value = estadoCurso;
        }
    </script>

    <?php require "../../assests/php/estadoCursoMain.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
</body>

</html>