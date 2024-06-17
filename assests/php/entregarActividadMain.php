<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

    function submitData() {
        const fileSizeLimit = document.getElementById("fileSize").value;
        const fileSizeLimitInBytes = fileSizeLimit * 1024 * 1024; // convert MB to bytes

        const fileInput = document.getElementById("files");
        const selectedFiles = fileInput.files;

        // Obtener el contenido del editor Quill
        var editorContent = quill.root.innerHTML;

        if (selectedFiles.length === 0) {
            if (editorContent == null || editorContent.trim() == "<p><br></p>") {
                alert("Por favor, inserte un texto o seleccione un archivo para enviar.");
                return;
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
        for (let i = 0; i < selectedFiles.length; i++) {
            const file = selectedFiles[i];
            if (file.size > fileSizeLimitInBytes) {
                alert(`Archivo '${file.name}' excede la capacidad. Por favor, seleccione una archivo que tenga menos de ${fileSizeLimit} MB.`);
                return;
            }
            formData.append("files[]", file);
        }
        formData.append('texto_actividad', editorContent);
        formData.append('fecha_modif', fechaString);
        formData.append('id_User', $('#ID_USER').val());
        formData.append('id_Act', $('#ID_ACT').val()); // Fix: added # before ID_ACT
        formData.append('action', $('#action').val());

        // Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/entregarActividadBD.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response === 'Entrega Realizada Exitosamente') {
                    window.location.reload();
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>