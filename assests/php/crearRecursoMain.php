<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

    function submitData() {
        // Esar esto si se va a poner limite de peso en el archivo
        // const fileSizeLimit = document.getElementById("fileSize").value;
        // const fileSizeLimitInBytes = fileSizeLimit * 1024 * 1024; // convert MB to bytes

        const fileInput = document.getElementById("files");
        const selectedFiles = fileInput.files;

        const curso = document.getElementById("ID_CUR").value;

        // Obtener el contenido del editor Quill
        var editorContent = quill.root.innerHTML;

        if (selectedFiles.length === 0) {
            if (editorContent == null) {
                alert("Por favor, inserte un texto o seleccione un archivo para enviar.");
                return;
            }
        };

        // Crear un objeto FormData para enviar datos
        var formData = new FormData();
        formData.append('titulo', $('#titulo').val());
        if (fileInput != null) {
            for (let i = 0; i < selectedFiles.length; i++) {
                const file = selectedFiles[i];
                // Usar si se va a limitar el peso del archivo
                // if (file.size > fileSizeLimitInBytes) {
                //     alert(`Archivo '${file.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
                //     return;
                // }
                formData.append("files[]", file);
            }
        }

        formData.append('texto_recurso', editorContent);
        formData.append('idCurso', $('#ID_CUR').val());
        formData.append('action', $('#action').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/crearRecursoBD.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Exitosamente')) {
                    window.location.href = `verCurso.php?id_cur=${curso}`;
                } else {
                    alert('Error: '.response);
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>