<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

function submitData() {
    $(document).ready(function() {
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