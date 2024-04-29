<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil de Usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <!-- Font Awesome  icons (free version)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link rel="stylesheet" href="../assests/css/colorPallete.css" />
    <link rel="stylesheet" href="../assests/css/viewUser.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../assests/css/style (2).css">
    <link rel="stylesheet" href="../assests/css/crearActividad.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

</head>

<body class="bg-pastel">
    <!--- Navbar -->
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand ms-3" href="../index.html">
                    <img src="../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
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
                    Cursos
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark ">
                    <i class="fa-solid fa-newspaper me-2" witdh="16" height="16"></i>
                    Evaluaciones
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-gear me-2" witdh="16" height="16"></i>
                    Configuracion
                </a>
            </li>
        </ul>
    </div>

<section class="crearActividad">

<div class="container-fluid bg-blanco mt-3 shadow w-75" style="margin-left: 20rem;">

  <div class="TituloCrearActividad">

     <h3 class="TituloCrear"><b>Crear Nueva Actividad</b></h3>

  </div>

  <div class="tituloActividad">

      <label for="">Titulo de la Actividad</label>

      <input type="text" class="form-control" id="tituloActividad" placeholder="Titulo">

  </div>
  
  <div class="Instrucciones">

     <label for="">Instrucciones para la Actividad</label>

    </div>

    <div id="editor">
    </div>
    <input type="hidden" id="texto_actividad" name="texto_actividad">
    <div>


</div>


<div class="contenidoActividad">

     <label for="">Contenido a Subir</label>

     <div class="custom-file">
      <input type="file" class="custom-file-input" id="archivo" name="archivo">
      <label class="custom-file-label" for="archivo">Selecciona un archivo</label>
    </div>


</div>



<div class="contenidoActividadAdicional">

     <label for="">Archivo adicional</label>

     <div class="custom-file">
      <input type="file" class="custom-file-input" id="archivo" name="archivo">
      <label class="custom-file-label" for="archivo">Selecciona un archivo</label>
    </div>


</div>

<div class="fechainicioContenedor">

     <label for="">Fecha de Inicio</label>

     <input type="date" class="form-control" id="fecha" name="fecha">


</div>

<div class="fechaculminacionContenedor">

     <label for="">fecha de Culminación</label>

     <input type="date" class="form-control" id="fecha" name="fecha">


</div>

<div class="fechaculminacionContenedor">

     <label for="">fecha de Culminación</label>

     <input type="date" class="form-control" id="fecha" name="fecha">


</div>


<div class="fechacierreContenedor">

     <label for="">fecha de Cierre</label>

     <input type="date" class="form-control" id="fecha" name="fecha">


</div>


<div class="fechanotificacionContenedor">

     <label for="">fecha de Notificacion</label>

     <input type="date" class="form-control" id="fecha" name="fecha">


</div>

<div class="numeroArchivosContenedor">

     <label for="">Numero de Archivos a Omitir</label>

     <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">


</div>

<div class="pesoArchivosContenedor">

     <label for="">Peso Máximo del Archivo</label>

     <div class="juntar">

     <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0"><label for="">MB</label>

     </div>

</div>


<div class="pesoArchivosContenedor">

     <label for="">Tipo de archivos</label>

     <select class="seleccion form-select" aria-label="Default select example">
        <option selected>Visible</option>
        <option value="1">Invisible</option>
        </select>

</div>


<div class="notaMaximaContenedor">

     <label for="">Nota Maxima</label>

     <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">


</div>

<div class="notaMinimaContenedor">

     <label for="">Nota Minima</label>

     <input type="number" class="minimos form-control" id="exampleFormControlInput1" placeholder="0">


</div>

<div class="div2Crear">

<label for="">Visibilidad de la Actividad</label>

<select class="seleccion form-select" aria-label="Default select example">
   <option selected>Visible</option>
   <option value="1">Invisible</option>
   </select>

</div>

<div class="div3Crear">
    <label for="">Activar Porcentaje</label>
    <select id="selectActivarPorcentaje" class="seleccion form-select" aria-label="Default select example">
        <option selected>Activado</option>
        <option value="1">Desactivado</option>
    </select>
</div>


<div id="porcentajeContenedor" class="porcentajeContenedor">
    <label for="">Porcentaje Actividad</label>
    <input type="number" class="minimos form-control" id="porcentajeActividad" placeholder="0">
</div>

<div class="containerButtonCrearActividadFin">
    
    <button type="button" class="botonRegresar btn btn-primary" onclick="location.href=''">Regresar</button>
    
    <button type="button" class="botonCrearCursoFin btn btn-primary">Crear Actividad</button>
    
    
    </div>

</div>

</section>



<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
  <script>
    var quill = new Quill('#editor', {
      theme: 'snow'
    });
    var form = document.querySelector('form');
    form.onsubmit = function() {
      var editorContent = document.querySelector('.ql-editor').innerHTML;
      document.getElementById('texto_actividad').value = editorContent;
    };
  </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

        <script>
    document.addEventListener("DOMContentLoaded", function() {
        var selectActivarPorcentaje = document.getElementById("selectActivarPorcentaje");
        var porcentajeContenedor = document.getElementById("porcentajeContenedor");

        // Ocultar por defecto al cargar la página si está desactivado
        if (selectActivarPorcentaje.value === "Desactivado") {
            porcentajeContenedor.style.display = "none";
        }

        // Escuchar cambios en el select
        selectActivarPorcentaje.addEventListener("change", function() {
            if (selectActivarPorcentaje.value === "Activado") {
                porcentajeContenedor.style.display = "block"; // Mostrar si está activado
            } else {
                porcentajeContenedor.style.display = "none"; // Ocultar si está desactivado
            }
        });
    });
</script>

</body>

</html>