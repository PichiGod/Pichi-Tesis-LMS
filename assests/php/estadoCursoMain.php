<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function activarCurso(curso, estado) {
        if (estado == "Visible") {
            var formData = new FormData();
            formData.append("curso", curso);
            formData.append("estado", estado);
            formData.append('action', 'hacerInvisible');

            // formData.forEach((value, key) => {
            //     console.log(`${key}: ${value}`);
            // });

            //Realizar la solicitud AJAX usando FormData para enviar datos
            $.ajax({
                url: '../../assests/php/estadoCursoBD.php',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert(response);
                    if (response === 'Curso Editado Correctamente') {
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });

        } else {
            var formData = new FormData();
            formData.append("curso", curso);
            formData.append("estado", estado);
            formData.append('action', 'hacerVisible');

            // formData.forEach((value, key) => {
            //     console.log(`${key}: ${value}`);
            // });

            //Realizar la solicitud AJAX usando FormData para enviar datos
            $.ajax({
                url: '../../assests/php/estadoCursoBD.php',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert(response);
                    if (response === 'Curso Editado Correctamente') {
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