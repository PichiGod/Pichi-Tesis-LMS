<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

  $usuarios1 = $_SESSION['id_user'];

  $conexion1 = mysqli_query($mysqli, "SELECT Empresa_id_empresa, rol, nombre_user, apellido_user FROM usuario WHERE id_user = '$usuarios1'");

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

  }

}

if (isset($_GET['id_cur'])) {
  $id_curso_seleccionado = $_GET['id_cur'];
  $consultaCurso = mysqli_query($mysqli, "SELECT cursos.nombre_cur, empresa.nombre_empresa
                                    FROM cursos 
                                    LEFT JOIN empresa ON empresa.id_empresa = cursos.Empresa_id_empresa
                                    WHERE id_cur = '$id_curso_seleccionado'");

  if (mysqli_num_rows($consultaCurso) > 0) {
    $datos3 = mysqli_fetch_assoc($consultaCurso);
    $curso = $datos3['nombre_cur'];
    $empresa = $datos3['nombre_empresa'];
  }

  $consultaComentarios = mysqli_query($mysqli, "SELECT Usuario.nombre_user, Usuario.apellido_user, foro_curso.id_foro_cur, foro_curso.mensaje, foro_curso.modif_fecha, foro_curso.usuario_id_user
  FROM foro_curso 
  LEFT JOIN Usuario ON Usuario.id_user = foro_curso.usuario_id_user
  WHERE curso_id_curso = '$id_curso_seleccionado'
  ORDER BY modif_fecha ASC");

  if (mysqli_num_rows($consultaComentarios) > 0) {
    while ($datosComentarios = mysqli_fetch_assoc($consultaComentarios)) {
      $Comentarios[] = $datosComentarios;
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Foro</title>
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
              <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary" href="#">Español
                (Latino America)</a>
            </button>
            <ul class="dropdown-menu">
              <li class="dropdown-item">
                <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary" href="#">Inglés</a>
              </li>
            </ul>
          </div>
          <!--Opciones de Usuario ver.Español-->
          <div class="vr me-3"></div>
          <div class="btn-group dropstart me-4 pe-2">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
              id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/PichiGod.png" alt="..." width="32" height="32" class="rounded-circle me-2" />
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
                <a class="btn dropdown-item log-out" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">
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

  <!--Contenido Usuario-->
  <section>
    <div class="container-fluid bg-blanco my-3 py-2 shadow">
      <a href="verCurso.php?id_cur=<?php echo $id_curso_seleccionado ?>"><i class="fa-solid mt-2 fa-arrow-left"
          style="font-size:2rem;color:black;"></i></a>
      <!--Titulo-->
      <div class="p-2 mb-2 rounded shadow">
        <h2><strong>Foro - <?php echo $curso; ?> - <?php echo $empresa; ?></strong></h2>
      </div>

      <form action="" method="post" enctype="multipart/form-data">
        <!--Input de tema. (Sujeto a Cambios)-->
        <div class="rounded ">

          <input type="hidden" name="ID_CUR" id="ID_CUR" class="ID_CUR" value="<?php echo $id_curso_seleccionado ?>">
          <input type="hidden" name="ID_USER" id="ID_USER" class="ID_USER" value="<?php echo $usuarios1 ?>">
          <input type="hidden" name="" id="action" value="EnviarComentario">

          <div class="">
            <label for="comentario" class="form-label">Contenido de comentario</label>
            <textarea class="form-control" id="comentario" rows="3"></textarea>
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary mt-2" onclick="submitData();" id="enviarTema">
                Enviar
              </button>
            </div>
          </div>
        </div>
      </form>

      <hr />

      <div>
        <div class="p-2  rounded shadow">
          <h3>Comentarios</h3>
        </div>


        <?php

        if (mysqli_num_rows($consultaComentarios) > 0) {

          foreach ($Comentarios as $comentario): ?>
            <div class="row fs-6 mt-3 mx-2 border border-3 rounded bg-secondary-subtle">
              <div class="col-3 p-0 text-center">
                <figure class="figure mt-1">
                  <img src="https://github.com/PichiGod.png" class="img-fluid rounded-circle"
                    style="width: 3rem; height: auto" alt="..." />
                  <figcaption class="figure-caption fs-6 text-body text-center ">
                    <?php echo $comentario['nombre_user'] . " " . $comentario['apellido_user']; ?> <br>
                    <!-- <?php echo $comentario['modif_fecha'] ?> -->
                    <?php echo date('d/m/Y H:i', strtotime($comentario['modif_fecha'])); ?><br>
                    <!-- <p class="font-monospace m-0 p-0">(Editado)</p> -->
                  </figcaption>
                </figure>
              </div>
              <div class="col-9 text-wrap">
                <div class="bg-white rounded border">
                  <p class="mb-0 fs-6 p-2">
                    <?php echo $comentario['mensaje'] ?>
                  </p>
                </div>
                <?php if ($comentario['usuario_id_user'] == $usuarios1 || $rol == 2 ) {
                  ?>
                  <button class="btn btn-link m-0 p-0"
                    onclick="location.href='modifComentario.php?idComen=<?php echo $comentario['id_foro_cur']; ?>&id_cur=<?php echo $id_curso_seleccionado; ?>'"
                    title="Editar">
                    <i class="fa-regular fa-pen-to-square"></i>
                  </button>

                  <button onclick="eliminarComentario(<?php echo $comentario['id_foro_cur'] ?>);" title="Eliminar"
                    class="btn btn-link m-0 p-0 ms-1">
                    <i class="fa-solid fa-trash"></i>
                  </button>

                  <?php
                }
                ;
                ?>

              </div>
            </div>
          <?php endforeach;
        } else { ?>

          <div class="item-recurso d-flex container bg-secondary-subtle text-secondary-emphasis p-3"
            style="padding: 10px;">
            <div>
              <div>
                <span>No hay Comentarios en el foro</span>
              </div>
            </div>
          </div>


        <?php } ?>

        <!-- <div class="row fs-6 mt-3 mx-2 border border-3 rounded bg-secondary-subtle">
            <div class="col-3 p-0 text-center">
              <figure class="figure mt-1">
                <img src="https://github.com/PichiGod.png" class="img-fluid rounded-circle"
                  style="width: 4rem; height: auto" alt="..." />
                <figcaption class="figure-caption text-body text-center ">
                  Pichi <br> 13/05/2024 - 12:00
                </figcaption>
              </figure>
            </div>
            <div class="col-9 text-wrap">
              <div class="bg-white rounded border">
                <p class="mb-0 p-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum quia praesentium
                  iusto
                  reiciendis vitae. Aliquam quas ex consectetur necessitatibus nisi nostrum similique eum ea
                  laboriosam,
                  at placeat, eligendi atque adipisci.
                </p>
              </div>


              <button class="btn btn-link m-0 p-0" onclick="location.href='modifComentario.php'" title="Editar">
                <i class="fa-regular fa-pen-to-square"></i>
              </button>

              <button onclick="eliminarComentario();" title="Eliminar" class="btn btn-link m-0 p-0 ms-1">
                <i class="fa-solid fa-trash"></i>
              </button>
            </div>

          </div> -->


      </div>
    </div>
  </section>

  <script>
    function eliminarComentario(id) {
      //console.log(id);
      confimar = confirm('Seguro que quiere eliminar el comentario?');
      if (confimar == true) {
        //e.preventDefault();
        //Accion para borrar comentario
        borrarComentario(id);
        //alert('El comentario ha sido eliminado')
      }
    }
  </script>

  <?php require "../../assests/php/enviarComentarioMain.php"; ?>
  <?php require "../../assests/php/borrarComentarioMain.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>