<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">

   function submitData() {

      $(document).ready(function () {

         const fechaInicio = $('#fechaInicio').val();
         const fechaCulminacion = $('#fechaFin').val();

         const dateInicio = new Date(fechaInicio);
         const dateCulminacion = new Date(fechaCulminacion);

         //Funcion para validar si fecha de culminacion esta despues que la fecha de Inicio.
         function isDateBefore(date1, date2) {
            return date1.getTime() < date2.getTime();
         }


         //Validar si fecha de culminacion esta despues que la fecha de Inicio.
         if (isDateBefore(dateCulminacion, dateInicio)) {
            alert("La fecha de culminación no puede ser anterior a la fecha de inicio.");
            return;
         }


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

            success: function (response) {

               alert(response);

               if (response == "¡Se ha creado un nuevo curso de forma exitosa!") {

                  window.location.reload();
               }

            }


         });


      });


   }

</script>