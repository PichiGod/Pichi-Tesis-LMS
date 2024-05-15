<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

function submitData() {
    $(document).ready(function() {
        // Obtener el archivo seleccionado
        var archivoSeleccionado = $('#archivo')[0].files[0];

        // Crear un objeto FormData para enviar datos del archivo
        var formData = new FormData();
        formData.append('archivo', archivoSeleccionado); // Agregar el archivo al FormData

        // Agregar otros datos del formulario al FormData
        formData.append('tituloActividad', $('#tituloActividad').val());
        formData.append('texto_actividad', $('#texto_actividad').val());
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

        // Realizar la solicitud AJAX usando FormData para enviar datos del archivo
        $.ajax({
            url: '../../assests/php/crearActividadBD.php',
            type: 'post',
            data: formData,
            processData: false, // No procesar los datos (FormData)
            contentType: false, // No establecer el tipo de contenido
            success: function(response) {
                alert(response);
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