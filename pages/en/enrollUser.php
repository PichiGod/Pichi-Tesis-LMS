<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscribir</title>
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
                                    href="../es/inscribirUsuario.php">Spanish (Latin America)</a>
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
                <a href="#" class="nav_link link-dark">
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
            <h1 class="text-center">Enroll User</h1>

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Filter</button>
            </form>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card my-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://github.com/PichiGod.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Full Name</h5>
                                    <p class="card-text">
                                        ID number
                                    </p>
                                    <p class="card-text">
                                        Email
                                    </p>
                                    <p class="card-text">
                                        Role
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card my-3" style="max-width: 540px;">

                        <div class="card-body overflow-auto " style="height:20rem;">
                            <ul class="list-group overflow-auto">
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
                                    <label class="form-check-label" for="firstCheckbox">Matematica</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
                                    <label class="form-check-label" for="secondCheckbox">Brawl</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                    <label class="form-check-label" for="thirdCheckbox">Ser pro</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                    <label class="form-check-label" for="thirdCheckbox">Programacion</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                    <label class="form-check-label" for="thirdCheckbox">El puteo</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                    <label class="form-check-label" for="thirdCheckbox">Gocheria</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                    <label class="form-check-label" for="thirdCheckbox">Bobolongo</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                    <label class="form-check-label" for="thirdCheckbox">Santiago es gay</label>
                                </li>
                            </ul>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary">Enroll</button>
                        </div>

                    </div>
                </div>
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