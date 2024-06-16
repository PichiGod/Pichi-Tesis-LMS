<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

function borrarArchivo() {
        var formData = new FormData();
        formData.append('archivo', $('#archivoActual').val());
        //formData.append('id_cur', $('#id_cur').val());
        formData.append('id_ent', $('#id_ent').val())
        formData.append('actionArchivo', $('#actionArchivo1').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarEntregaBD.php',
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
        formData.append('id_ent', $('#id_ent').val());
        formData.append('actionArchivo', $('#actionArchivo2').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarEntregaBD.php',
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

    function editarEntrega() {
        const fileSizeLimit = document.getElementById("fileSize").value;
        const fileSizeLimitInBytes = fileSizeLimit * 1024 * 1024; // convert MB to bytes

        const fileInput = document.getElementById("files");
        const selectedFiles = fileInput.files;

        var archivo = $('#archivoActual').val();
        var archivoAdicional = $('#aAdicionalActual').val();

        const curso = document.getElementById("id_cur").value;
        const actividad = document.getElementById("id_act").value;

        // Obtener el contenido del editor Quill
        var editorContent = quill.root.innerHTML;

        //Validacion. Si la entrega no tiene texto, archivos seleccionados y no tiene archivos subidos que cancele la operacion
        if (selectedFiles.length === 0) {
            if (editorContent == null) {
                if (archivo == null && archivoAdicional == null){
                    alert("Por favor, inserte un texto o seleccione un archivo para enviar.");
                    return;
                }
            }
        };

        // Formatear el mensaje con el nombre del usuario y la hora actual
        let fecha = new Date();
        let hora = fecha.getHours();
        let minutos = fecha.getMinutes();
        let dia = fecha.getDate();
        let mes = fecha.getMonth(); // 0-based, so no adjustment needed
        let ano = fecha.getFullYear();
        let fechaString = ano + '-' + (mes + 1) + '-' + dia + ' ' + hora + ':' + minutos + ':00';

        // Crear un objeto FormData para enviar datos
        var formData = new FormData();
        if (archivo != null && archivoAdicional != null && selectedFiles.length > 0) {
            alert("Por favor, elimine un archivo para subir otros");
            return;
        } else if (archivo == null && selectedFiles.length == 1) {
            const file = selectedFiles[0];
            if (file.size > fileSizeLimitInBytes) {
                alert(`Archivo '${file.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
                return;
            }
            // Update archivo
            formData.append("archivo", selectedFiles[0]);
        } else if (archivoAdicional == null && selectedFiles.length == 1) {
            const file = selectedFiles[0];
            if (file.size > fileSizeLimitInBytes) {
                alert(`Archivo '${file.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
                return;
            }
            // Update archivoAdicional
            formData.append("archivoAdicional", selectedFiles[0]);
        } else if (selectedFiles.length == 2) {
            const file = selectedFiles[0];
            if (file.size > fileSizeLimitInBytes) {
                alert(`Archivo '${file.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
                return;
            }
            const file2 = selectedFiles[1];
            if (file2.size > fileSizeLimitInBytes) {
                alert(`Archivo '${file2.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
                return;
            }
            // Update both archivo and archivoAdicional
            formData.append("archivo", selectedFiles[0]);
            formData.append("archivoAdicional", selectedFiles[1]);
        }
        formData.append('texto_entrega', editorContent);
        formData.append('fecha_modif', fechaString);
        formData.append('id_ent', $('#id_ent').val());
        formData.append('id_Act', $('#id_act').val()); // Fix: added # before ID_ACT
        formData.append('action', $('#action').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarEntregaBD.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Entrega Modificada Exitosamente')) {
                    window.location.href = `verActividad.php?id_act=${actividad}&id_cur=${curso}`;
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>