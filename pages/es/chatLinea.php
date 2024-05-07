<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat en Linea</title>
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
</head>

<body class="bg-pastel container-fluid">
    <h3>Chat en Linea</h3>
    <!--Lista de Usuarios-->
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                <ul class="nav nav-pills mb-sm-auto mb-0 list-group" id="usuarios">
                    <li class="nav-item" id="listaUsuarios">
                        <table>
                            <tbody>

                                <!--Este bloque es para el listado de cada usuario-->
                                <tr class="border">
                                    <td id="fotoDePerfil" class="py-2">
                                        <img src="https://github.com/PichiGod.png" witdh="38" height="38" alt="...">
                                    </td>
                                    <td class="py-2 pe-2">
                                        <span><strong>Jose Duarte</strong></span>
                                    </td>
                                </tr>

                                <tr class="border">
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
        </div>
        <!--Contenido ChatRoom-->

        <div class="col py-3">
            <ul class="list-group-flush">
                <li class="list-group-item bg-white p-2 rounded">
                    <div>22:15 - <u>Jose Duarte</u> entro al chat</div>
                </li>
                <hr>
                <li class="list-group-item bg-white p-2 rounded">
                    <div id="userName" style="display: inline-block;" class="ms-1">

                        <span><strong>Jose Duarte</strong></span>
                        <span>22:30</span>

                    </div>
                    <div id="mensaje" class="ms-3">
                        Hola, soy Jose Duarte
                    </div>
                </li>
            </ul>
            <div id="input-chat" style="position: fixed; bottom: 0;">
                <div class="form-inline">
                    <div class="d-flex">
                        <span class="form-group">
                            <input type="text" class="form-control" size="150">
                        </span>
                        <span>
                            <button type="submit" class="btn btn-primary mx-1">Enviar</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>