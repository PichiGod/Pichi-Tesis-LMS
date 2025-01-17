<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrar</title>
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
                    <!--Cambio de Idioma ver.Ingles-->
                    <div class="vr me-2"></div>
                    <div class="nav-item dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                                href="#">English</a>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary"
                                    href="../es/ingresarUsuario.php">Spanish (Latin America)</a>
                            </li>
                        </ul>
                    </div>
                    <!--Opciones de Usuario ver.Ingles-->
                    <div class="vr me-3"></div>
                    <div class="btn-group dropstart me-4 pe-2">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/PichiGod.png" alt="" width="32" height="32"
                                class="rounded-circle me-2" />
                            <strong><?php echo $nombreUsuario . " " . $apellidoUsuario; ?></strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li>
                                <a class="dropdown-item" href="viewUser.php">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="btn dropdown-item log-out" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" href="">
                                    <i class="bx bx-log-out log-out-modal"></i>
                                    <span class="ms-2">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar ver.Ingles-->
    <div class="l-navbar bg-body-tertiary" id="nav-bar">
        <nav class="nav">
            <div class="nav_list">
                <a href="home.php" class="nav_link link-dark">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Home</span>
                </a>
                <a href="tutoIngles.php" class="nav_link link-dark">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Tutorial</span>
                </a>
                <a href="courses.php" class="nav_link link-dark">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Courses</span>
                </a>
                <a href="adminMenu.php" class="nav_link active">
                    <i class="bx bx-cog nav_icon"></i>
                    <span class="nav_name">Manage</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Modal ver.Ingles-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Log Out
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to Log out?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Return
                    </button>
                    <button type="button" onclick="location.href='../../assests/php/cerrarSesion.php'"
                        class="btn btn-primary">Log Out</button>
                </div>
            </div>
        </div>
    </div>

    <!--Contenido-->
    <section>
        <div class="container-fluid bg-blanco my-3 pb-2 shadow">
            <a href="MenuAdmin.php" class="mt-2 position-absolute"><i class="fa-solid fa-arrow-left"
                    style="font-size:2rem;color:black;"></i></a>
            <h1 class="text-center">Insert User</h1>

            <form action="" method="post">
                <input type="hidden" name="" id="action" value="Register">
                <div name="formulario">

                    <hr class="mx-5" />

                    <div>
                        <div class="form-floating mb-3">
                            <input type="text" class="nombreUsuario form-control form" name="formId1" id="nombreUsuario"
                                placeholder="" />
                            <label for="formId1">User's First Name</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3">
                            <input type="text" class="apellidoUsuario form-control form" name="formId1"
                                id="apellidoUsuario" placeholder="" />
                            <label for="formId1">User's Last Name</label>
                        </div>
                    </div>


                    <div>
                        <div class="form-floating mb-3">
                            <input type="email" class="correoUsuario form-control form" name="formId1"
                                id="correoUsuario" placeholder="" />
                            <label for="">Email</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3">
                            <input type="number" class="rifUsuario form-control form" name="formId2" id="rifUsuario"
                                placeholder="" />
                            <label for="formId1">Id number</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3">
                            <input type="password" class="contrasenaUsuario form-control form" name="formId3"
                                id="contrasenaUsuario" placeholder="" />
                            <label for="formId1">Password</label>
                        </div>
                    </div>


                    <div>
                        <div class="form-floating mb-3">
                            <input type="text" class="direccionUsuario form-control form" name="formId3"
                                id="direccionUsuario" placeholder="" />
                            <label for="formId1">Address</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-4">
                            <select class="GeneroUsuario form-select" aria-label="Default select example"
                                id="GeneroUsuario">
                                <option selected>Male</option>
                                <option value="1">Female</option>
                            </select>
                            <label for="formId1">Gender</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-4">
                            <select class="Empresa form-select" aria-label="Default select example" id="Empresa"
                                name="Empresa">
                                <option selected disabled>Aqui quiero que la unica opcion sea la empresa del admin</option>
                                <?php foreach ($empresas as $empresa): ?>
                                    <option value="<?php echo $empresa; ?>"><?php echo $empresa; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="Empresa">Company</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3">
                            <input type="date" class="fechaNacimiento form-control" id="fechaNacimiento" name="fecha">
                            <label for="formId1">Date of birth</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3 w-auto align-self-center">
                            <input type="number" class="telefonoUsuario form-control" name="formId1"
                                id="telefonoUsuario" placeholder="" />
                            <label for="formId1">Phone number</label>
                        </div>
                    </div>

                    <div>
                        <div class="form-floating mb-3 w-auto">
                            <p class="text-center">Insert as:</p>
                            <div class="form-floating mb-3 d-flex justify-content-evenly">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Student
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Teacher
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary mb-4" onclick="submitData();">
                            Insert User
                        </button>
                    </div>

                </div>
            </form>
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