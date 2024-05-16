<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat en Linea</title>
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
        <nav class="navbar sticky-top bg-body-tertiary ">
            <div class="container-fluid ">

                <a class="navbar-brand" href="../index.html">
                    <img src="../../assests/img/text-1710023184778.png" alt="Bootstrap" width="70" height="24" />
                </a>
                <span class="navbar-text fs-4 me-3">Chat en Linea</span>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <div class="l-navbar bg-body-tertiary" id="nav-bar">
        <nav class="nav">
            <div class="nav_list" style="overflow: auto">

                <a href="javascript:;" class="nav_link link-dark">
                    <i class="bx bx-menu nav_icon" id="header-toggle"></i>
                    <span class="nav_name">Usuarios</span>
                </a>

                <p href="#" class="nav_link link-dark">
                    <img src="https://github.com/PichiGod.png" witdh="24" height="24" alt="...">
                    <span><strong>Jose Duarte</strong></span>
                </p>

                <p href="#" class="nav_link link-dark">
                    <img src="https://github.com/PichiGod.png" witdh="24" height="24" alt="...">
                    <span><strong>Jose Duarte</strong></span>
                </p>

            </div>
        </nav>
    </div>

    <!--Lista de Usuarios-->
    <!-- <div class="row flex-nowrap container-fluid">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                <ul class="nav nav-pills mb-sm-auto mb-0 list-group" id="usuarios">
                    <li class="nav-item" id="listaUsuarios">
                        <table class="">
                            <tbody>

                                Este bloque es para el listado de cada usuario
                                <tr class="border ">
                                    <td id="fotoDePerfil" class="py-2">
                                        <img src="https://github.com/PichiGod.png" witdh="38" height="38" alt="...">
                                    </td>
                                    <td class="py-2 pe-2">
                                        <span><strong>Jose Duarte</strong></span>
                                    </td>
                                </tr>

                                <tr class="border ">
                                    <td id="fotoDePerfil" class="py-2">
                                        <img src="https://github.com/PichiGod.png" witdh="38" height="38" alt="...">
                                    </td>
                                    <td class="py-2 pe-2">
                                        <span><strong>Jose Duarte</strong></span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </li>
                </ul>
                <hr>
            </div>
        </div> -->

    <!--Contenido ChatRoom-->
    <section>
        <div class="col py-3">
            <ul class="list-group-flush mb-5">
                <li class="list-group-item bg-white p-2 rounded text-break">
                    <div>22:15 - <u>Jose Duarte</u> entro al chat</div>
                </li>
                <hr>

                <!--Comentario-->
                <li class="list-group-item bg-white p-2 my-2 rounded">
                    <div id="userName" style="display: inline-block;" class="ms-1 text-break">

                        <span><strong>Jose Duarte</strong></span>
                        <span>22:30</span>

                    </div>
                    <div id="mensaje" class="ms-3 text-break">
                        Hola, soy Jose Duarte
                    </div>

                </li>
                

            </ul>

            <div id="input-chat" class="container rounded p-1 bg-secondary-subtle"
                style="position: fixed; bottom: 0px;">
                <div class="form-inline">
                    <div class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control ">
                            <button type="submit" class="btn btn-primary mx-1">Enviar</button>
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