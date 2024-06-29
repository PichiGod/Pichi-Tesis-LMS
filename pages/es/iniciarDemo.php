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
        <nav class="navbar container-fluid bg-body-tertiary shadow">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" href="../../index.html">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>
                <div class="d-flex flex-wrap">
                    <div class="vr me-2"></div>
                    <div class="nav-item dropdown ">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary"
                                href="#">Español
                                (Latino America)</a>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                                    href="../en/login.php">Inglés</a>
                            </li>
                        </ul>
                    </div>
                    <div class="vr me-2"></div>
                    <!-- <div>
                        <a name="regis" id="regis" class="btn btn-secondary shadow me-3" href="registro.php"
                            role="button">Registrarse</a>
                    </div> -->
                    <div>
                        <a name="demo" id="demo" class="btn btn-secondary shadow me-3"
                            href="#" role="button">Demo</a>
                    </div>

                    <div>
                        <a name="login" id="login" class="btn btn-primary shadow" href="./SeccionInicio.php" role="button">Iniciar
                            Sesión</a>
                    </div>


                </div>
            </div>
        </nav>
    </header>

    <section name="formulario" class="d-flex justify-content-center align-items-center my-5">
        <form action="" autocomplete="off" class="w-50" method="post">
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
                            <label for="formId1">Identificación del Usuario</label>
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
                            <select class="form-select" disabled id="empresa" aria-label="Floating label select example">
                                <option hidden disabled selected>Pichi</option>
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
                        <p>Para iniciar el demo ponga en los campos la siguiente informacion</p>
                        <p>Para inciar como administrador:</p>
                        <ul>
                            <li>Identificacion del usuario: 00000003</li>
                            <li>Contraseña: admin</li>
                        </ul>
                        <p>Para iniciar como docente:</p>
                        <ul>
                            <li>Identificacion del usuario: 00000001</li>
                            <li>Contraseña: docente</li>
                        </ul>
                        <p>Para iniciar como estudiante:</p>
                        <ul>
                            <li>Identificacion del usuario: 00000002</li>
                            <li>Contraseña: estudiante</li>
                        </ul>
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