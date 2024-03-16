<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
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
              href="#"
              role="button"
              >Registrarse</a
            >
            <a
              name="login"
              id="login"
              class="btn btn-primary me-4 d-flex shadow"
              href="login.php"
              role="button"
              >Iniciar seccion</a
            >
          </div>
        </div>
      </nav>
    </header>

    <section name="formulario">
      <!-- Formulario de registro -->
      <div name="formulario" class="bg-pastel">
        <div class="pt-2 px-3 bg-blanco shadow rounded formulario">
          <div>
            <p class="fs-1 text-center">Registro</p>
          </div>

          <hr class="mx-5" />

          <div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control form"
                name="formId1"
                id="formId1"
                placeholder="" />
              <label for="formId1">Nombre de usuario</label>
            </div>
          </div>

          <div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control form"
                name="formId1"
                id="formId1"
                placeholder="" />
              <label for="formId1">Correo Electronico</label>
            </div>
          </div>

          <div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control form"
                name="formId2"
                id="formId2"
                placeholder="" />
              <label for="formId1">R.I.F.</label>
            </div>
          </div>

          <div>
            <div class="form-floating mb-3">
              <input
                type="text"
                class="form-control form"
                name="formId3"
                id="formId3"
                placeholder="" />
              <label for="formId1">Contraseña</label>
            </div>
          </div>

          <div>
            <div class="form-floating mb-4">
              <input
                type="text"
                class="form-control form"
                name="formId4"
                id="formId4"
                placeholder="" />
              <label for="formId1">Comprobar contraseña</label>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary mb-4">
              Iniciar Seccion
            </button>
          </div>

        </div>
      </div>
    </section>
  </body>
</html>