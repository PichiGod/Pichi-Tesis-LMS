<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

    function submitData() {

        const fechaInicio = $('#fecIni').val();
        const fechaCulminacion = $('#fecFin').val();

        const dateInicio = new Date(fechaInicio);
        const dateCulminacion = new Date(fechaCulminacion);

        //Funcion para validar si fecha de culminacion esta despues que la fecha de Inicio.
        function isDateBefore(date1, date2) {
           return date1.getTime() < date2.getTime();
        }

        //Validar si fecha de culminacion esta despues que la fecha de Inicio.
        if (isDateBefore(dateCulminacion, dateInicio)) {
            alert("La fecha de culminación no puede ser anterior a la fecha de inicio.");
            return;
        }

        var formData = new FormData();
        formData.append('id', $('#idPeri').val());
        formData.append('fechaIni', $('#fecIni').val());
        formData.append('fechaFin', $('#fecFin').val());
        formData.append('action', $('#action').val());
        
        // formData.forEach((value, key) => {
        //     console.log(`${key}: ${value}`);
        // });

        //Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/modificarPeriodoBD.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Periodo Modificado Correctamente')) {
                    window.location.href = `verPeriodo.php`;
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>