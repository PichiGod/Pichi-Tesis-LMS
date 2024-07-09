<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

    function submitData() {

        const fechaInicio = $('#fechaInicio').val();
         const fechaCulminacion = $('#fechaFin').val();

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
        formData.append('id', $('#id_cur').val());
        formData.append('nombreCur', $('#nombreCurso').val());
        formData.append('visibilidad', $('#visibilidadCurso').val());
        formData.append('fechaIni', $('#fechaInicio').val());
        formData.append('fechaFin', $('#fechaFin').val());
        formData.append('cuposMin', $('#minimos').val());
        formData.append('cuposMax', $('#maximos').val());
        formData.append('action', $('#action').val());
        
        // formData.forEach((value, key) => {
        //     console.log(`${key}: ${value}`);
        // });

        //Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/modificarCursoBD.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Curso Modificado Correctamente')) {
                    window.location.href = `administrarCurso.php`;
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>