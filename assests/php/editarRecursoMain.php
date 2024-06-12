<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function borrarArchivo() {
        var formData = new FormData();
        formData.append('archivo', $('#archivoActual').val());
        //formData.append('id_cur', $('#id_cur').val());
        formData.append('id_rec', $('#id_rec').val())
        formData.append('actionArchivo', $('#actionArchivo1').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarRecursoBD.php',
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
        formData.append('id_rec', $('#id_rec').val());
        formData.append('actionArchivo', $('#actionArchivo2').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarRecursoBD.php',
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

    function editarRecurso() {
        // Esar esto si se va a poner limite de peso en el archivo
        // const fileSizeLimit = document.getElementById("fileSize").value;
        // const fileSizeLimitInBytes = fileSizeLimit * 1024 * 1024; // convert MB to bytes

        const fileInput = document.getElementById("files");
        const selectedFiles = fileInput.files;

        const curso = document.getElementById("id_cur").value;
        const recurso = document.getElementById("id_rec").value;

        // Obtener el contenido del editor Quill
        var editorContent = quill.root.innerHTML;

        var archivo = $('#archivoActual').val();
        var archivoAdicional = $('#aAdicionalActual').val();

        //console.log(archivo + archivoAdicional);
        var formData = new FormData();
        if (archivo != null && archivoAdicional != null && selectedFiles.length > 0) {
            alert("Por favor, elimine un archivo para subir otros");
            return;
        } else if (archivo == null && selectedFiles.length == 1) {
            // Update archivo
            formData.append("archivo", selectedFiles[0]);
        } else if (archivoAdicional == null && selectedFiles.length == 1) {
            // Update archivoAdicional
            formData.append("archivoAdicional", selectedFiles[0]);
        } else if (selectedFiles.length == 2) {
            // Update both archivo and archivoAdicional
            formData.append("archivo", selectedFiles[0]);
            formData.append("archivoAdicional", selectedFiles[1]);
        }

        formData.append('titulo', $('#titulo').val());
        formData.append('texto_recurso', editorContent);
        formData.append('id_rec', $('#id_rec').val());
        formData.append('action', $('#action').val());

        //console.log(formData);

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/editarRecursoBD.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Recurso Editado Exitosamente')) {
                    window.location.href = `verRecurso.php?id_cur=${curso}&id_rec=${recurso}`;
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>