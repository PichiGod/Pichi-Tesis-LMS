<?php

require "../assests/php/LoginBD.php";

if(isset($_SESSION['id_user'])){

  if($_SESSION['Login']==true){

  header("location: home.php ");

  }elseif($_SESSION['Login']==false){

    header("location: home.php ");

  }



}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio de Seccion</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous" />
    <!-- CSS only -->
    <link rel="stylesheet" href="../assests/css/colorPallete.css" />
    <link rel="stylesheet" href="../assests/css/login.css" />
  </head>
  <body class="bg-pastel">
    <!--- Navbar -->
    <header>
      <nav class="navbar bg-body-tertiary shadow">
        <div class="container-fluid">
          <a class="navbar-brand ms-3" href="../index.html">
            <img
              src="../assests/img/text-1710023184778.png"
              alt="Bootstrap"
              width="70"
              height="24" />
          </a>
          <div class="d-flex justify-content-end">
            <a
              name="regis"
              id="regis"
              class="btn btn-secundary d-flex shadow me-3"
              href="registro.php"
              role="button"
              >Registrarse</a
            >
            <a
              name="login"
              id="login"
              class="btn btn-primary me-4 d-flex shadow"
              href="#"
              role="button"
              >Iniciar sesión</a
            >
          </div>
        </div>
      </nav>
    </header>

    <section name="formulario">
     <form action="" method="post">
      <input type="hidden" name="" id="action" value="Login" class="action">
      <div name="formulario" class="bg-pastel">
        <div class="formulario pt-2 px-3 bg-blanco shadow rounded">
          <div>
            <p class="fs-1 text-center">Inicio de sesión</p>
          </div>

          <hr class="mx-5" />

            <div>
              <div class="form-floating mb-3 w-auto align-self-center">
              <input type="number" class="cedulaLogin form-control" name="cedulaLogin" id="cedulaLogin" placeholder="" />
                <label for="formId1">Identificación del Usuario</label>
              </div>
            </div>

            <div>
              <div class="form-floating mb-4">
              <input type="text" class="contrasenaLogin form-control" name="contrasenaLogin" id="contrasenaLogin" placeholder="" />
                <label for="formId1">Contraseña</label>
              </div>
            </div>

            <div class="text-center">
              <button type="button" class="btn btn-primary mb-4" onclick="submitData();">
                Iniciar Sesión
              </button>
            </div>
          
        </div>
      </div>
      </form>
    </section>
    <?php require "../assests/php/LoginMain.php"; ?>
  </body>
</html>