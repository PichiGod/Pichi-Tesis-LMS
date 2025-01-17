<?php

require "../../assests/php/LoginBD.php";

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

        }

    }

}
if (isset($_GET['id_cur']) && isset($_GET['id_act']) && isset($_GET['id_ent'])) {
    $id_curso_seleccionado = $_GET['id_cur'];
    $id_act_seleccionado = $_GET['id_act'];
    $id_ent_seleccionado = $_GET['id_ent'];

    $consultaEntrega = mysqli_query($mysqli, "SELECT * FROM entregas WHERE id_entregas = '$id_ent_seleccionado' AND id_user = '$usuarios1' AND id_actividad = '$id_act_seleccionado'");

    if (mysqli_num_rows($consultaEntrega) > 0) {
        $datosEntrega = mysqli_fetch_assoc($consultaEntrega);
    }

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
    <title>Editar Entrega</title>
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

    <style>
        .disable {
            pointer-events: none;
            background-color: lightgrey;
        }
    </style>
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
                <a href="cursos.php" class="nav_link1 active ">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <?php if ($rol == 0) { ?>
                    <a href="verCalif.php?id_cur=<?php echo $id_curso_seleccionado; ?>" class="nav_link1 link-dark">
                        <i class="bx bx-news nav_icon"></i>
                        <span class="nav_name">Evaluaciones</span>
                    </a>
                <?php } ?>
                <?php if ($rol != 0) { ?>
                    <a href="MenuAdmin.php" class="nav_link1 link-dark">
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

            <a
                href="verActividad.php?id_act=<?php echo $id_act_seleccionado; ?>&id_cur=<?php echo $id_curso_seleccionado; ?>"><i
                    class="fa-solid mt-2  fa-arrow-left" style="font-size:2rem;color:black;"></i></a>
            <h1 class="text-center pt-2">Editar Entrega</h1>

            <form action="" autocomplete="off" id="entrega" method="post" enctype="multipart/form-data">
                <input type="hidden" id="action" value="editarEntrega">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Entrega de actividad</h4>
                        <p class="card-text">Maxima cantidad de archivos: 2</p>
                        <p class="card-text">Maxima peso de archivo: <?php echo $datosActividad['pesoArchivo'] ?> MB</p>
                        <input type="hidden" value="<?php echo $datosActividad['pesoArchivo']; ?>" id="fileSize" />
                        <input type="hidden" value="<?php echo $id_ent_seleccionado; ?>" id="id_ent" />
                        <input type="hidden" value="<?php echo $id_cur_seleccionado; ?>" id="id_cur" />
                        <input type="hidden" value="<?php echo $id_act_seleccionado; ?>" id="id_act" />
                        <div class="mb-1">
                            <label for="formFileMultiple" class="form-label">Seleccionar archivos...</label>
                            <input class="form-control" type="file" id="files" name="files[]" multiple>
                        </div>
                        <p class="mb-0"><strong>Inserta un texto</strong></p>
                        <div id="editor">
                            <?php echo $datosEntrega['texto_entrega']; ?>
                        </div>
                        <input type="hidden" id="texto_actividad" class="texto_actividad" name="texto_actividad">
                        <div>



                        </div>
                    </div>

                </div>

                Lista de archivos
                <ul class="list-group mt-2">
                    <?php if ($datosEntrega['archivo'] == null && $datosEntrega['archivoAdicional'] == null) { ?>

                        <li class="list-group-item">
                            No hay archivos disponibles
                        </li>
                    <?php } else if ($datosEntrega['archivo'] != null) { ?>
                            <?php
                            $archivo = $datosEntrega['archivo'];
                            $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                            if ($extension == 'doc' || $extension == 'docx') {
                                $icon = '<i class="fa-solid mt-1 fa-file-word"></i>';
                            } elseif ($extension == 'pdf') {
                                $icon = '<i class="fa-solid fa-file-pdf"></i>';
                            } else {
                                $icon = '<i class="fa-solid fa-file"></i>';
                            }
                            ?>

                            <li class="list-group-item ">
                            <?= $icon ?> <a class="ms-2 text-break" target="_blank" rel="noopener noreferrer"
                                    href="../../assests/php/descargarEntrega.php?file_name=<?= $archivo ?>"><?= $archivo ?></a>
                                <input type="hidden" id="actionArchivo1" value="borrar"></input>
                                <input type="hidden" id="archivoActual" value="<?= $archivo ?>"></input>
                                <button class="btn btn-link mb-1 p-0 ms-2" onclick="borrarArchivo();">
                                    <span>Eliminar</span>
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </li>

                    <?php }
                    ;
                    if ($datosEntrega['archivoAdicional'] != null) { ?>
                        <?php
                        $archivoAdicional = $datosEntrega['archivoAdicional'];
                        $extensionAdicional = pathinfo($archivoAdicional, PATHINFO_EXTENSION);
                        if ($extensionAdicional == 'doc' || $extensionAdicional == 'docx') {
                            $iconAdicional = '<i class="fa-solid fa-file-word"></i>';
                        } elseif ($extensionAdicional == 'pdf') {
                            $iconAdicional = '<i class="fa-solid fa-file-pdf"></i>';
                        } else {
                            $iconAdicional = '<i class="fa-solid fa-file"></i>';
                        }
                        ?>

                        <li class="list-group-item">
                            <?= $iconAdicional ?> <a class="ms-2 text-break" target="_blank" rel="noopener noreferrer"
                                href="../../assests/php/descargarEntrega.php?file_name=<?= $archivoAdicional ?>"><?= $archivoAdicional ?></a>
                            <input type="hidden" id="actionArchivo2" value="borrarAdicional"></input>
                            <input type="hidden" id="aAdicionalActual" value="<?= $archivoAdicional ?>"></input>
                            <button class="btn btn-link mb-1 p-0 ms-2" onclick="borrarArchivoAdicional();">
                                <span>Eliminar</span>
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </li>
                    <?php }
                    ; ?>
                </ul>
            </form>


            <button type="submit" class="btn mt-2 btn-primary">Aceptar cambios</button>

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
                    editarEntrega();
                }
            });
        });

        $("#entrega").submit(function (e) {
            e.preventDefault(e);
        });
    </script>

    <?php require "../../assests/php/editarEntregaMain.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>