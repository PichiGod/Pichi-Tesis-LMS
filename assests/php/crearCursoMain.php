<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

function submitData(){

$(document).ready(function(){

var data = {


    id_cur: $('#id_cur').val(),

    nombreCurso: $('#nombreCurso').val(),

    visibilidadCurso: $('#visibilidadCurso').val(),
    
    fechaInicio: $('#fechaInicio').val(),

    fechaFin: $('#fechaFin').val(),

    inputperiodo: $('#inputperiodo').val(),

    minimos: $('#minimos').val(),

    maximos: $('#maximos').val(),

    action: $('#action').val(),

    action2: $('#action2').val(),

};


$.ajax({

  url: '../../assests/php/crearCursoBD.php',

  type: 'post',

  data: data,

  success:function(response){

     alert(response);

     if(response=="¡Se ha creado un nuevo curso de forma exitosa!"){

        window.location.reload();
     }

  }


});


});


}

</script>