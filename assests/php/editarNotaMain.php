<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function submitData(n) {

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
        formData.append('idNota', $('#contador').val());
        formData.append('nota', nota);
        formData.append('retro', retro);
        formData.append('action', $('#action').val());

        //console.log(n, id_act, id_cur, nota, retro);
        formData.forEach((value, key) => {
            console.log(`${key}: ${value}`);
        });

        //Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarNotaBD.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response);
                if (response.includes('Nota Editada Correctamente')) {
                    window.location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>