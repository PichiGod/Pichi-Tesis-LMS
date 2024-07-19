<?php

require "../../assests/php/LoginBD.php";

// Inicializar variables
$nombreCompleto = "";
$identificacion = "";
$correo = "";
$rol2 = "";
$id_user = "";
$cursos = [];
$img_perfil = "default.png";
$actividades = [];
if (isset($_SESSION['id_user']) && isset($_SESSION['usuariosActive'])) {  

  $usuarios1 = $_SESSION['id_user'];

  $usuariosActivos = $_SESSION['usuariosActive'];

  $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, img_perfil, rol, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

  if (mysqli_num_rows($conexion1) > 0) {

    $datos = mysqli_fetch_assoc($conexion1);

    $empresaUsuario = $datos['Empresa_id_empresa'];

    $nombreUsuario = $datos['nombre_user'];

    $apellidoUsuario = $datos['apellido_user'];

    $rol = $datos['rol'];

    $conexion2 = mysqli_query($mysqli, "SELECT nombre_empresa FROM empresa WHERE id_empresa = '$empresaUsuario'");

    if (mysqli_num_rows($conexion2) > 0) {

      $datos2 = mysqli_fetch_assoc($conexion2);

      $nombreEmpresa = $datos2['nombre_empresa'];

    }

    $conexion3 = mysqli_query($mysqli, "SELECT * FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");

    if (mysqli_num_rows($conexion3) > 0) {

      $cursosCantidad = mysqli_num_rows($conexion3);

      // Verificar si se envió el formulario de búsqueda
      if (isset($_GET['identificacion']) && !empty($_GET['identificacion'])) {
        // Obtener la identificación del formulario
        $identificacion = $_GET['identificacion'];

        // Consulta para obtener datos del usuario por identificación
        $consulta_usuario = mysqli_query($mysqli, "SELECT id_user, img_perfil, nombre_user, apellido_user, identificacion_user, correo_user, rol FROM usuario WHERE identificacion_user = '$identificacion' AND Empresa_id_empresa = '$empresaUsuario'");

        // Verificar si se encontraron resultados
        if (mysqli_num_rows($consulta_usuario) > 0) {
            // Extraer datos del usuario
            $datos_usuario = mysqli_fetch_assoc($consulta_usuario);

            // Asignar los datos a variables
            $id_user = $datos_usuario['id_user'];
            $nombreCompleto = $datos_usuario['nombre_user'] . ' ' . $datos_usuario['apellido_user'];
            $identificacion = $datos_usuario['identificacion_user'];
            $correo = $datos_usuario['correo_user'];
            $img_perfil = $datos_usuario['img_perfil'];
            $rol2 = $datos_usuario['rol'];

            // Validate if the user is a user
            if ($rol2 != 0) {
              echo "<script>alert('El usuario elegido no es un estudiante!');</script>";
              $id_user = "";
              $nombreCompleto = "";
              $identificacion = "";
              $correo = "";
              $img_perfil = "default.png";
              $rol = "";
          } else {
              $rol2 = "Estudiante";

              $consultaCursos = mysqli_query($mysqli, 
              "SELECT * FROM inscripcion LEFT JOIN cursos ON cursos.id_cur = inscripcion.Cursos_id_cur WHERE inscripcion.Usuario_id_user = '$id_user';
              ");

              if(mysqli_num_rows($consultaCursos) > 0){
                while ($datos3 = mysqli_fetch_assoc($consultaCursos)) {
                  $cursos[] = $datos3;
                } 
                } 

          }
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
  <title>Consultar Rendimiento</title>
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
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="header_toggle" id="toggle1">
                    <i class="bx bx-menu" id="header-toggle"></i>
                </div>
                <a class="navbar-brand" href="../../index.php">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>

                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-flex">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!--Cambio de Idioma ver.Español-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                    <span class="fa-solid fa-earth-americas me-2"></span>Español (Latino America)
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                                            href="../en/viewPerfomance.php">Inglés</a>
                                    </li>
                                </ul>
                            </li>
                            <!--Opciones de Usuario ver.Español-->
                            <li class="nav-item dropstart">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="../../assests/archivos/imagen/<?php echo $datos['img_perfil'];?>" alt="" width="32" height="32"
                                            class="rounded-circle me-2" />
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
      <h1 class="text-center pt-2">Consultar Rendimiento Academico</h1>

      <form class="d-flex" role="search" method="GET" action="">
        <div class="input-group">
          <input class="form-control me-2" type="number" placeholder="Buscar Estudiante por Cedula..."
            aria-label="Search" name="identificacion" value="<?php echo $identificacion; ?>">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </div>
      </form>

      <div class="card mt-2" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="../../assests/archivos/imagen/<?php echo $img_perfil;?>" width="auto" height="150" class="rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $nombreCompleto; ?></h5>
              <p class="card-text">
                <b>Identificación:</b> <?php echo $identificacion; ?>
              </p>
              <p class="card-text">
                <b>Correo Electronico:</b> <?php echo $correo; ?>
              </p>
              <p class="card-text">
                <b>Rol: </b><?php echo $rol2; ?>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
          <table class="table table-striped table-bordered mt-2" style="white-space: nowrap;">
              <thead>
                  <tr>
                      <th scope="col">Id Curso</th>
                      <th scope="col">Nombre Curso</th>
                      <th scope="col">Nota</th>
                      <!-- <th scope="col">Porcentaje</th> -->
                  </tr>
              </thead>
              <tbody>
                  <?php if (empty($cursos)){ ?>
                    <tr>
                      <td colspan="4" class="text-center">No hay cursos registrados</td>
                    </tr>
                  <?php } else {
                    $n = 0;
                    $notaMedia = 0;
                    foreach ($cursos as $curso) { 
                      $n++;?>
                        <tr>
                            <th scope="row"><?= $curso['id_cur'] ?></th>
                            <td><?= $curso['nombre_cur'] ?></td>
                            <td id='notaMedia-<?php echo $n;?>'></td>
                            <!-- <td></td> -->
                        </tr>
                        <tr>
                            <td colspan="4">
                                <table class="table mb-0">
                                    <thead>
                                        <th scope="col">Actividad</th>
                                        <th scope="col">Nota Minima</th>
                                        <th scope="col">Nota maxima</th>
                                        <th scope="col">Nota</th>
                                        <th scope="col">Porcentaje</th>
                                        <th scope="col">Aporte al curso</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //$query = "SELECT * FROM actividades a LEFT JOIN notas n ON n.Cursos_id_cur = a.idCurso_id_cur WHERE idCurso_id_cur = \"" . $curso['id_cur'] . "\"";
                                        $query ="SELECT a.Titulo, a.notaMinima, a.notaMaxima, a.activarPorcentaje, a.Porcentaje,
                                                       (SELECT n.NotaAlumno
                                                        FROM notas n
                                                        WHERE n.Actividad_id_act = a.idActividades AND n.Usuario_id_user = '$id_user') AS NotaAlumno,
                                                       (SELECT n.retroalimentacion
                                                        FROM notas n
                                                        WHERE n.Actividad_id_act = a.idActividades AND n.Usuario_id_user = '$id_user') AS retroalimentacion
                                                    FROM actividades a
                                                    WHERE a.visible = 0 AND a.idCurso_id_cur = \"" . $curso['id_cur'] . "\"";
                                        $consultaActividades = mysqli_query($mysqli, $query);
                                        $i = 0;
                                        while ($actividad = mysqli_fetch_assoc($consultaActividades)) { 
                                          $i++;?>
                                            <tr>
                                                <th scope="row"><?= $actividad['Titulo'] ?></th>
                                                <td><?= $actividad['notaMinima'] ?></td>
                                                <td><?= $actividad['notaMaxima'] ?></td>
                                                <?php if ($actividad['NotaAlumno'] == null) { ?>
                                                    <td>-</td>
                                                <?php } else { $notaMedia += $actividad['NotaAlumno']; ?>

                                                    <td><?php echo $actividad['NotaAlumno']; ?></td>
                                                <?php }
                                                ; ?>
                                                <td><?php echo (($actividad['NotaAlumno'] * 100) / $actividad['notaMaxima']) ?>%</td>
                                                <?php if ($actividad['activarPorcentaje'] == "1") { ?>
                                                    <td>-</td>
                                                <?php } else { ?>
                                                    <td><?php echo $actividad['Porcentaje']; ?>%</td>
                                                <?php }
                                                ; ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php } ?>
                      <script>
                        let notaMedia = <?php  echo $notaMedia; ?>;
                        let notaMediaFinal = notaMedia / <?php echo $i; ?>;
                        document.getElementById("notaMedia-<?php echo $n;?>").innerHTML = notaMediaFinal.toFixed(2);
                      </script>
                  <?php } ?>
              </tbody>
          </table>
      </div>

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