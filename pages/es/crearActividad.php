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
                <a class="navbar-brand" href="../index.html">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>

                <div class="d-flex justify-content-end">
                    <!--Cambio de Idioma ver.Español-->
                    <div class="vr me-2"></div>
                    <div class="nav-item dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary"
                                href="../es/registro.php">Español (Latino America)</a>
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
                            <img src="https://github.com/PichiGod.png" alt="" width="32" height="32"
                                class="rounded-circle me-2" />
                            <strong><?php echo $nombreUsuario . " " . $apellidoUsuario; ?></strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#">New project...(?)</a></li>
                            <li><a class="dropdown-item" href="#">Settings(?)</a></li>
                            <li>
                                <a class="dropdown-item" href="viewUser.php">Perfil</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="../../assests/php/cerrarSesion.php">Cerrar Sección</a>
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
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Inicio</span>
                </a>
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="#" class="nav_link active">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-news nav_icon"></i>
                    <span class="nav_name">Evaluaciones</span>
                </a>
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-cog nav_icon"></i>
                    <span class="nav_name">Configuración</span>
                </a>
            </div>
        </nav>
    </div>

    <section class="crearActividad">

        <div class="container-fluid bg-blanco mt-3 shadow">

            <div class="TituloCrearActividad">

                <h3 class="TituloCrear"><b>Crear Nueva Actividad</b></h3>

            </div>

            <div class="tituloActividad">

                <label for="">Titulo de la Actividad</label>

                <input type="text" class="form-control" id="tituloActividad" placeholder="Titulo">

            </div>

            <div class="Instrucciones">

                <label for="">Instrucciones para la Actividad</label>

            </div>

            <div id="editor">
            </div>
            <input type="hidden" id="texto_actividad" name="texto_actividad">
            <div>


            </div>


            <div class="contenidoActividad">

                <label for="">Contenido a Subir</label>

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="archivo" name="archivo">
                    <label class="custom-file-label" for="archivo">Selecciona un archivo</label>
                </div>


            </div>



            <div class="contenidoActividadAdicional">

                <label for="">Archivo adicional</label>

                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="archivo" name="archivo">
                    <label class="custom-file-label" for="archivo">Selecciona un archivo</label>
                </div>


            </div>

            <div class="fechainicioContenedor">

                <label for="">Fecha de Inicio</label>

                <input type="date" class="form-control" id="fecha" name="fecha">


            </div>

            <div class="fechaculminacionContenedor">

                <label for="">fecha de Culminación</label>

                <input type="date" class="form-control" id="fecha" name="fecha">


            </div>

            <div class="fechaculminacionContenedor">

                <label for="">fecha de Culminación</label>

                <input type="date" class="form-control" id="fecha" name="fecha">


            </div>


            <div class="fechacierreContenedor">

                <label for="">fecha de Cierre</label>

                <input type="date" class="form-control" id="fecha" name="fecha">


            </div>


            <div class="fechanotificacionContenedor">

                <label for="">fecha de Notificacion</label>

                <input type="date" class="form-control" id="fecha" name="fecha">


            </div>

            <div class="numeroArchivosContenedor">

                <label for="">Numero de Archivos a Omitir</label>

                <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">


            </div>

            <div class="pesoArchivosContenedor">

                <label for="">Peso Máximo del Archivo</label>

                <div class="juntar">

                    <input type="number" class="minimos form-control" id="exampleFormControlInput1"
                        placeholder="0"><label for="">MB</label>

                </div>

            </div>


            <div class="pesoArchivosContenedor">

                <label for="">Tipo de archivos</label>

                <select class="seleccion form-select" aria-label="Default select example">
                    <option selected>Visible</option>
                    <option value="1">Invisible</option>
                </select>

            </div>


            <div class="notaMaximaContenedor">

                <label for="">Nota Maxima</label>

                <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">


            </div>

            <div class="notaMinimaContenedor">

                <label for="">Nota Minima</label>

                <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">


            </div>

            <div class="div2Crear">

                <label for="">Visibilidad de la Actividad</label>

                <select class="seleccion form-select" aria-label="Default select example">
                    <option selected>Visible</option>
                    <option value="1">Invisible</option>
                </select>

            </div>

            <div class="div3Crear">
                <label for="">Activar Porcentaje</label>
                <select id="selectActivarPorcentaje" class="seleccion form-select" aria-label="Default select example">
                    <option selected>Activado</option>
                    <option value="1">Desactivado</option>
                </select>
            </div>


            <div id="porcentajeContenedor" class="porcentajeContenedor">
                <label for="">Porcentaje Actividad</label>
                <input type="number" class="minimos form-control" id="porcentajeActividad" placeholder="0">
            </div>

            <div class="containerButtonCrearActividadFin">

                <button type="button" class="botonRegresar btn btn-primary" onclick="location.href=''">Regresar</button>

                <button type="button" class="botonCrearCursoFin btn btn-primary">Crear Actividad</button>


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