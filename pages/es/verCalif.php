<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evaluaciones</title>
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
                <a class="navbar-brand" href="../index.html">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70"
                        height="24" />
                </a>

                <div class="d-flex justify-content-end">
                    <div class="vr me-3"></div>
                    <div class=" btn-group dropstart me-4 pe-2">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/PichiGod.png" alt="" width="32" height="32"
                                class="rounded-circle me-2" />
                            <strong><?php echo $nombreUsuario . " " . $apellidoUsuario; ?></strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <a class="dropdown-item" href="viewUser.php">Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="../../assests/php/cerrarSesion.php">Sign out</a>
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
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Inicio</span>
                </a>
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="#" class="nav_link active">
                    <i class="bx bxs-book nav_icon"></i>
                    <span class="nav_name">Cursos</span>
                </a>
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-news nav_icon"></i>
                    <span class="nav_name">Evaluaciones</span>
                </a>
                <a href="#" class="nav_link link-dark">
                    <i class="bx bx-cog nav_icon"></i>
                    <span class="nav_name">Configuración</span>
                </a>
            </div>
        </nav>
    </div>

    <!--Contenido Usuario-->
    <section>
        <div class="container-fluid bg-blanco mt-3 shadow">
            <p class="fs-1"><strong>Calificaciones</strong></p>
            <div class="dropdown">
                <a class="btn btn-tertiary bg-blancoOscuro dropdown-toggle mb-2" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false " style="width: auto;">
                    #0001 Ingles - N1664
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">#0002 Progamacion en PHP - N1664</a></li>
                    <li><a class="dropdown-item" href="#">#0003 Programacion Web - N1664</a></li>
                    <li><a class="dropdown-item" href="#">#0004 Frances - N1664</a></li>
                </ul>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ponderacion</th>
                        <th scope="col">Calificacion</th>
                        <th scope="col">Rango</th>
                        <th scope="col">Porcentaje</th>
                        <th scope="col">Retroalimentacion</th>
                        <th scope="col">Aporte total del curso</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Examen #1</th>
                        <td>20%</td>
                        <td>10</td>
                        <td>1 - 20</td>
                        <td>50%</td>
                        <td>Estudie más para la proxima</td>
                        <td>20%</td>
                    </tr>
                    <tr>
                        <th scope="row">Examen #2</th>
                        <td>20%</td>
                        <td>15</td>
                        <td>1 - 20</td>
                        <td>75%</td>
                        <td>Mejoro mucho! Siga asi!</td>
                        <td>40%</td>
                    </tr>
                    <tr>
                        <th scope="row">Examen Final</th>
                        <td>60%</td>
                        <td>20</td>
                        <td>1 - 20</td>
                        <td>100%</td>
                        <td>Excelente!</td>
                        <td>100%</td>
                    </tr>
                </tbody>
            </table>

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