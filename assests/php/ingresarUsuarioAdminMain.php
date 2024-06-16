<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

   function submitData() {

      $(document).ready(function () {

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

         var data = {


            nombreUsuario: $('#nombreUsuario').val(),

            apellidoUsuario: $('#apellidoUsuario').val(),

            correoUsuario: $('#correoUsuario').val(),

            rifUsuario: $('#rifUsuario').val(),

            contrasenaUsuario: $('#contrasenaUsuario').val(),

            GeneroUsuario: $('#GeneroUsuario').val(),

            fechaNacimiento: $('#fechaNacimiento').val(),

            direccionUsuario: $('#direccionUsuario').val(),

            telefonoUsuario: $('#telefonoUsuario').val(),

            rbRol: $('#rbRol').val(),

            Empresa: $('#Empresa').val(),

            action: $('#action').val(),

         };


         $.ajax({

            url: '../../assests/php/ingresarUsuarioAdminBD.php',

            type: 'post',

            data: data,

            success: function (response) {

               alert(response);

               if (response == "Se ha registrado el Usuario en el sistema") {


                  window.location.reload();
               }

            }


         });


      });


   }

</script>