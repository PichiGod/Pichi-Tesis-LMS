<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

function submitData(){

$(document).ready(function(){

var data = {


    idPer: $('#idPer').val(),

    FechaInicioPer: $('#FechaInicioPer').val(),

    FechaFinPer: $('#FechaFinPer').val(),

    action: $('#action').val(),

    action2: $('#action2').val(),

    FechaFinPer: $('#FechaFinPer').val(),


};


$.ajax({

  url: '../../assests/php/crearPeriodoBD.php',

  type: 'post',

  data: data,

  success:function(response){

     alert(response);

     if(response=="¡Se ha creado un nuevo periodo de forma exitosa!"){


        window.location.reload();
     }

  }


});


});


}

</script>