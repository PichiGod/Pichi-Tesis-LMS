<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function borrarUsuario(Id) {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', `../../assests/php/borrarUsuarioBD.php?id=${Id}`, true);

      xhr.onload = function () {
        if (xhr.status === 200) {
          alert(xhr.responseText);
          location.reload(); // Uncomment this line to reload the page after deletion
        } else {
          console.error('Error eliminando usuario');
        }
      };

      xhr.onerror = function () {
        console.error('Error making request');
      };

      xhr.send();
    }
</script>