<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

function submitData(){

$(document).ready(function(){

var data = {


    cedulaLogin: $('#cedulaLogin').val(),

    contrasenaLogin: $('#contrasenaLogin').val(),

    empresa: $('#empresa').val(),

    action: $('#action').val(),

};


$.ajax({

  url: '../../assests/php/LoginBD.php',

  type: 'post',

  data: data,

  success:function(response){

     alert(response);

     if(response=="Bienvenido Administrador" || response=="Bienvenido Usuario"){


        window.location.reload();
     }

  }


});


});


}

</script>