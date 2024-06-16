<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function eliminarActividad(Id) {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', `../../assests/php/borrarActividadBD.php?id=${Id}`, true);

      xhr.onload = function () {
        if (xhr.status === 200) {
          //alert(xhr.responseText);
          console.log("Actividad eliminada");
          console.log(xhr.response);
          //location.reload(); // Uncomment this line to reload the page after deletion
        } else {
          console.error('Error eliminando recurso');
          console.log(xhr.response);
        }
      };

      xhr.onerror = function () {
            console.error(`Error making request: ${xhr.statusText}`);
        };

      xhr.send();
    }
</script>