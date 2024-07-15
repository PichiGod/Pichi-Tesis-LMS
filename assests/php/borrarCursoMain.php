<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function borrarCurso(Id) {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', `../../assests/php/borrarCursoBD.php?id=${Id}`, true);

      xhr.onload = function () {
        if (xhr.status === 200) {
          alert(xhr.responseText);
          location.reload(); // Uncomment this line to reload the page after deletion
        } else {
          console.error('Error eliminando curso');
        }
      };

      xhr.onerror = function () {
        console.error('Error making request');
      };

      xhr.send();
    }
</script>