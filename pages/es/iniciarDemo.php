<?php

require "../../assests/php/LoginBD.php";

if (isset($_SESSION['id_user'])) {

  if ($_SESSION['Login'] == true) {

    header("location: Inicio.php ");

  } elseif ($_SESSION['Login'] == false) {

    header("location: Inicio.php ");

  }
}

$consultaEmpresas = mysqli_query($mysqli, "SELECT * FROM empresa");
if (mysqli_num_rows($consultaEmpresas) > 0) {
  while ($datosEmpresas = mysqli_fetch_assoc($consultaEmpresas)) {
    $Empresas[] = $datosEmpresas;
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio Demo</title>
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
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" href="../../index.php">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="d-flex">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--Cambio de Idioma ver.Español-->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false" href="#">
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
                                <a name="demo" id="demo" class="btn btn-secondary " href="#" role="button">Demo</a>
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

    <section name="formulario" class="d-flex justify-content-center align-items-center my-5">
        <!-- <div class="container-fluid">

        </div> -->
        <form action="" autocomplete="off" class="w-75" method="post">
            <input type="hidden" name="" id="action" value="Login" class="action">
            <div name="formulario">
                <div class="formulario py-2 px-3 bg-blanco shadow rounded">
                    <div>
                        <p class="fs-1 text-center">Iniciar Demo</p>
                    </div>

                    <hr class="mx-5" />

                    <div>
                        <div class="form-floating mb-4 w-auto align-self-center">
                            <input type="number" class="cedulaLogin form-control" name="cedulaLogin" id="cedulaLogin"
                                placeholder="" />
                            <label for="formId1">Identificación</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-4">
                            <input type="password" class="contrasenaLogin form-control" name="contrasenaLogin"
                                id="contrasenaLogin" placeholder="" />
                            <label for="formId1">Contraseña</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-4">
                        <select class="form-select" id="empresa" aria-label="Floating label select example">
                        <option hidden disabled selected>Seleccione la empresa</option>
                        <?php foreach ($Empresas as $empresa) { 
                        if ($empresa['id_empresa'] == 3) {
                            ?>
                            <option value="<?php echo $empresa['id_empresa']; ?>"><?php echo $empresa['nombre_empresa']; ?>
                            </option>
                        <?php }
                        }
                ; ?>
              </select>
                            <label for="empresa">Empresa</label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary mb-4" onclick="submitData();">
                            Iniciar Demo
                        </button>
                    </div>

                    <div class="border font-monospace rounded mx-2 p-2 bg-white">
                        <p>Para iniciar el demo ponga en los campos la siguiente informacion <br>
                            AVISO: LA INFORMACION INSERTADA EN EL DEMO SE BORRARA CADA 24 HORAS
                        </p>
                        <!-- <p>Para inciar como administrador:</p>
                        <ul>
                            <li>Identificacion del usuario: 00000003</li>
                            <li>Contraseña: admin</li>
                        </ul> -->
                        <p>Para iniciar como admin:</p>
                        <ul>
                            <li>Identificacion del usuario: 00000001</li>
                            <li>Contraseña: 12345</li>
                        </ul>
                        <!-- <p>Para iniciar como estudiante:</p>
                        <ul>
                            <li>Identificacion del usuario: 00000002</li>
                            <li>Contraseña: estudiante</li>
                        </ul> -->
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
    <?php require "../../assests/php/LoginMain.php"; ?>
</body>

</html>