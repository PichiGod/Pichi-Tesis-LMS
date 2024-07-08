<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

function submitData(){

$(document).ready(function(){

var data = {


    txtEmail: $('#txtEmail').val(),

    action: $('#action').val(),

};


$.ajax({

  url: '../../assests/php/MailContrasena.php',

  type: 'post',

  data: data,

  success:function(response){

     alert(response);

     if(response=="Se envio un email con tu contraseña"){
        
        window.location.reload();
     }

  }


});


});


}

</script>