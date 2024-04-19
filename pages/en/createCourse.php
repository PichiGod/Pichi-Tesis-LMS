<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Course</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../../assests/css/style (2).css">
    <link rel="stylesheet" href="../../assests/css/crearCurso.css">

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
        style="width: 280px; height: 150vh; overflow: auto">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link link-dark" aria-current="page">
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
                <a href="#" class="nav-link active">
                    <i class="fa-solid fa-book me-2" witdh="16" height="16"></i>
                    Courses
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark ">
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

<section class="crearCurso">

<div class="container-fluid bg-blanco mt-3 shadow w-75" style="margin-left: 20rem;">

  <div class="TituloCrearCurso">

     <h3 class="TituloCrear"><b>Create New Active Course</b></h3>

  </div>

  <div class="DivPrinFormulario">

     <div class="div1Crear">

     <label for="">Nombre Completo del Curso</label>

     <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre del Curso">

     </div>


     
     <div class="div2Crear">

     <label for="">Visibilidad del Curso</label>

     <select class="seleccion form-select" aria-label="Default select example">
        <option selected>Visible</option>
        <option value="1">Invisible</option>
        </select>

     </div>


     <div class="div3Crear">

        <label for="">Fecha de Inicio</label>

        <input type="date" class="fechaInicio">

    </div>


        <div class="div4Crear">

            <label for="">Fecha de Culminación</label>

            <input type="date" class="fechaFin">

     </div>

     <div class="div45Crear">

        <label for="">Nombre del periodo</label>

        <input type="text" class="inputperiodo form-control" id="exampleFormControlInput1" placeholder="Nombre del periodo">

</div>


     <div class="div5Crear">

        <label for="">Cupos Minimos del Curso</label>

        <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">

    </div>


    <div class="div6Crear">

        <label for="">Cupos Maximos del Curso</label>

        <input type="number" class="maximos form-control" id="exampleFormControlInput1" placeholder="0">

    </div>


  </div>

  
  <div class="containerButtonCrearCursoFin">
    
<button type="button" class="botonRegresar btn btn-primary" onclick="location.href='courses.php'">Regresar</button>

<button type="button" class="botonCrearCursoFin btn btn-primary">Crear Curso</button>


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