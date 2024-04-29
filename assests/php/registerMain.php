<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

function submitData(){

$(document).ready(function(){

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
    
    Empresa: $('#Empresa').val(),

    action: $('#action').val(),

};


$.ajax({

  url: '../assests/php/registerBD.php',

  type: 'post',

  data: data,

  success:function(response){

     alert(response);

     if(response=="Se ha registrado el Usuario en el sistema"){


        window.location.reload();
     }

  }


});


});


}

</script>