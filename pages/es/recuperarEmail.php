<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

    if ($_SESSION['Login'] == true) {

        header("location: Inicio.php ");

    } elseif ($_SESSION['Login'] == false) {

        header("location: Inicio.php ");

    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Link Enviado</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Font Awesome  icons (free version)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link rel="stylesheet" href="../../assests/css/colorPallete.css" />
    <link rel="stylesheet" href="../../assests/css/login.css" />
</head>

<body class="bg-pastel">
    <!--- Navbar -->
    <header>
        <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
      <div class="container-fluid">
        <a class="navbar-brand ms-3" href="#">
          <img src="assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--Cambio de Idioma ver.Español-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                  href="#">
                  <span class="fa-solid fa-earth-americas me-2"></span>Español
                  (Latino
                  America)
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item">
                    <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                      href="#">Inglés</a>
                  </li>
                </ul>
              </li>

              <li class="nav-item mt-1 me-2">
                <a name="demo" id="demo" class="btn btn-secondary " href="./iniciarDemo.php"
                  role="button">Demo</a>
              </li>
              <li class="nav-item mt-1">
                <a name="login" id="login" class="btn btn-primary " href="./SeccionInicio.php"
                  role="button">Iniciar sesión</a>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </nav>
    </header>

    <section name="formulario" class="d-flex justify-content-center align-items-center mt-5">

        <div name="formulario" class="bg-pastel w-50">
            <div class="formulario py-2 px-3 bg-blanco shadow rounded">
                <div>
                    <p class="fs-1 text-center">Recuperar Contraseña</p>
                </div>

                <hr class="mx-5" />

                <div>
                    <p>Un correo a sido enviado a '<strong>dsjoseale@gmail.com</strong>'. Ingrese al link enviado para
                        continuar.</p>
                </div>

            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <?php require "../../assests/php/LoginMain.php"; ?>
</body>

</html>