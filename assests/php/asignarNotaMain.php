<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function submitData(n) {

        let id_cur = $('#id_cur').val();
        let id_act = $('#id_act').val();
        let nota = $('#calif').val();
        let retro = $('#retro').val();
        let notaMaxima = $('#notaMaxima').val();

        if (nota <= 0) {
            alert('Nota no puede ser menor o igual a 0.');
            return;
        } else if (nota > notaMaxima) {
            alert('Nota no puede ser mayor que la nota máxima de la actividad');
            return;
        }

        var formData = new FormData();
        formData.append('nota', nota);
        formData.append('retro', retro);
        formData.append('idUser', $(`#idUser-${n}`).val());
        formData.append('id_cur', id_cur);
        formData.append('id_act', id_act);
        formData.append('id_ent', $(`#idEntrega-${n}`).val());
        formData.append('action', $('#action').val());

        //console.log(n, id_act, id_cur, nota, retro);
        // formData.forEach((value, key) => {
        //     console.log(`${key}: ${value}`);
        // });

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/asignarNotaBD.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response);
                if (response.includes('Nota Asignada Correctamente')) {
                    window.location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>