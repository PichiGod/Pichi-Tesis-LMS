<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evaluations</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- Font Awesome  icons (free version)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link rel="stylesheet" href="../../assests/css/colorPallete.css" />
    <link rel="stylesheet" href="../../assests/css/viewUser.css" />
</head>

<body class="bg-pastel">
    <!--- Navbar -->
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" href="../../index.html">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>
                <div class="d-flex justify-content-end">
                <div class="vr me-2"></div>
                    <div class="nav-item dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="fa-solid fa-flag-usa"></span><a class="ms-2 text-body-secondary"
                                href="#">English</a>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <span class="fa-solid fa-earth-americas"></span><a class="ms-2 text-body-secondary"
                                    href="../es/verCalif.php">Spanish (Latin America)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="vr me-2"></div>
                    <div class="dropdown me-4 pe-2">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/PichiGod.png" alt="" width="32" height="32"
                                class="rounded-circle me-2" />
                            <strong>User</strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="viewUser.php">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary float-start"
        style="width: 280px; height: 100vh; overflow: auto">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="home.php" class="nav-link link-dark" aria-current="page">
                    <span class="fa-solid fa-house me-2" witdh="16" height="16"></span>
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-table-columns me-2" witdh="16" height="16"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="courses.php" class="nav-link link-dark">
                    <i class="fa-solid fa-book me-2" witdh="16" height="16"></i>
                    Courses
                </a>
            </li>
            <li>
                <a href="#" class="nav-link active">
                    <i class="fa-solid fa-newspaper me-2" witdh="16" height="16"></i>
                    Evaluations
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-gear me-2" witdh="16" height="16"></i>
                    Configuration
                </a>
            </li>
        </ul>
    </div>

    <!--Contenido Usuario-->
    <section>
        <div class="container-fluid bg-blanco mt-3 shadow w-75" style="margin-left: 21rem;">
            <p class="fs-1"><strong>Evaluations</strong></p>
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
                        <th scope="col">Type</th>
                        <th scope="col">Weighting</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Range</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Feedback</th>
                        <th scope="col">Total course contribution</th>
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