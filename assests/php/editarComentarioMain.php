<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

    function submitData() {
        $(document).ready(function () {

            // Formatear el mensaje con el nombre del usuario y la hora actual
            let fecha = new Date();
            //console.log(fecha);
            let hora = fecha.getHours();
            let minutos = fecha.getMinutes();
            let dia = fecha.getDate();
            let mes = fecha.getMonth(); // 0-based, so no adjustment needed
            let ano = fecha.getFullYear();
            let fechaString = ano + '-' + (mes + 1) + '-' + dia + ' ' + hora + ':' + minutos + ':00';
            //console.log(fechaString);

            // Crear un objeto FormData para enviar datos
            var formData = new FormData();
            formData.append('id_comentario', $('#ID_MSJ'))
            formData.append('mensaje', $('#mensaje').val());
            formData.append('fechahora', fechaString);
            formData.append('idCurso', $('#ID_CUR').val());
            formData.append('idUser', $('#ID_USER').val());
            formData.append('action', $('#action').val())

            //Realizar la solicitud AJAX usando FormData para enviar datos
            $.ajax({
                url: '../../assests/php/editarComentarioBD.php',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert(response);
                    if (response === 'Comentario editado correctamente') {
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    }

</script>