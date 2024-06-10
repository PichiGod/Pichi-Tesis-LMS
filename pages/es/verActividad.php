<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

    $usuarios1 = $_SESSION['id_user'];
    $conexion1 = mysqli_query(
        $mysqli,
        "SELECT Empresa_id_empresa, rol, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'"
    );
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

if (isset($_GET['id_cur']) && isset($_GET['id_act'])) {
    $id_curso_seleccionado = $_GET['id_cur'];
    $id_act_seleccionado = $_GET['id_act'];

    $consultaCurso = mysqli_query($mysqli, "SELECT cursos.nombre_cur, empresa.nombre_empresa
                                    FROM cursos 
                                    LEFT JOIN empresa ON empresa.id_empresa = cursos.Empresa_id_empresa
                                    WHERE id_cur = '$id_curso_seleccionado'");

    if (mysqli_num_rows($consultaCurso) > 0) {
        $datos3 = mysqli_fetch_assoc($consultaCurso);
        $curso = $datos3['nombre_cur'];
        $empresa = $datos3['nombre_empresa'];
    }

    $consultaActividades = mysqli_query($mysqli, "SELECT * FROM actividades WHERE idActividades = '$id_act_seleccionado'");

    if (mysqli_num_rows($consultaActividades) > 0) {
        while ($datosActividad = mysqli_fetch_assoc($consultaActividades)) {
            $Actividades[] = $datosActividad;
        }

    }

    $consultaEntrega = mysqli_query($mysqli, "SELECT * FROM entregas WHERE id_user = '$usuarios1' AND id_actividad = '$id_act_seleccionado'");
    if (mysqli_num_rows($consultaEntrega) > 0) {
        //echo "Aqui estoy";
        $noentrega = false;
        $datosEntrega = mysqli_fetch_assoc($consultaEntrega);

    } else {
        $noentrega = true;
    }
    ;

    $consultaNota = mysqli_query($mysqli, "SELECT * FROM notas WHERE Usuario_id_user = '$usuarios1' AND Actividad_id_act = '$id_act_seleccionado'");
    $noNota = false;
    if (mysqli_num_rows($consultaNota) > 0) {
        while ($datosNotas = mysqli_fetch_assoc($consultaEntrega)) {
            $notas[] = $datosNotas;
        }

    } else {
        $noNota = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ver actividad</title>
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

    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                                    href="../en/viewActivity.php">Inglés</a>
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

    <section class="Cursos">

        <div class="container-fluid bg-blanco mt-3 shadow ">
            <!--Titulo-->
            <div class="container pt-4 mb-3 pb-3">
                <a href="verCurso.php?id_cur=<?php echo $id_curso_seleccionado; ?>"><i
                        class="fa-solid mt-2 fa-arrow-left" style="font-size:2rem;color:black;"></i></a>

                <?php

                if (mysqli_num_rows($consultaActividades) > 0) {

                    foreach ($Actividades as $actividad): ?>

                        <div class="p-2 mb-2 rounded shadow ">
                            <h2><strong><?php echo $actividad['Titulo']; ?> - <?php echo $empresa; ?></strong></h2>
                        </div>

                        Descripción
                        <div class="bg-white rounded border py-1 ">
                            <p class="mb-0 ms-1">
                            <div class="mx-2">
                                <?php echo $actividad['ContenidoAcitividad']; ?>
                            </div>
                            </p>
                        </div>

                        <div class="d-inline-flex align-items-center bg-dark-subtle px-2 mt-2 mb-1 rounded">
                            <p class="mb-0">Fecha de Inicio:
                                <?php $fechaIni = date('d/m/Y', strtotime($actividad['fechaInicio']));
                                echo $fechaIni; ?>
                            </p>
                        </div>

                        <div class="d-inline-flex align-items-center bg-dark-subtle px-2 mt-2 mb-1 rounded">
                            <p class="mb-0">Fecha de Culminacion:
                                <?php $fechaFin = date('d/m/Y', strtotime($actividad['fechaCulminacion']));
                                echo $fechaFin; ?>
                            </p>
                        </div>

                        <hr>

                        <div class="p-2 my-3 rounded shadow ">
                            <h4>Archivos de la actividad </h4>
                        </div>

                        <?php if ($actividad['archivosPrincipal'] == null) { ?>
                            <ul class="list-group mb-1">
                                <li class="list-group-item">
                                    No hay archivos disponibles
                                </li>
                            <?php } else { ?>

                                <ul class="list-group mb-1">
                                    <li class="list-group-item">
                                        <i class="fa-solid fa-file"></i> <a class="ms-2"
                                            href="#"><?php echo $actividad['archivosPrincipal']; ?></a>
                                    </li>


                                <?php }
                        if ($actividad['archivosAdicional'] != null) { ?>
                                    <li class="list-group-item">
                                        <i class="fa-solid fa-file"></i> <a class="ms-2"
                                            href="#"><?php echo $actividad['archivosAdicional']; ?></a>
                                    </li>
                                <?php }
                        ; ?>
                            </ul>

                            <?php if ($rol == 0) { ?>
                                <div class="d-inline-flex align-items-center bg-dark-subtle px-2 mt-2 mb-1 rounded fs-4">
                                    <div class="me-3">
                                        <p class="card-text">Estado de entrega</p>
                                    </div>
                                    <div>
                                        <div class="vr mt-2 " style="width:0.2rem; height:2rem;"></div>
                                    </div>
                                    <div class="ms-3 mb-1">
                                        <?php if ($noentrega == true) { ?>
                                            <span class="badge text-bg-danger"><strong>No entregado</strong></span>
                                        <?php } else { ?>
                                            <span class="badge text-bg-success"><strong>Entregado</strong></span>
                                        <?php }
                                        ; ?>
                                    </div>
                                </div>

                                <hr>

                                <div class="card">
                                    <div class="card-body">
                                        <?php if ($noentrega == true) { ?>
                                            <form action="" id="entrega" method="post" enctype="multipart/form-data">
                                                <div>
                                                    <h4 class="card-title">Entrega de actividad</h4>
                                                    <p class="card-text">Maxima cantidad de archivos: 2</p>
                                                    <p class="card-text">Maxima peso de archivo: <?php echo $actividad['pesoArchivo'] ?>
                                                        MB
                                                    </p>
                                                    <input type="hidden" value="<?php echo $actividad['pesoArchivo']; ?>"
                                                        id="fileSize" />
                                                    <input type="hidden" name="" id="action" value="EntregarActividad">
                                                    <input type="hidden" name="ID_USER" id="ID_USER" class="ID_USER"
                                                        value="<?php echo $usuarios1; ?>">
                                                    <input type="hidden" name="ID_ACT" id="ID_ACT" class="ID_ACT"
                                                        value="<?php echo $id_act_seleccionado; ?>">
                                                    <div class="mb-3">
                                                        <label for="files" class="form-label">Seleccionar archivos...</label>
                                                        <input class="form-control" type="file" id="files" name="files[]" multiple>
                                                    </div>

                                                    <p class="mb-0"><strong>Inserta un texto</strong></p>
                                                    <div id="editor">
                                                    </div>
                                                    <input type="hidden" id="texto_actividad" class="texto_actividad"
                                                        name="texto_actividad">
                                                    <div>

                                                    </div>
                                                    <input type="submit" value="Entregar" class="btn btn-primary mt-2" />
                                                </div>
                                            </form>
                                        <?php } else { ?>
                                            <div>
                                                <div>
                                                    <div
                                                        class="d-flex align-items-center bg-body-secondary px-2 mb-2 me-2 rounded fs-5">
                                                        <div class="me-3">
                                                            <p class="card-text">Docente</p>
                                                        </div>
                                                        <div>
                                                            <div class="vr mt-2 " style="width:0.2rem; height:2rem;"></div>
                                                        </div>
                                                        <div class="ms-3">
                                                            <span><strong>Jose Alejandro Duarte Salcedo</strong></span>
                                                        </div>
                                                    </div>

                                                    <!-- Force next columns to break to new line at md breakpoint and up -->
                                                    <div class="w-100 d-none d-md-block"></div>
                                                    <div
                                                        class="d-inline-flex align-items-center bg-body-secondary px-2 mb-2 me-2 rounded fs-5">
                                                        <div class="me-3">
                                                            <p class="card-text">Estado de Calificacion</p>
                                                        </div>
                                                        <div>
                                                            <div class="vr mt-2 " style="width:0.2rem; height:2rem;"></div>
                                                        </div>
                                                        <div class="ms-3 mb-1">
                                                            <?php if ($noNota == true) { ?>
                                                                <span class="badge bg-warning-subtle text-warning-emphasis"><strong>No
                                                                        calificado</strong></span>
                                                            <?php } else { ?>
                                                                <span class="badge text-bg-success"><strong>Calificado</strong></span>
                                                            <?php }
                                                            ; ?>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-inline-flex align-items-center bg-body-secondary px-2 mb-2 rounded fs-5">
                                                        <div class="me-3">
                                                            <p class=" card-text">Calificacion del profesor</p>
                                                        </div>
                                                        <div>
                                                            <div class="vr mt-2 " style="width:0.2rem; height:2rem;"></div>
                                                        </div>
                                                        <div class="ms-3">
                                                            <?php if ($noNota == true) { ?>
                                                                <span><strong>No
                                                                        calificado</strong></span>
                                                            <?php }
                                                            ; ?>

                                                        </div>
                                                    </div>
                                                    <p class="mb-0 fs-5">Retroalimentación</p>
                                                    <div class="p-2 mb-2 border rounded">
                                                        <p id="retro" class="mb-0">
                                                            <?php if ($noNota = true) { ?>
                                                                <strong>No
                                                                    calificado</strong>
                                                            <?php }
                                                            ; ?>
                                                            <!-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora ad
                                                deleniti eaque dolore necessitatibus minus! Saepe eligendi adipisci est
                                                atque
                                                quas, sequi voluptatibus velit similique nisi voluptatem amet, alias minima. -->
                                                        </p>
                                                    </div>

                                                </div>

                                                <hr>
                                            </div>

                                            <div>
                                                <p class="font-monospace mb-0">Ultima modificacion:
                                                    <?php $fechaModif = date('d/m/Y', strtotime($datosEntrega['fecha_modificacion']));
                                                    echo $fechaModif; ?>
                                                </p>
                                                <?php $pattern = '/<p><br><\/p>/'; // expresión regular para buscar el patrón. Usar '/<p>\s*<br\s*\/>\s*<\/p>/' para ser mas flexible
                                                if (!preg_match($pattern, $datosEntrega['texto_entrega'])) { ?>
                                                    <h4 class="card-title">Texto</h4>
                                                    <div class="bg-white rounded border py-1 ">
                                                        <p class="mb-0 ms-1">
                                                        <div class="mx-2">
                                                            <?php echo $datosEntrega['texto_entrega']; ?>
                                                        </div>
                                                        </p>
                                                    </div>
                                                <?php }
                                                ; ?>
                                                <h4 class="card-title mt-1">Archivos entregados</h4>

                                                <?php if ($datosEntrega['archivo'] == null) { ?>
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            No se enviaron archivos
                                                        </li>
                                                    <?php } else { ?>

                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <i class="fa-solid fa-file"></i> <a class="ms-2"
                                                                href="../../assests/php/descargarEntrega.php?file_name=<?php echo $datosEntrega['archivo'];?>">
                                                                    <?php echo $datosEntrega['archivo']; ?>
                                                                </a>
                                                            </li>


                                                        <?php }
                                                if ($datosEntrega['archivoAdicional'] != null) { ?>
                                                            <li class="list-group-item">
                                                                <i class="fa-solid fa-file"></i> <a class="ms-2" href="../../assests/php/descargarEntrega.php?file_name=<?php echo $datosEntrega['archivoAdicional'];?>">
                                                                    <?php echo $datosEntrega['archivoAdicional']; ?></a>
                                                            </li>
                                                        <?php }
                                                ; ?>
                                                    </ul>
                                                    <hr>
                                                    <h4 class="card-title">Editar entrega</h4>
                                                    <button
                                                        onclick="location.href='editarEntrega.php?id_act=<?php echo $id_act_seleccionado; ?>&id_cur=<?php echo $id_curso_seleccionado; ?>'"
                                                        class="btn btn-primary">Editar</button>
                                            </div>
                                        <?php }
                                        ; ?>





                                    </div>
                                </div>


                            <?php }
                            ; ?>

                        <?php endforeach;
                }
                ; ?>

                    <?php if ($rol != 0) { ?>

                        <hr>

                        <div>

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Opciones</h4>
                                    <button
                                        onclick="location.href='asignarNota.php?id_act=<?php echo $id_act_seleccionado; ?>&id_cur=<?php echo $id_curso_seleccionado; ?>'"
                                        class="btn btn-primary">Asignar
                                        nota</button>
                                    <button
                                        onclick="location.href='editarNota.php?id_act=<?php echo $id_act_seleccionado; ?>&id_cur=<?php echo $id_curso_seleccionado; ?>'"
                                        class="btn btn-secondary">Editar
                                        nota</button>
                                    <button
                                        onclick="location.href='editarActividad.php?id_act=<?php echo $id_act_seleccionado; ?>&id_cur=<?php echo $id_curso_seleccionado; ?>'"
                                        class="btn btn-outline-secondary">Editar Actividad</button>
                                </div>
                            </div>
                        </div>

                    <?php }
                    ; ?>

            </div>
        </div>

    </section>

    <script>
        //Funcion JQuery para validar el cantidad MAX de archivos
        $(function () {

            $("input[type='submit']").click(function () {

                var $fileUpload = $("input[type='file']");
                //El 2 de aqui es el limitador de archivos. Solo se tiene que cambiar 
                //Con el valor de la base de datos que limita los archivoss
                if (parseInt($fileUpload.get(0).files.length) > 2) {
                    alert("Solo puedes subir el maximo de 2 archivos");
                } else {
                    submitData();
                }
            });

            // $("#entrega").submit(function(e){
            //     e.preventDefault(e);
            // });
        });
    </script>

    <?php if ($noentrega == true) { ?>
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
    <?php }
    ; ?>

    <?php require "../../assests/php/entregarActividadMain.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>