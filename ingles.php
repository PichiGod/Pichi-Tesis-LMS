<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- Font Awesome  icons (free version)-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS -->
  <link rel="stylesheet" href="./assests/css/index.css" />
  <link rel="stylesheet" href="./assests/css/nav.css" />
  <link rel="stylesheet" href="./assests/css/home.css" />
  <link rel="stylesheet" href="./assests/css/colorPallete.css" />
  <link rel="stylesheet" href="./assests/css/estilos.css" />
  <title>Pichi-Home</title>
</head>

<body>
  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
      <div class="container-fluid">
        <a class="navbar-brand ms-3" href="#">
          <img src="assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--Cambio de Idioma ver.Español-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                  href="#">
                  <span class="fa-solid fa-flag-usa me-2"></span> English (United States)
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item">
                    <span class="fa-solid fa-earth-americas "></span>
                    <a class="ms-2 text-body-secondary" href="./index.php">Español
                      (Latino
                      America)</a>
                  </li>
                </ul>
              </li>

              <li class="nav-item mt-1 me-2">
                <a name="demo" id="demo" class="btn btn-secondary " href="#"
                  role="button">Demo</a>
              </li>
              <li class="nav-item mt-1">
                <a name="login" id="login" class="btn btn-primary " href="./pages/en/login.php"
                  role="button">Iniciar sesión</a>
              </li>
            </ul>

            <!-- <a
              name="regis"
              id="regis"
              class="btn btn-secondary d-flex shadow me-3"
              href="pages/es/registro.php"
              role="button"
              >Registrarse</a
            > -->

          </div>
        </div>
      </div>
    </nav>
  </header>

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assests/img/conferencia.jpg" class="imagencar d-block w-100" alt="..." />
        <div class="carousel-caption">
          <h5>Welcome to LMS Pichi</h5>
          <p>LMS Pichi</p>
          <p>
            <a href="#" class="btn btn-primary mt-3">Start Now With LMS Pichi</a>
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assests/img/conferencia2.jpg" class="imagencar d-block w-100" alt="..." />
        <div class="carousel-caption">
          <h5>Create your course templates here!</h5>
          <p>LMS Pichi</p>
          <p>
            <a href="#" class="btn btn-primary mt-3">Star Now With LMS Pichi</a>
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assests/img/conferencia3.avif" class="imagencar d-block w-100" alt="..." />
        <div class="carousel-caption">
          <h5>Start creating your language and technology courses</h5>
          <p>LMS Pichi</p>
          <p>
            <a href="#" class="btn btn-primary mt-3">Star Now With LMS Pichi</a>
          </p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <section>
    <div class="Publicidades">
      <div class="containerPublicidad1">
        <div class="publi1en1">
          <h5 class="parrafoPubli1">
            Take a step with us into the future in Pichi
            <b class="negritaPubli">Grow your institute with us</b>
            <img class="imgLogoBlanco" src="assets/img/logo_blanco.png" alt="" />
          </h5>
        </div>

        <i class="flechaPubli fa-solid fa-right-long"></i>

        <div class="publi1en2">
          <img class="imgLogoCriptos" src="assests/img/text-1710023184778.png" alt="" />
        </div>
      </div>

      <div class="publicidad2">
        <h6 class="Parrafopubli2">
          You can find the best LMS here at Pichi.com
        </h6>
      </div>
    </div>
  </section>

  <section>
    <div class="containerPrinMinado bg-dark">
      <div class="tituloh2minado">
        <h2 class="TituloMinado"><b>What is an LMS?</b></h2>
      </div>

      <div class="principalParrafoMinado">
        <div class="parrafoMinado1">
          <p class="textoMinado">
            LMS son las siglas de "Learning Management System", que en español
            se traduce como "Sistema de Gestión del Aprendizaje". En términos
            simples, se trata de una plataforma tecnológica diseñada para
            administrar, distribuir y gestionar cursos online. Las plataformas
            LMS son ampliamente utilizadas y son una buena opción para enseñar
            de manera eficiente y evaluar el progreso del alumnado. Estas
            plataformas también tienen herramientas de comunicación y
            colaboración para que los estudiantes se relacionen entre ellos y
            con los profesores.
          </p>
        </div>

        <div class="parrafoMinado2">
          <p class="textoMinado">
            Su versatilidad permite que puedan ser utilizados para impartir
            diferentes tipos de formación, desde cursos completos hasta
            sesiones cortas y enfocadas de microlearning. Para los
            estudiantes, es el espacio desde donde pueden acceder a los
            materiales de aprendizaje, interactuar en línea con otras personas
            y ver cómo van avanzando. Para los profesores, es un entorno donde
            pueden organizar y administrar cursos, y evaluar el progreso de
            los estudiantes.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="containerPasos">
      <h2 class="title"><b>How to get started in LMS Pichi?</b></h2>
      <div class="row">
        <div class="col-md-4">
          <div class="step">1</div>
          <p class="parradopaso">
            <a href="#">Register</a> on the page and contact us to enable your
            template.
          </p>
        </div>
        <div class="col-md-4">
          <div class="step">2</div>
          <p class="parradopaso">
            Log in to the platform and start creating your courses from our
            templates
          </p>
        </div>
        <div class="col-md-4">
          <div class="step">3</div>
          <p class="parradopaso">
            Start with the virtual classes of your course on our platform
          </p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="ContainerPreguntas">
      <h2 class="titulo"><b>Frequent questions</b></h2>
      <div class="categorias" id="categorias">
        <div class="categoria activa" data-categoria="metodos-pago">
          <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
            <path
              d="M21.19 7h2.81v15h-21v-5h-2.81v-15h21v5zm1.81 1h-19v13h19v-13zm-9.5 1c3.036 0 5.5 2.464 5.5 5.5s-2.464 5.5-5.5 5.5-5.5-2.464-5.5-5.5 2.464-5.5 5.5-5.5zm0 1c2.484 0 4.5 2.016 4.5 4.5s-2.016 4.5-4.5 4.5-4.5-2.016-4.5-4.5 2.016-4.5 4.5-4.5zm.5 8h-1v-.804c-.767-.16-1.478-.689-1.478-1.704h1.022c0 .591.326.886.978.886.817 0 1.327-.915-.167-1.439-.768-.27-1.68-.676-1.68-1.693 0-.796.573-1.297 1.325-1.448v-.798h1v.806c.704.161 1.313.673 1.313 1.598h-1.018c0-.788-.727-.776-.815-.776-.55 0-.787.291-.787.622 0 .247.134.497.957.768 1.056.344 1.663.845 1.663 1.746 0 .651-.376 1.288-1.313 1.448v.788zm6.19-11v-4h-19v13h1.81v-9h17.19z" />
          </svg>
          <p>Lorem</p>
        </div>
        <div class="categoria" data-categoria="entregas">
          <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
            <path
              d="M7 24h-5v-9h5v1.735c.638-.198 1.322-.495 1.765-.689.642-.28 1.259-.417 1.887-.417 1.214 0 2.205.499 4.303 1.205.64.214 1.076.716 1.175 1.306 1.124-.863 2.92-2.257 2.937-2.27.357-.284.773-.434 1.2-.434.952 0 1.751.763 1.751 1.708 0 .49-.219.977-.627 1.356-1.378 1.28-2.445 2.233-3.387 3.074-.56.501-1.066.952-1.548 1.393-.749.687-1.518 1.006-2.421 1.006-.405 0-.832-.065-1.308-.2-2.773-.783-4.484-1.036-5.727-1.105v1.332zm-1-8h-3v7h3v-7zm1 5.664c2.092.118 4.405.696 5.999 1.147.817.231 1.761.354 2.782-.581 1.279-1.172 2.722-2.413 4.929-4.463.824-.765-.178-1.783-1.022-1.113 0 0-2.961 2.299-3.689 2.843-.379.285-.695.519-1.148.519-.107 0-.223-.013-.349-.042-.655-.151-1.883-.425-2.755-.701-.575-.183-.371-.993.268-.858.447.093 1.594.35 2.201.52 1.017.281 1.276-.867.422-1.152-.562-.19-.537-.198-1.889-.665-1.301-.451-2.214-.753-3.585-.156-.639.278-1.432.616-2.164.814v3.888zm3.79-19.913l3.21-1.751 7 3.86v7.677l-7 3.735-7-3.735v-7.719l3.784-2.064.002-.005.004.002zm2.71 6.015l-5.5-2.864v6.035l5.5 2.935v-6.106zm1 .001v6.105l5.5-2.935v-6l-5.5 2.83zm1.77-2.035l-5.47-2.848-2.202 1.202 5.404 2.813 2.268-1.167zm-4.412-3.425l5.501 2.864 2.042-1.051-5.404-2.979-2.139 1.166z" />
          </svg>
          <p>Lorem</p>
        </div>
        <div class="categoria" data-categoria="seguridad">
          <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
            <path
              d="M12 0c-3.371 2.866-5.484 3-9 3v11.535c0 4.603 3.203 5.804 9 9.465 5.797-3.661 9-4.862 9-9.465v-11.535c-3.516 0-5.629-.134-9-3zm0 1.292c2.942 2.31 5.12 2.655 8 2.701v10.542c0 3.891-2.638 4.943-8 8.284-5.375-3.35-8-4.414-8-8.284v-10.542c2.88-.046 5.058-.391 8-2.701zm5 7.739l-5.992 6.623-3.672-3.931.701-.683 3.008 3.184 5.227-5.878.728.685z" />
          </svg>
          <p>Lorem</p>
        </div>
        <div class="categoria" data-categoria="cuenta">
          <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
            <path
              d="M9.484 15.696l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm10.516 11.304h-8v1h8v-1zm0-5h-8v1h8v-1zm0-5h-8v1h8v-1zm4-5h-24v20h24v-20zm-1 19h-22v-18h22v18z" />
          </svg>
          <p>Lorem</p>
        </div>
      </div>

      <div class="preguntas">
        <!-- Preguntas Metodos de pago -->
        <div class="contenedor-preguntas activo" data-categoria="metodos-pago">
          <div class="contenedor-pregunta">
            <p class="pregunta">
              Lorem <img src="assests/img/suma.svg" alt="Abrir Respuesta" />
            </p>
            <p class="respuesta">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Fugiat, voluptas perferendis. Debitis eius accusantium, atque
              fugit ex dolore adipisci laboriosam sit eum ad eligendi
              doloribus asperiores ab dolorem quis ea!
            </p>
          </div>
          <div class="contenedor-pregunta">
            <p class="pregunta">
              Lorem<img src="assests/img/suma.svg" alt="Abrir Respuesta" />
            </p>
            <p class="respuesta">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. At
              incidunt, laudantium in nisi inventore exercitationem quia!
              Sequi commodi, blanditiis esse placeat harum reiciendis delectus
              earum autem officiis reprehenderit deleniti quia!
            </p>
          </div>
        </div>

        <!-- Preguntas Entregas -->
        <div class="contenedor-preguntas" data-categoria="entregas">
          <div class="contenedor-pregunta">
            <p class="pregunta">
              Lorem <img src="assests/img/suma.svg" alt="Abrir Respuesta" />
            </p>
            <p class="respuesta">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure
              consequatur blanditiis laboriosam magnam soluta error nulla,
              impedit nobis repellendus hic suscipit deleniti placeat
              consequuntur ut doloremque incidunt optio asperiores deserunt!
            </p>
          </div>
          <div class="contenedor-pregunta">
            <p class="pregunta">
              lorem<img src="assests/img/suma.svg" alt="Abrir Respuesta" />
            </p>
            <p class="respuesta">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Nostrum, soluta. Magni quasi tempora dicta? Labore veritatis
              eaque totam earum nihil perspiciatis voluptates quisquam
              deleniti itaque, modi similique esse quia cumque!
            </p>
          </div>
        </div>

        <!-- Preguntas Seguridad -->
        <div class="contenedor-preguntas" data-categoria="seguridad">
          <div class="contenedor-pregunta">
            <p class="pregunta">
              Lorem <img src="assests/img/suma.svg" alt="Abrir Respuesta" />
            </p>
            <p class="respuesta">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Voluptatum laborum porro voluptates, sequi aliquam mollitia!
              Nostrum eius iure sapiente, voluptates soluta adipisci,
              perferendis voluptatibus eligendi vel saepe harum. Consectetur,
              doloribus.adipisicing elit. Voluptatum laborum porro voluptates,
              sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates
              soluta adipisci, perferendis voluptatibus eligendi vel saepe
              harum. Consectetur, doloribus.adipisicing elit. Voluptatum
              laborum porro voluptates, sequi aliquam mollitia! Nostrum eius
              iure sapiente, voluptates soluta adipisci, perferendis
              voluptatibus eligendi vel saepe harum. Consectetur, doloribus.
            </p>
          </div>
          <div class="contenedor-pregunta">
            <p class="pregunta">
              Lorem <img src="assests/img/suma.svg" alt="Abrir Respuesta" />
            </p>
            <p class="respuesta">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Voluptatum laborum porro voluptates, sequi aliquam mollitia!
              Nostrum eius iure sapiente, voluptates soluta adipisci,
              perferendis voluptatibus eligendi vel saepe harum. Consectetur,
              doloribus.adipisicing elit. Voluptatum laborum porro voluptates,
              sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates
              soluta adipisci, perferendis voluptatibus eligendi vel saepe
              harum. Consectetur, doloribus.
            </p>
          </div>
        </div>

        <!-- Preguntas Cuenta -->
        <div class="contenedor-preguntas" data-categoria="cuenta">
          <div class="contenedor-pregunta">
            <p class="pregunta">
              Lorem<img src="assests/img/suma.svg" alt="Abrir Respuesta" />
            </p>
            <p class="respuesta">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Voluptatum laborum porro voluptates, sequi aliquam mollitia!
              Nostrum eius iure sapiente, voluptates soluta adipisci,
              perferendis voluptatibus eligendi vel saepe harum. Consectetur,
              doloribus.adipisicing elit. Voluptatum laborum porro voluptates,
              sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates
              soluta adipisci, perferendis voluptatibus eligendi vel saepe
              harum. Consectetur, doloribus.adipisicing elit. Voluptatum
              laborum porro voluptates, sequi aliquam mollitia! Nostrum eius
              iure sapiente, voluptates soluta adipisci, perferendis
              voluptatibus eligendi vel saepe harum. Consectetur, doloribus.
            </p>
          </div>
          <div class="contenedor-pregunta">
            <p class="pregunta">
              Lorem <img src="assests/img/suma.svg" alt="Abrir Respuesta" />
            </p>
            <p class="respuesta">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Voluptatum laborum porro voluptates, sequi aliquam mollitia!
              Nostrum eius iure sapiente, voluptates soluta adipisci,
              perferendis voluptatibus eligendi vel saepe harum. Consectetur,
              doloribus.adipisicing elit. Voluptatum laborum porro voluptates,
              sequi aliquam mollitia! Nostrum eius iure sapiente, voluptates
              soluta adipisci, perferendis voluptatibus eligendi vel saepe
              harum. Consectetur, doloribus.
            </p>
          </div>
        </div>
      </div>
    </div>

    <footer class="text-center">
      <h2 class="mt-5 mb-3">Contact Us</h2>
      <p class="fs-4">Phone: 123-456-7890</p>
      <p class="fs-4 mb-5">
        Email: [info@example.com](mailto:info@example.com)
      </p>
    </footer>
  </section>

  <script src="assests/js/categorias.js"></script>
  <script src="assests/js/preguntasFrecuentes.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>