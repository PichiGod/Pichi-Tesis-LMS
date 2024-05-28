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
          <i class="bx bx-user nav_icon"></i>
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
        <a href="MenuAdmin.php" class="nav_link link-dark">
          <i class="bx bx-cog nav_icon"></i>
          <span class="nav_name">Administrar</span>
        </a>
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
      <!--Titulo-->
      <div class="p-2 mb-2 rounded shadow">
        <h2><strong>Foro - Nombre del curso - Empresa</strong></h2>
      </div>

      <!--Input de tema. (Sujeto a Cambios)-->
      <div class="rounded ">
        <div class="">
          <br />
          <label for="descripcionDiscusion" class="form-label">Contenido de comentario</label>
          <textarea class="form-control" id="descripcionDiscusion" rows="3"></textarea>
          <div class="d-flex justify-content-end">
            <button class="btn btn-primary mt-2" id="enviarTema">
              Enviar
            </button>
          </div>
        </div>
      </div>

      <hr />

      <div>
        <div class="p-2  rounded shadow">
          <h3>Comentarios</h3>
        </div>

        <div class="container my-3 fs-6 bg-secondary-subtle rounded text-secondary-emphasis">
          <div class="d-flex flex-row align-items-center justify-content-center">
            <div class="pt-2 px-2 flex-fill me-4">
              <figure class="figure">
                <img src="https://github.com/PichiGod.png" class="figure-img img-fluid rounded-circle"
                  style="width: 6rem; height: auto" alt="..." />
                <figcaption class="figure-caption text-body text-center ">
                  Pichi
                </figcaption>
              </figure>
            </div>
            <div class="p-2  text-body text-break">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam et
              alias dolorem ipsam earum vel incidunt? Culpa mollitia
              cupiditate numquam commodi, explicabo quas ducimus delectus
              consectetur, nulla repellendus doloribus eum?
            </div>
            <div class="p-2 text-body  ms-auto">
              <p>13/05/2024 12:00</p>
              <div class="text-center">
                <a title="Editar" href="#">
                  <i class="fa-regular fa-pen-to-square"></i>
                </a>

                <a onclick="eliminarComentario();" title="Eliminar" class="ms-1" href="#">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <script>
        function eliminarComentario() {
            confimar = confirm('Seguro que quiere eliminar el comentario?');
            if (confimar == true) {
                // e.preventDefault();
                //Accion para borrar comentario
                alert('El comentario ha sido eliminado')
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