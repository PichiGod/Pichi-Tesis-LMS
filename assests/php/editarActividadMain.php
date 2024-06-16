<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

    function borrarArchivo() {
        var formData = new FormData();
        formData.append('archivo', $('#archivoActual').val());
        //formData.append('id_cur', $('#id_cur').val());
        formData.append('id_act', $('#id_act').val())
        formData.append('actionArchivo', $('#actionArchivo1').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarActividadBD.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Archivo Eliminado Exitosamente')) {
                    window.location.reload();
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function borrarArchivoAdicional() {
        var formData = new FormData();
        formData.append('archivoAdicional', $('#aAdicionalActual').val());
        //formData.append('id_cur', $('#id_cur').val());
        formData.append('id_act', $('#id_act').val());
        formData.append('actionArchivo', $('#actionArchivo2').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarActividadBD.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Archivo Eliminado Exitosamente')) {
                    window.location.reload();
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function editarActividad() {
        // const fileSizeLimit = document.getElementById("fileSize").value; // Usar esto si vamos a limitar el peso de las actividades
        // const fileSizeLimitInBytes = fileSizeLimit * 1024 * 1024; // convert MB to bytes

        const fileInput = document.getElementById("files");
        const selectedFiles = fileInput.files;

        var archivo = $('#archivoActual').val();
        var archivoAdicional = $('#aAdicionalActual').val();

        const curso = document.getElementById("id_cur").value;
        const actividad = document.getElementById("id_act").value;

        // Obtener el contenido del editor Quill
        var editorContent = quill.root.innerHTML;

        //Validacion. Si la actividad no tiene texto, archivos seleccionados y no tiene archivos subidos que cancele la operacion
        if (selectedFiles.length === 0) {
            if (editorContent == null) {
                if (archivo == null && archivoAdicional == null) {
                    alert("Por favor, inserte un texto o seleccione un archivo para enviar.");
                    return;
                }
            }
        };

        //Validar las fechas de Inicio, fecha de culminacion y fecha de notificacion
        const fechaInicio = $('#fechaIni').val();
        const fechaCulminacion = $('#fechaFin').val();
        const fechaNotificacion = $('#fechaNot').val();

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

        // Crear un objeto FormData para enviar datos
        var formData = new FormData();
        if (archivo != null && archivoAdicional != null && selectedFiles.length > 0) {
            alert("Por favor, elimine un archivo para subir otros");
            return;
        } else if (archivo == null && selectedFiles.length == 1) {
            // const file = selectedFiles[0];
            // if (file.size > fileSizeLimitInBytes) {
            //     alert(`Archivo '${file.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
            //     return;
            // }
            // Update archivo
            formData.append("archivo", selectedFiles[0]);
        } else if (archivoAdicional == null && selectedFiles.length == 1) {
            // const file = selectedFiles[0];
            // if (file.size > fileSizeLimitInBytes) {
            //     alert(`Archivo '${file.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
            //     return;
            // }
            // Update archivoAdicional
            formData.append("archivoAdicional", selectedFiles[0]);
        } else if (selectedFiles.length == 2) {
            // const file = selectedFiles[0];
            // if (file.size > fileSizeLimitInBytes) {
            //     alert(`Archivo '${file.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
            //     return;
            // }
            // const file2 = selectedFiles[1];
            // if (file2.size > fileSizeLimitInBytes) {
            //     alert(`Archivo '${file2.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
            //     return;
            // }
            // Update both archivo and archivoAdicional
            formData.append("archivo", selectedFiles[0]);
            formData.append("archivoAdicional", selectedFiles[1]);
        }
        formData.append('titulo', $('#titulo').val());
        formData.append('texto_actividad', editorContent);
        formData.append('fechaInicio', $('#fechaIni').val());
        formData.append('fechaFin', $('#fechaFin').val());
        formData.append('fechaNoti', $('#fechaNot').val());
        formData.append('pesoArchivo', $('#maximo').val());
        formData.append('notaMaxima', $('#notaMaxima').val());
        formData.append('notaMinima', $('#notaMinima').val());
        formData.append('visible', $('#visibilidadActividad').val());
        formData.append('activarPorcentaje', $('#selectActivarPorcentaje').val());
        formData.append('porcentaje', $('#porcentajeActividad').val());
        formData.append('id_cur', $('#id_cur').val());
        formData.append('id_act', $('#id_act').val()); // Fix: added # before ID_ACT
        formData.append('action', $('#action').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarActividadBD.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Actividad Modificada Exitosamente')) {
                    window.location.href = `verActividad.php?id_act=${actividad}&id_cur=${curso}`;
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>