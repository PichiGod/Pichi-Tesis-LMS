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


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Actividad</title>
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
    <link rel="stylesheet" href="../../assests/css/crearActividad.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                    <!--Cambio de Idioma ver.Ingles-->
                    <div class="vr me-2"></div>
                    <div class="nav-item dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                                href="#">English</a>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary"
                                    href="../es/crearActividad.php">Spanish (Latin America)</a>
                            </li>
                        </ul>
                    </div>
                    <!--Opciones de Usuario ver.Ingles-->
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
                                <a class="dropdown-item" href="viewUser.php">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="btn dropdown-item log-out" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" href="">
                                    <i class="bx bx-log-out log-out-modal"></i>
                                    <span class="ms-2">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar ver.Ingles-->
    <div class="l-navbar bg-body-tertiary" id="nav-bar">
        <nav class="nav">
            <div class="nav_list">
                <a href="home.php" class="nav_link link-dark">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Home</span>
                </a>
                <a href="tutoIngles.php" class="nav_link link-dark">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Tutorial</span>
                </a>
                <a href="courses.php" class="nav_link active">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Courses</span>
                </a>
                <a href="viewCalif.php" class="nav_link link-dark">
                    <i class="bx bx-news nav_icon"></i>
                    <span class="nav_name">Evaluations</span>
                </a>
                <a href="adminMenu.php" class="nav_link link-dark">
                    <i class="bx bx-cog nav_icon"></i>
                    <span class="nav_name">Manage</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Modal ver.Ingles-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Log Out
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to Log out?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Return
                    </button>
                    <button type="button" onclick="location.href='../../assests/php/cerrarSesion.php'"
                        class="btn btn-primary">Log Out</button>
                </div>
            </div>
        </div>
    </div>

    <section class="crearActividad">

        <div class="container-fluid bg-blanco mt-3 shadow">

            <div class="TituloCrearActividad">

                <h3 class="TituloCrear"><b>Create New Activity </b></h3>

            </div>

            <div class="tituloActividad">

                <label for="tituloActividad">Title of Activity</label>

                <input type="text" class="form-control" id="tituloActividad" placeholder="Title">

            </div>

            <div class="Instrucciones">

                <label for="texto_actividad">Instructions for Activity</label>

            </div>

            <div id="editor">
            </div>
            <input type="hidden" id="texto_actividad" name="texto_actividad">
            <div>


            </div>


            <div class="contenidoActividad">

                <label for="">Content to Upload</label>

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="archivo" name="archivo">
                    <label class="custom-file-label" for="archivo">Select a file</label>
                </div>


            </div>



            <div class="contenidoActividadAdicional">

                <label for="">Aditional File</label>

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="archivo" name="archivo">
                    <label class="custom-file-label" for="archivo">Select a file</label>
                </div>


            </div>

            <div class="fechainicioContenedor">

                <label for="fecha">Start Date</label>

                <input type="date" class="form-control" id="fecha" name="fecha">


            </div>

            <div class="fechaculminacionContenedor">

                <label for="">Culmination Date</label>

                <input type="date" class="form-control" id="fecha" name="fecha">


            </div>

            <div class="fechacierreContenedor">

                <label for="">Closing Date</label>

                <input type="date" class="form-control" id="fecha" name="fecha">


            </div>


            <div class="fechanotificacionContenedor">

                <label for="">Date of Notification</label>

                <input type="date" class="form-control" id="fecha" name="fecha">


            </div>

            <div class="numeroArchivosContenedor">

                <label for="">Number of Files to Skip</label>

                <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">


            </div>

            <div class="pesoArchivosContenedor">

                <label for="">Maximum File Size</label>

                <div class="juntar">

                    <input type="number" class="minimos form-control" id="exampleFormControlInput1"
                        placeholder="0"><label for="">MB</label>

                </div>

            </div>


            <div class="pesoArchivosContenedor">

                <label for="">File type</label>

                <select class="seleccion form-select" aria-label="Default select example">
                    <option selected>Visible</option>
                    <option value="1">Invisible</option>
                </select>

            </div>


            <div class="notaMaximaContenedor">

                <label for="">Maximum Grade</label>

                <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">


            </div>

            <div class="notaMinimaContenedor">

                <label for="">Minimun Grade</label>

                <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">


            </div>

            <div class="div2Crear">

                <label for="">Visibility of Activity</label>

                <select class="seleccion form-select" aria-label="Default select example">
                    <option selected>Visible</option>
                    <option value="1">Invisible</option>
                </select>

            </div>

            <div class="div3Crear">
                <label for="">Enable Percentage</label>
                <select id="selectActivarPorcentaje" class="seleccion form-select" aria-label="Default select example">
                    <option selected>Activated</option>
                    <option value="1">Deactivated</option>
                </select>
            </div>


            <div id="porcentajeContenedor" class="porcentajeContenedor">
                <label for="">Percentage of Activity</label>
                <input type="number" class="minimos form-control" id="porcentajeActividad" placeholder="0">
            </div>

            <div class="containerButtonCrearActividadFin">

                <button type="button" class="botonRegresar btn btn-primary" onclick="location.href=''">Return</button>

                <button type="button" class="botonCrearCursoFin btn btn-primary">Create Activity</button>


            </div>

        </div>

    </section>

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var form = document.querySelector('form');
        form.onsubmit = function () {
            var editorContent = document.querySelector('.ql-editor').innerHTML;
            document.getElementById('texto_actividad').value = editorContent;
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var selectActivarPorcentaje = document.getElementById("selectActivarPorcentaje");
            var porcentajeContenedor = document.getElementById("porcentajeContenedor");

            // Ocultar por defecto al cargar la página si está desactivado
            if (selectActivarPorcentaje.value === "Desactivado") {
                porcentajeContenedor.style.display = "none";
            }

            // Escuchar cambios en el select
            selectActivarPorcentaje.addEventListener("change", function () {
                if (selectActivarPorcentaje.value === "Activado") {
                    porcentajeContenedor.style.display = "block"; // Mostrar si está activado
                } else {
                    porcentajeContenedor.style.display = "none"; // Ocultar si está desactivado
                }
            });
        });
    </script>

</body>

</html>