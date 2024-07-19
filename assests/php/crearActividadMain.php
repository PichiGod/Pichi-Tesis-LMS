<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

function submitData() {
    $(document).ready(function() {

        //Validar las fechas de Inicio, fecha de culminacion y fecha de notificacion
        const fechaInicio = $('#fechaInicio').val();
        const fechaCulminacion = $('#fechaFin').val();
        const fechaNotificacion = $('#fechaNoti').val();

        const dateInicio = new Date(fechaInicio);
        const dateCulminacion = new Date(fechaCulminacion);
        const dateNotificacion = new Date(fechaNotificacion);

        //Funcion para validar si fecha de culminacion esta despues que la fecha de Inicio.
        function isDateBefore(date1, date2) {
            return date1.getTime() < date2.getTime();
        }

        //Funcion para validar si la fecha de notificacion esta entre fecha de Inicio y fecha de Culminacion.
        function isDateBetween(date, start, end) {
            return isDateBefore(start, date) && isDateBefore(date, end);
        }

        //Validar si fecha de culminacion esta despues que la fecha de Inicio.
        if (isDateBefore(dateCulminacion, dateInicio)) {
            alert("La fecha de culminación no puede ser anterior a la fecha de inicio.");
            return;
        }

        //Validar si la fecha de notificacion esta entre fecha de Inicio y fecha de Culminacion.
        if (!isDateBetween(dateNotificacion, dateInicio, dateCulminacion)) {
            alert("La fecha de notificación debe estar entre las fechas de inicio y culminación.");
            return;
        }

        // Get the values that need validation
        const pesoArchivo = parseInt($('#maximo').val());
        const notaMaxima = parseInt($('#notaMaxima').val());
        const notaMinima = parseInt($('#notaMinima').val());
        const porcentaje = parseInt($('#porcentajeActividad').val());
        const activarPorcentaje = parseInt($('#selectActivarPorcentaje').val());

        // Validate pesoArchivo, notaMaxima, and notaMinima
        if (pesoArchivo <= 0 || notaMaxima <= 0 || notaMinima <= 0) {
            alert("Peso del archivo, nota máxima, y nota mínima no pueden ser 0 o un valor negativo.");
            return;
        }

        if (notaMinima > notaMaxima) {
            alert("La nota mínima no puede ser mayor a la nota máxima.");
            return;
        }

        // Validate porcentaje
        if (porcentaje <= 0 && activarPorcentaje !== 1) {
            alert("El porcentaje no puede ser 0 cuando activarPorcentaje es diferente de 1.");
            return;
        }

        // Obtener el contenido del editor Quill
        var editorContent = quill.root.innerHTML;

        // Crear un objeto FormData para enviar datos
        var formData = new FormData();
        formData.append('tituloActividad', $('#tituloActividad').val());
        formData.append('texto_actividad', editorContent);
        formData.append('fechaInicio', $('#fechaInicio').val());
        formData.append('fechaFin', $('#fechaFin').val());
        formData.append('fechaNoti', $('#fechaNoti').val());
        formData.append('maximo', $('#maximo').val());
        formData.append('notaMaxima', $('#notaMaxima').val());
        formData.append('notaMinima', $('#notaMinima').val());
        formData.append('visibilidadActividad', $('#visibilidadActividad').val());
        formData.append('selectActivarPorcentaje', $('#selectActivarPorcentaje').val());
        formData.append('porcentajeActividad', $('#porcentajeActividad').val());
        formData.append('action', $('#action').val());
        formData.append('actionID_CUR', $('#actionID_CUR').val());

        // Obtener el archivo seleccionado y agregarlo al FormData
        var archivoSeleccionado = $('#archivo')[0].files[0];
        var archivoSeleccionado2 = $('#archivo1')[0].files[0];
        formData.append('archivo', archivoSeleccionado);
        formData.append('archivo1', archivoSeleccionado2);

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/crearActividadBD.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                //alert(response);
                if (response === 'Nueva Actividad Creada Exitosamente') {
                    window.location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
}

</script>