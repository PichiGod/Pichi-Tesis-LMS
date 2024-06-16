<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];

    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, rol, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

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
                                    href="../en/createActivity.php">Inglés</a>
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

    <section class="crearActividad">

        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">

            <input type="hidden" name="" id="action" value="CrearActividad">

            <div class="container-fluid mt-3 bg-blanco shadow">
                <a href="verCurso.php?id_cur=<?php echo $id_curso_seleccionado ?>"><i
                        class="fa-solid mt-2 fa-arrow-left" style="font-size:2rem;color:black;"></i></a>

                <div class="TituloCrearActividad">

                    <h3 class="TituloCrear"><b>Crear Nueva Actividad</b></h3>

                    <input type="hidden" name="actionID_CUR" id="actionID_CUR" class="actionID_CUR"
                        value="<?php echo $id_curso_seleccionado ?>">

                </div>

                <div class="tituloActividad">

                    <label for="">Titulo de la Actividad</label>

                    <input type="text" class="tituloActividad form-control" id="tituloActividad" placeholder="Titulo">

                </div>

                <div class="Instrucciones">

                    <label for="">Instrucciones para la Actividad</label>

                </div>

                <div class="bg-white" id="editor">
                </div>
                <input type="hidden" id="texto_actividad" class="texto_actividad" name="texto_actividad">
                <div>


                </div>


                <div class="contenidoActividad">

                    <label for="">Contenido a Subir</label>

                    <div class="custom-file">
                        <input type="file" class="archivo form-control" id="archivo" name="archivo">
                        <label class="custom-file-label" for="archivo">Selecciona un archivo</label>
                    </div>


                </div>



                <div class="contenidoActividadAdicional">

                    <label for="">Archivo adicional</label>

                    <div class="custom-file">
                        <input type="file" class="archivo1 form-control" id="archivo1" name="archivo1">
                        <label class="custom-file-label" for="archivo">Selecciona un archivo</label>
                    </div>


                </div>

                <div class="fechainicioContenedor">

                    <label for="">Fecha de Inicio</label>

                    <input type="date" class="fechaInicio form-control" id="fechaInicio" name="fecha">


                </div>

                <div class="fechaculminacionContenedor">

                    <label for="">Fecha de Culminación</label>

                    <input type="date" class="fechaFin form-control" id="fechaFin" name="fecha">


                </div>


                <div class="fechanotificacionContenedor">

                    <label for="">Fecha de Notificacion</label>

                    <input type="date" class="fechaNoti form-control" id="fechaNoti" name="fecha">


                </div>

                <div class="pesoArchivosContenedor">

                    <label for="">Peso Máximo del Archivo</label>

                    <div class="juntar">

                        <input type="number" class="maximo form-control" id="maximo" placeholder="0"><label
                            for="">MB</label>

                    </div>

                </div>


                <div class="notaMaximaContenedor">

                    <label for="">Nota Maxima</label>

                    <input type="number" class="notaMaxima form-control" id="notaMaxima" placeholder="0">


                </div>

                <div class="notaMinimaContenedor">

                    <label for="">Nota Minima</label>

                    <input type="number" class="notaMinima form-control" id="notaMinima" placeholder="0">


                </div>

                <div class="div2Crear">

                    <label for="">Visibilidad de la Actividad</label>

                    <select class="visibilidadActividad seleccion form-select" id="visibilidadActividad"
                        aria-label="Default select example">
                        <!-- Visibilidad de la actividad. 0 es visible y 1 es Invisible-->
                        <option value="0" selected>Visible</option>
                        <option value="1">Invisible</option>
                    </select>

                </div>

                <div class="div3Crear">
                    <label for="">Activar Porcentaje</label>
                    <select id="selectActivarPorcentaje" class="selectActivarPorcentaje form-select"
                        aria-label="Default select example">
                        <option selected>Activado</option>
                        <option value="1">Desactivado</option>
                    </select>
                </div>


                <div id="porcentajeContenedor" class="porcentajeContenedor">
                    <label for="">Porcentaje Actividad</label>
                    <input type="number" class="porcentajeActividad form-control" id="porcentajeActividad"
                        placeholder="0">
                </div>

                <div class="containerButtonCrearActividadFin">

                    <button type="button" class="botonRegresar btn btn-primary"
                        onclick="location.href='verCurso.php?id_cur=<?php echo $id_curso_seleccionado ?>'">Regresar</button>

                    <button type="button" class="botonCrearCursoFin btn btn-primary" onclick="submitData();">Crear
                        Actividad</button>


                </div>

            </div>

        </form>
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

    <?php require "../../assests/php/crearActividadMain.php"; ?>

</body>

</html>