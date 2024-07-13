<?php

require "../../assests/php/LoginBD.php";

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

    $conexion2 = mysqli_query($mysqli, "SELECT nombre_empresa, id_empresa FROM empresa WHERE id_empresa = '$empresaUsuario'");

    if (mysqli_num_rows($conexion2) > 0) {

      $datos2 = mysqli_fetch_assoc($conexion2);

      $nombreEmpresa = $datos2['nombre_empresa'];

      $idEmpresa = $datos2['id_empresa'];

    }

    $conexion3 = mysqli_query($mysqli, "SELECT * FROM cursos WHERE Empresa_id_empresa = '$empresaUsuario'");

    if (mysqli_num_rows($conexion3) > 0) {

      $cursosCantidad = mysqli_num_rows($conexion3);

      $verPeriodo = mysqli_query($mysqli, "SELECT * FROM periodo WHERE id_empresa = '$idEmpresa'");

      if (mysqli_num_rows($verPeriodo) > 0){
        while ($row = mysqli_fetch_assoc($verPeriodo)) {
          $periodos[] = $row;
        }
      } else {
        $periodos = null;
      }

    } else {

      $cursosCantidad = 0;

    }

  }

}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ver Periodos</title>
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
        <a class="navbar-brand" href="../../index.php">
          <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
        </a>

        <div class="d-flex flex-wrap justify-content-end">
          <!--Cambio de Idioma ver.Español-->
          <div class="vr me-2"></div>
          <div class="nav-item dropdown">
            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
              <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary" href="#">Español
                (Latino America)</a>
            </button>
            <ul class="dropdown-menu">
              <li class="dropdown-item">
                <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                  href="../en/viewPeriod.php">Inglés</a>
              </li>
            </ul>
          </div>
          <!--Opciones de Usuario ver.Español-->
          <div class="vr me-3"></div>
          <div class="btn-group dropstart me-4 pe-2">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
              id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../../assests/archivos/imagen/<?php echo $datos['img_perfil'];?>" alt="..." width="32" height="32" class="rounded-circle me-2" />
              <strong>
                <?php echo $nombreUsuario . " " . $apellidoUsuario; ?>
              </strong>
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
        <a href="cursos.php" class="nav_link link-dark">
          <i class="bx bxs-book nav_icon"></i>
          <span class="nav_name">Cursos</span>
        </a>
        <?php if ($rol != 0) { ?>
          <a href="MenuAdmin.php" class="nav_link active">
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
      <h1 class="text-center pt-2">Visualizar Periodos Academicos</h1>

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Filtrar</button>
      </form>

      <div class="table-responsive">
        <table class="table mt-2">
          <thead>
            <tr>
              <th scope="col">Id Perido</th>
              <th scope="col">Nombre del perido</th>
              <th scope="col">Fecha Inicio</th>
              <th scope="col">Fecha Culminación</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php if($periodos == null)
              {?>
              <td colspan="5" class="text-center">No hay periodos registrados</td>
              <?php }
              else{ foreach ($periodos as $periodo) { ?>
                <th scope="row"><?php echo $periodo['id_peri']; ?></th>
                <td><?php echo $periodo['nombre_peri']; ?></td>
                <td><?php echo $periodo['fecha_ini_peri']; ?></td>
                <td><?php echo $periodo['fecha_fin_peri']; ?></td>
                <td>
                
                <button onclick="location.href='modifPeriodo.php?idPeri=<?php echo $periodo['id_peri'];?>'" class="btn mt-1 btn-primary me-1">
                  Modificar
                </button>
                <button onclick="eliminarPeri(<?php echo $periodo['id_peri']; ?>);" class="btn mt-1 btn-outline-danger">
                  Eliminar
                </button>
              </td>
            </tr>
            <?php } 
          }?>
          </tbody>
        </table>
      </div>

    </div>
  </section>

  <?php require "../../assests/php/borrarPeriodoMain.php" ?>

  <script>
    function eliminarPeri(id) {
      confimar = confirm('Seguro que quiere eliminar al periodo?');
      if (confimar == true) {
        // e.preventDefault();
        borrarPeriodo(id);
        //Accion para borrar usuario
        //alert('El periodo ha sido eliminado')
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>