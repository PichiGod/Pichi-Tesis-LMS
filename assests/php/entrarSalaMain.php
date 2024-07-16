<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">
function submitData() {
    let id_curso = $('#idCurso').val();
    var data = {
        idCurso: $('#idCurso').val(),
    };

    $.ajax({
        url: '../../assests/php/entrarSalaBD.php',
        type: 'post',
        data: data,
        success: function(response) {
            if (response.includes("¡Usuario Insertado Correctamente!")) {
                var message = response.split("¡Usuario Insertado Correctamente!")[1].trim();
                window.open(`chatLinea.php?idCur=${id_curso}&message=` + encodeURIComponent(message), '_blank');
                window.location.reload();
            } else if (response.includes("Ya estás en el curso")) {
                window.open(`chatLinea.php?idCur=${id_curso}&message=` + encodeURIComponent(message), '_blank');
                //alert(response);
                //window.open('chatLinea.php', '_blank');
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
