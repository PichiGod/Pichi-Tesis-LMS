<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

    function submitData(e) {
        e.preventDefault();

        const password = $('#pass').val();
        const confirmar = $('#confirmar').val();

        if (password != null){
            if (password !== confirmar) {
                alert("Las contraseñas no coinciden");
                return;
            }
        }

        var formData = new FormData();
        formData.append('id', $('#idUser').val());
        formData.append('dirr', $('#dirr').val());
        formData.append('telf', $('#telf').val());
        let imgFile = $('#imagen')[0].files[0];
        if (imgFile !== undefined && imgFile !== null) {
            formData.append('img', imgFile);
        } else {
            // handle the case where no file is selected
            imgFile = null;
            formData.append('img', imgFile);
        }
        formData.append('password', password);
        formData.append('action', $('#action').val());
        
        formData.forEach((value, key) => {
            console.log(`${key}: ${value}`);
        });

        //Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/modificarPerfilBD.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Perfil Modificado Correctamente')) {
                    window.location.href = `verUser.php`;
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>