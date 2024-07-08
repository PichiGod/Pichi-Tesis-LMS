<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

    function submitData() {

        const fechaNacimiento = $('#fechaNacimiento').val();
        const birthDate = new Date(fechaNacimiento);
        const currentDate = new Date();
        const maxAgeInYears = 100;
        const minAgeInYears = 6;

        const ageInYears = currentDate.getFullYear() - birthDate.getFullYear();

        if (ageInYears > maxAgeInYears || ageInYears < minAgeInYears) {
            // validation failed, handle error
            alert('Edad Invalida');
            return;
        } else {
            // validation passed
            console.log('Age is valid');
            //return;
        }

        let rol;
        if ($('#flexRadioDefault1').length > 0) {
            if ($('#flexRadioDefault1').is(':checked')) {
                rol = "0";
            } else {
                rol = "1";
            }
        } else {
            rol = $('input[name="flexRadioDefault"]').val();
        }

        var formData = new FormData();
        formData.append('id', $('#idUser').val());
        formData.append('nombre', $('#nombreUsuario').val());
        formData.append('apellido', $('#apellidoUsuario').val());
        formData.append('correo', $('#correoUsuario').val());
        formData.append('cedula', $('#rifUsuario').val());
        formData.append('contrasena', $('#contrasenaUsuario').val());
        formData.append('direccion', $('#direccionUsuario').val());
        formData.append('genero', $('#GeneroUsuario').val());
        formData.append('fechaNac', $('#fechaNacimiento').val());
        formData.append('telf', $('#telefonoUsuario').val());
        formData.append('rol', rol);
        formData.append('action', $('#action').val());
        
        // formData.forEach((value, key) => {
        //     console.log(`${key}: ${value}`);
        // });

        //Realizar la solicitud AJAX usando FormData para enviar datos
        $.ajax({
            url: '../../assests/php/modificarUsuarioBD.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.includes('Usuario Modificado Correctamente')) {
                    window.location.href = `administrarUsuario.php`;
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>