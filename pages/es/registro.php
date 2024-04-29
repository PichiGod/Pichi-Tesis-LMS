<?php

require "../../assests/php/conexion.php";

// Realizar la consulta a la tabla empresa
$query = "SELECT nombre_empresa FROM empresa";
$result = mysqli_query($mysqli, $query);

// Arreglo para almacenar los nombres de las empresas
$empresas = array();

// Iterar sobre los resultados y almacenar los nombres de las empresas
while ($row = mysqli_fetch_assoc($result)) {
    $empresas[] = $row['nombre_empresa'];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
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
    <nav class="navbar bg-body-tertiary shadow">
      <div class="container-fluid">
        <a class="navbar-brand ms-3" href="../index.html">
          <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
        </a>
        <div class="d-flex justify-content-end">
          <div class="vr me-2"></div>
          <div class="nav-item dropdown">
            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
              <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary" href="#">Español
                (Latino America)</a>
            </button>
            <ul class="dropdown-menu">
              <li class="dropdown-item">
                <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                  href="../en/registration.php">Inglés</a>
              </li>
            </ul>
          </div>
          <div class="vr me-2"></div>
          <a name="regis" id="regis" class="btn btn-secundary d-flex shadow me-3" href="#" role="button">Registrarse</a>
          <a name="login" id="login" class="btn btn-primary me-4 d-flex shadow" href="SeccionInicio.php"
            role="button">Iniciar sesión</a>
        </div>
      </div>
    </nav>
  </header>
  <section name="formulario">
      <form action="" method="post">
        <input type="hidden" name="" id="action" value="Register">
      <div name="formulario" class="bg-pastel">
        <div class="containerRegistro pt-2 px-3 bg-blanco shadow rounded formulario">
          <div>
            <p class="fs-1 text-center">Registro</p>
          </div>

          <hr class="mx-5" />

          <div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="nombreUsuario form-control form"
                name="formId1"
                id="nombreUsuario"
                placeholder="" />
              <label for="formId1">Nombre de usuario</label>
            </div>
          </div>

          <div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="apellidoUsuario form-control form"
                name="formId1"
                id="apellidoUsuario"
                placeholder="" />
              <label for="formId1">Apellido de usuario</label>
            </div>
          </div>


          <div>
            <div class="form-floating mb-3">
              <input
                type="email"
                class="correoUsuario form-control form"
                name="formId1"
                id="correoUsuario"
                placeholder="" />
              <label for="">Correo Electronico</label>
            </div>
          </div>

          <div>
            <div class="form-floating mb-3">
              <input
                type="number"
                class="rifUsuario form-control form"
                name="formId2"
                id="rifUsuario"
                placeholder="" />
              <label for="formId1">R.I.F.</label>
            </div>
          </div>

          <div>
            <div class="form-floating mb-3">
              <input
                type="password"
                class="contrasenaUsuario form-control form"
                name="formId3"
                id="contrasenaUsuario"
                placeholder="" />
              <label for="formId1">Contraseña</label>
            </div>
          </div>


          <div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="direccionUsuario form-control form"
                name="formId3"
                id="direccionUsuario"
                placeholder="" />
              <label for="formId1">Dirección</label>
            </div>
          </div>

          <div>
            <div class="form-floating mb-4">
            <select class="GeneroUsuario form-select" aria-label="Default select example" id="GeneroUsuario">
        <option selected>Masculino</option>
        <option value="1">Femenino</option>
        </select>
              <label for="formId1">Genero</label>
            </div>
          </div>

          <div>
                        <div class="form-floating mb-4">
                            <select class="Empresa form-select" aria-label="Default select example" id="Empresa" name="Empresa">
                                <option selected disabled>Seleccione una empresa</option>
                                <?php foreach ($empresas as $empresa) : ?>
                                    <option value="<?php echo $empresa; ?>"><?php echo $empresa; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="Empresa">Empresa</label>
                        </div>
                    </div>

          <div>
            <div class="form-floating mb-3">
              <input type="date" class="fechaNacimiento form-control" id="fechaNacimiento" name="fecha">
              <label for="formId1">Fecha de Nacimineto</label>
            </div>
          </div>
          
          <div>
          <div class="form-floating mb-3 w-auto align-self-center">
                <input
                  type="number"
                  class="telefonoUsuario form-control"
                  name="formId1"
                  id="telefonoUsuario"
                  placeholder="" />
                <label for="formId1">Telefono</label>
              </div>
            </div>

          <div class="text-center">
            <button type="button" class="btn btn-primary mb-4" onclick="submitData();">
              Registrarse
            </button>
          </div>

        </div>
      </div>
      </form>
    </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>

    <?php require "../../assests/php/registerMain.php"; ?>

</body>



</html>