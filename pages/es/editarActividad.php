<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];

    $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, rol, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

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

        }

    }

}

if (isset($_GET['id_cur']) && isset($_GET['id_act'])) {
    $id_curso_seleccionado = $_GET['id_cur'];
    $id_act_seleccionado = $_GET['id_act'];

    $consultaActividades = mysqli_query($mysqli, "SELECT * FROM actividades WHERE idActividades = '$id_act_seleccionado'");

    if (mysqli_num_rows($consultaActividades) > 0) {
        $datosActividad = mysqli_fetch_assoc($consultaActividades);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Actividad</title>
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
    <link rel="stylesheet" href="../../assests/css/crearActividad.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!--Sidebar.js-->
    <script src="../../assests/js/sidebar.js"></script>
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                                    href="../en/viewResource.php">Inglés</a>
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

    <!-- Modal -->
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
                <a href="verCalif.php" class="nav_link link-dark">
                    <i class="bx bx-news nav_icon"></i>
                    <span class="nav_name">Evaluaciones</span>
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

    <section>

        <div class="container-fluid bg-blanco my-3 p-3 shadow rounded">
            <a
                href="verActividad.php?id_act=<?php echo $id_act_seleccionado; ?>&id_cur=<?php echo $id_curso_seleccionado; ?>"><i
                    class="fa-solid mt-2 fa-arrow-left" style="font-size:2rem;color:black;"></i></a>
            <h1 class="text-center pt-2">Editar Actividad</h1>

            <form action="" autocomplete="off" id="entrega" method="post" enctype="multipart/form-data">
                <input type="hidden" id="action" value="editarActividad">
                <input type="hidden" id="id_cur" value="<?php echo $id_curso_seleccionado; ?>">
                <input type="hidden" id="id_act" value="<?php echo $id_act_seleccionado; ?>">
                <label for="titulo">Titulo de Actividad</label>
                <input class="form-control mb-2" type="text" value="<?php echo $datosActividad['Titulo']; ?>"
                    name="titulo" id="titulo"></input>

                <p class="mb-0"><strong>Descripción o Instrucciones de la actividad</strong></p>
                <div class="bg-white" id="editor">
                    <?php echo $datosActividad['ContenidoAcitividad']; ?>
                </div>
                <input type="hidden" id="texto_actividad" class="texto_actividad" name="texto_actividad">
                <div>


                </div>

                <div>
                    <div class="mb-1">
                        <label for="formFileMultiple" class="form-label">Seleccionar archivos... (2 archivos
                            máximo)</label>
                        <input class="form-control" type="file" id="files" name="files[]" multiple>
                    </div>
                </div>

                Lista de archivos
                <ul class="list-group mt-2">
                    <?php if ($datosActividad['archivosPrincipal'] == null && $datosActividad['archivosAdicional'] == null) { ?>

                        <li class="list-group-item">
                            No hay archivos disponibles
                        </li>
                    <?php } elseif ($datosActividad['archivosPrincipal'] != null) { ?>
                        <li class="list-group-item ">
                            <i class="fa-solid mt-1 fa-file"></i> <a class="ms-2 text-break"
                                href="#"><?php echo $datosActividad['archivosPrincipal']; ?></a>
                            <input type="hidden" id="actionArchivo1" value="borrar"></input>
                            <input type="hidden" id="archivoActual"
                                value="<?php echo $datosActividad['archivosPrincipal']; ?>"></input>
                            <button class="btn btn-link mb-1 p-0 ms-2" onclick="borrarArchivo();">
                                <span>Eliminar</span>
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </li>
                    <?php }
                    ;
                    if ($datosActividad['archivosAdicional'] != null) { ?>

                        <li class="list-group-item">
                            <i class="fa-solid fa-file"></i> <a class="ms-2 text-break"
                                href="#"><?php echo $datosActividad['archivosAdicional']; ?></a>
                            <input type="hidden" id="actionArchivo2" value="borrarAdicional"></input>
                            <input type="hidden" id="aAdicionalActual"
                                value="<?php echo $datosActividad['archivosAdicional']; ?>"></input>
                            <button class="btn btn-link mb-1 p-0 ms-2" onclick="borrarArchivoAdicional();">
                                <span>Eliminar</span>
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </li>
                    <?php }
                    ; ?>
                </ul>

                <label for="fechaIni">Fecha de Inicio</label>
                <input type="date" value="<?php echo date('Y-m-d', strtotime($datosActividad['fechaInicio'])); ?>"
                    class="form-control" name="fechaIni" id="fechaIni">

                <label for="fechaFin">Fecha de Culminación</label>
                <input type="date" value="<?php echo date('Y-m-d', strtotime($datosActividad['fechaCulminacion'])); ?>"
                    class="form-control" name="fechaFin" id="fechaFin">

                <label for="fechaFin">Fecha de Notificación</label>
                <input type="date" value="<?php echo date('Y-m-d', strtotime($datosActividad['fechaNotificacion'])); ?>"
                    class="form-control" name="fechaNot" id="fechaNot">

                <label for="maximo">Peso Máximo del Archivo</label>
                <div class="input-group">
                    <input type="number" value="<?php echo $datosActividad['pesoArchivo']; ?>"
                        class="maximo form-control" id="maximo" placeholder="0"><span class="input-group-text">MB</span>
                </div>

                <label for="notaMaxima">Nota Maxima</label>
                <input type="number" class="notaMaxima form-control"
                    value="<?php echo $datosActividad['notaMaxima']; ?>" id="notaMaxima" placeholder="Nota maxima">

                <label for="notaMinima">Nota Minima</label>
                <input type="number" class="notaMinima form-control"
                    value="<?php echo $datosActividad['notaMinima']; ?>" id="notaMinima" placeholder="Nota minima">

                <label for="visibilidadActividad">Visibilidad de la Actividad</label>
                <select class="visibilidadActividad seleccion form-select" id="visibilidadActividad"
                    aria-label="Default select example">
                    <?php if ($datosActividad['visible'] == 0) { ?>
                        <option value="0" selected>Visible</option>
                        <option value="1">Invisible</option>
                    <?php } else { ?>
                        <option value="0">Visible</option>
                        <option value="1" selected>Invisible</option>
                    <?php } ?>
                </select>

                <label for="selectActivarPorcentaje">Activar Porcentaje</label>
                <select id="selectActivarPorcentaje" class="selectActivarPorcentaje form-select"
                    aria-label="Default select example">
                    <?php if ($datosActividad['activarPorcentaje'] == 0) { ?>
                        <option value="0" selected>Activado</option>
                        <option value="1">Desactivado</option>
                    <?php } else { ?>
                        <option value="0">Activado</option>
                        <option value="1" selected>Desactivado</option>
                    <?php } ?>
                </select>

                <div id="porcentajeContenedor" class="porcentajeContenedor">
                    <label for="">Porcentaje Actividad</label>
                    <input type="number" value="<?php echo $datosActividad['Porcentaje'] ?>"
                        class="porcentajeActividad form-control" id="porcentajeActividad" placeholder="0">
                </div>

                <button type="submit" class="btn btn-primary mt-2">Confirmar Cambios</button>
            </form>
        </div>

    </section>

    <script>
        //Funcion JQuery para validar el cantidad MAX de archivos
        $(function () {

            $("button[type='submit']").click(function () {

                var $fileUpload = $("input[type='file']");
                //El 2 de aqui es el limitador de archivos. Solo se tiene que cambiar 
                //Con el valor de la base de datos que limita los archivoss
                if (parseInt($fileUpload.get(0).files.length) > 2) {
                    alert("Solo puedes subir el maximo de 2 archivos");
                } else {
                    editarActividad();
                }
            });
        });

        $("#entrega").submit(function (e) {
            e.preventDefault(e);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var selectActivarPorcentaje = document.getElementById("selectActivarPorcentaje");
            var porcentajeContenedor = document.getElementById("porcentajeContenedor");

            // Ocultar por defecto al cargar la página si está desactivado
            if (selectActivarPorcentaje.value === "1") {
                porcentajeContenedor.style.display = "none";
            }

            // Escuchar cambios en el select
            selectActivarPorcentaje.addEventListener("change", function () {
                if (selectActivarPorcentaje.value === "0") {
                    porcentajeContenedor.style.display = "block"; // Mostrar si está activado
                } else {
                    porcentajeContenedor.style.display = "none"; // Ocultar si está desactivado
                }
            });
        });
    </script>

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

    <?php require "../../assests/php/editarActividadMain.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>