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

if (isset($_GET['id_cur']) && isset($_GET['id_act'])) {
    $id_curso_seleccionado = $_GET['id_cur'];
    $id_act_seleccionado = $_GET['id_act'];

    $consultaActividad = mysqli_query($mysqli, "SELECT notaMaxima, notaMinima FROM actividades WHERE idActividades = '$id_act_seleccionado'");
    if (mysqli_num_rows($consultaActividad) > 0) {
        $datosActividad = mysqli_fetch_assoc($consultaActividad);
    }

    $consultaNotas = mysqli_query($mysqli, "SELECT n.idNotas, n.notaAlumno, n.retroalimentacion,
                                                u.identificacion_user, u.nombre_user, u.apellido_user,
                                                e.texto_entrega, e.archivo, e.archivoAdicional
                                            FROM notas n
                                            LEFT JOIN usuario u ON u.id_user = n.Usuario_id_user 
                                            LEFT JOIN entregas e ON e.id_entregas = n.Entregas_id_entregas 
                                            WHERE n.Actividad_id_act  = '$id_act_seleccionado'");
    if (mysqli_num_rows($consultaNotas) > 0) {
        while ($datosNotas = mysqli_fetch_assoc($consultaNotas)) {
            $Notas[] = $datosNotas;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Nota</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--Sidebar.js-->
    <script src="../../assests/js/sidebar.js"></script>

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

        .disable {
            pointer-events: none;
            background-color: lightgrey;
        }

        .paragraph-as-textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            height: 100px;
            /* adjust the height to your liking */
            resize: vertical;
            overflow-y: auto;
            font-family: Arial, sans-serif;
            font-size: 14px;
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
                    class="fa-solid mt-2 fa-arrow-left" style="font-size:2rem;color:black;"></i></a>
            <h1 class="text-center pt-2">Editar Nota</h1>
            <h4 class="text-center fw-light">Haga click en un estudiante para seleccionar</h4>


            <form class="d-flex" role="search">
                <input class="form-control me-2" id="searchInput" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Filtrar</button>
            </form>

            <div class="row mt-2 d-flex">
                <div class="col-md col-sm col-lg-6 mb-2">
                    <table style="height: 400px;" class="table overflow-auto table-bordered border-secondary ">
                        <thead>
                            <tr>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombre(s)</th>
                                <th scope="col">Apellido(s)</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php
                            if (mysqli_num_rows($consultaNotas) > 0) {
                                $n = 0;
                                foreach ($Notas as $nota):
                                    $n++;
                                    ?>
                                    <tr onclick="selectRow(this, <?php echo $n; ?>);">
                                        <td scope="row"><?php echo $nota['identificacion_user']; ?></td>
                                        <td><?php echo $nota['nombre_user']; ?></td>
                                        <td><?php echo $nota['apellido_user']; ?></td>
                                        <!--Contador para buscar en el momento de editar la nota--->
                                        <input type="hidden" id="contador-<?php echo $n; ?>" 
                                        value="<?php echo $n ?>"/>

                                        <!--Información del Usuario-->
                                        <input type="hidden" id="nombre-<?php echo $n; ?>"
                                            value="<?php echo $nota['nombre_user']; ?>">
                                        <input type="hidden" id="apellido-<?php echo $n; ?>"
                                            value="<?php echo $nota['apellido_user']; ?>">

                                        <!--Informacion de la entrega calificada-->
                                        <input type="hidden" id="texto-<?php echo $n; ?>"
                                            value="<?php echo $nota['texto_entrega']; ?>">
                                        <input type="hidden" id="archivo-<?php echo $n; ?>"
                                            value="<?php echo $nota['archivo']; ?>">
                                        <input type="hidden" id="archivoAdicional-<?php echo $n; ?>"
                                            value="<?php echo $nota['archivoAdicional']; ?>">

                                        <!---Informacion de la nota asignada--->
                                        <input type="hidden" id="idNotas-<?php echo $n; ?>"
                                            value="<?php echo $nota['idNotas']; ?>">
                                        <input type="hidden" id="notaAlumno-<?php echo $n; ?>"
                                            value="<?php echo $nota['notaAlumno'] ?>" />
                                        <input type="hidden" id="retro-<?php echo $n; ?>"
                                            value="<?php echo $nota['retroalimentacion'] ?>" />
                            </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-md col-sm ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Estudiante Seleccionado</h4>
                            <p class="card-text fs-5" id="userName">Nombre estudiante</p>
                            <p class="paragraph-as-textarea" rows="3" name="" id="mensaje" disabled>
                            <h4 class="card-title">Archivos entregados</h4>
                            <ul id="ul" class="list-group">
                                <li id="li1" class="list-group-item">
                                    <i class="fa-solid fa-file"></i> <a class="ms-2" id="file" href="#">Archivo #1</a>
                                </li>
                                <li id="li2" class="list-group-item">
                                    <i class="fa-solid fa-file"></i> <a class="ms-2" id="aFile" href="#">Archivo #2</a>
                                </li>
                            </ul>
                            <form action="" autocomplete="off">
                                <hr>
                                <p class="card-text font-monospace m-0">La nota máxima de la actividad es
                                    <strong>
                                        <?php echo $datosActividad['notaMaxima']; ?>
                                    </strong> <br>
                                    La nota mínima para aprobar es
                                    <strong>
                                        <?php echo $datosActividad['notaMinima']; ?>
                                    </strong>
                                </p>
                                <input type="hidden" id="contador">
                                <input type="hidden" id="notaMaxima"
                                    value="<?php echo $datosActividad['notaMaxima']; ?>">
                                <input type="hidden" id="id_cur" value="<?php echo $id_curso_seleccionado; ?>">
                                <input type="hidden" id="id_act" value="<?php echo $id_act_seleccionado; ?>">
                                <input type="hidden" id="action" value="editarNota">
                                <textarea tabindex="-1" rows="4" class="form-control mt-1 disable" id="retro"
                                    placeholder="Retroalimentacion"></textarea>
                        </div>
                        <div class="card-footer">
                            <div class="input-group ">
                                <input id="calif" tabindex="-1" type="number" class="form-control disable"
                                    placeholder="Nota" aria-label="Nota"
                                    aria-describedby="basic-addon2">
                                <!-- Botón para calificar -->
                                <button id="btn-calif" tabindex="-1" type="button"
                                    onclick="submitData(document.getElementById('contador').value);"
                                    class="btn btn-outline-primary disabled">
                                    Calificar Activiad
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <script>

        function selectRow(row, n) {
            //Requeridos para la interfaz
            const selectedRow = document.querySelector(".table tbody tr.table-active");
            const Retroalimentacion = document.getElementById('retro');
            const buttonCalif = document.getElementById("btn-calif");
            const inputCalif = document.getElementById("calif");
            const file = document.getElementById("file");
            const aFile = document.getElementById("aFile");
            const nombre = document.getElementById('userName');
            const li1 = document.getElementById('li1');
            const li2 = document.getElementById('li2');
            const ul = document.getElementById('ul');
            const contador = document.getElementById('contador');

            //Mostrar la informacion del mensaje si la tiene;
            const textoEntrega = document.getElementById(`texto-${n}`).value;
            //console.log(textoEntrega);
            const mensaje = document.getElementById('mensaje');
            mensaje.innerHTML += textoEntrega;

            //Buscar el archivo de la entrega
            const archivo = document.getElementById(`archivo-${n}`).value;
            //console.log(archivo);
            //Validacion si el archivo no existe
            if (archivo == '' || archivo == null) {
                li1.style.display = 'none';
            }
            //Mostrar el archivo
            const extension = archivo.split('.').pop();
            let icon = '';
            if (extension === 'doc' || extension === 'docx') {
                icon = '<i class="fa-solid fa-file-word"></i>';
            } else if (extension === 'pdf') {
                icon = '<i class="fa-solid fa-file-pdf"></i>';
            } else {
                icon = '<i class="fa-solid fa-file"></i>';
            }
            li1.innerHTML = icon + `<a class="ms-2" href='../../assests/php/descargarEntrega.php?file_name=${archivo}' target="_blank" rel="noopener noreferrer"> ` + archivo + `</a>`;

            //Buscar el archivoAdicional de la entrega
            const archivoAdicional = document.getElementById(`archivoAdicional-${n}`).value;
            //console.log(archivoAdicional);
            //Validacion si el archivo existe
            if (archivoAdicional == "" || archivoAdicional == null) {
                li2.style.display = 'none';
            }
            //Mostrar el archivo
            const extensionAdicional = archivoAdicional.split('.').pop();
            let iconAdicional = '';
            if (extensionAdicional === 'doc' || extensionAdicional === 'docx') {
                iconAdicional = '<i class="fa-solid fa-file-word"></i>';
            } else if (extensionAdicional === 'pdf') {
                iconAdicional = '<i class="fa-solid fa-file-pdf"></i>';
            } else {
                iconAdicional = '<i class="fa-solid fa-file"></i>';
            }
            li2.innerHTML = iconAdicional + `<a class="ms-2" href='../../assests/php/descargarEntrega.php?file_name=${archivoAdicional}' target="_blank" rel="noopener noreferrer"> ` + archivoAdicional + `</a>`;

            //Agarra el nombre completo del estudiante
            const name = document.getElementById(`nombre-${n}`).value;
            const apellido = document.getElementById(`apellido-${n}`).value;
            nombre.innerText = name + " " + apellido;

            //Agarrar y mostrar la nota ya asignada
            const nota = document.getElementById(`notaAlumno-${n}`).value;
            const retro = document.getElementById(`retro-${n}`).value;
            inputCalif.value = nota;
            Retroalimentacion.value = retro;

            //Graber el id de la entrega
            const idNotas = document.getElementById(`contador-${n}`).value;
            contador.value = idNotas;

            if (selectedRow) {
                selectedRow.classList.remove("table-active");
            }
            row.classList.add("table-active");
            buttonCalif.classList.remove("disabled");
            inputCalif.classList.remove("disable");
            Retroalimentacion.classList.remove('disable');
        }

    </script>

    <?php require "../../assests/php/editarNotaMain.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>