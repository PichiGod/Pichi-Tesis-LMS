<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">
function submitData() {
    var data = {
        idCurso: $('#idCurso').val(),
    };

    $.ajax({
        url: '../../assests/php/entrarSalaBD.php',
        type: 'post',
        data: data,
        success: function(response) {
            if (response.includes("¡Usuario Insertado Correctamente!")) {
                window.open('chatLinea.php', '_blank');
            } else {
                alert(response); // Mostrar mensaje de error
            }
        },
        error: function(xhr, status, error) {
            alert('Error al conectar con el servidor: ' + error);
        }
    });
}

// Detectar cuando el usuario cierra la pestaña o navega fuera de ella
window.addEventListener('beforeunload', function(event) {
    $.ajax({
        url: '../../assests/php/salirSalaBD.php',
        type: 'post',
        async: false, // Importante para que se ejecute antes de la descarga
        success: function(response) {
            console.log(response);
        }
    });
});
</script>
