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
        <a class="navbar-brand ms-3" href="../../index.html">
          <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
        </a>
        <div class="d-flex justify-content-end">
          <div class="vr me-2"></div>
          <div class="nav-item dropdown">
            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
              <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary" href="#">English</a>
            </button>
            <ul class="dropdown-menu">
              <li class="dropdown-item">
                <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary"
                  href="../es/registro.php">Spanish (Latin America)</a>
              </li>
            </ul>
          </div>
          <div class="vr me-2"></div>
          <a name="regis" id="regis" class="btn btn-secundary d-flex shadow me-3" href="#" role="button">Sign Up</a>
          <a name="login" id="login" class="btn btn-primary me-4 d-flex shadow" href="login.php" role="button">Login</a>
        </div>
      </div>
    </nav>
  </header>

  <section name="formulario">
    <!-- Formulario de registro -->
    <div name="formulario" class="bg-pastel">
      <div class="pt-2 px-3 bg-blanco shadow rounded formulario">
        <div>
          <p class="fs-1 text-center">Sign Up</p>
        </div>

        <hr class="mx-5" />

        <div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control form" name="formId1" id="formId1" placeholder="" />
            <label for="formId1">Username</label>
          </div>
        </div>

        <div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control form" name="formId1" id="formId1" placeholder="" />
            <label for="formId1">Email</label>
          </div>
        </div>

        <div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control form" name="formId2" id="formId2" placeholder="" />
            <label for="formId1">R.I.F.</label>
          </div>
        </div>

        <div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control form" name="formId3" id="formId3" placeholder="" />
            <label for="formId1">Password</label>
          </div>
        </div>

        <div>
          <div class="form-floating mb-4">
            <input type="text" class="form-control form" name="formId4" id="formId4" placeholder="" />
            <label for="formId1">Confirm password</label>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary mb-4">
            Sign Up
          </button>
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
</body>

</html>