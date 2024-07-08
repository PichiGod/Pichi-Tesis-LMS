<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function activarAlumno(curso, estado) {
        //console.log(estado);
        if (estado == "Activo") {
            var formData = new FormData();
            formData.append("idInscrip", curso);
            formData.append("estado", estado);
            formData.append('action', 'deshabilitar');

            formData.forEach((value, key) => {
                console.log(`${key}: ${value}`);
            });

            //Realizar la solicitud AJAX usando FormData para enviar datos
            $.ajax({
                url: '../../assests/php/estadoAlumnoBD.php',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert(response);
                    if (response === 'Alumno Editado Correctamente') {
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });

        } else {
            var formData = new FormData();
            formData.append("idInscrip", curso);
            formData.append("estado", estado);
            formData.append('action', 'habilitar');

            formData.forEach((value, key) => {
                console.log(`${key}: ${value}`);
            });

            //Realizar la solicitud AJAX usando FormData para enviar datos
            $.ajax({
                url: '../../assests/php/estadoAlumnoBD.php',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert(response);
                    if (response === 'Alumno Editado Correctamente') {
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
    }
</script>