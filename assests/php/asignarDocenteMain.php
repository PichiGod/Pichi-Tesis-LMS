<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function submitData() {
        const idUser = document.getElementById('idUser').value;
        if (idUser == null || idUser == "") {
            alert('Seleccione un docente para continuar.');
            return;
        }
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const allValues = Array.from(checkboxes).map(checkbox => checkbox.value);
        const checkedValues = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.value);

        var formData = new FormData();
        formData.append('idUser', idUser);
        formData.append('allValues', JSON.stringify(allValues));
        formData.append('checkedValues', JSON.stringify(checkedValues));
        formData.append('peri', $('#periodo').val());
        formData.append('action', $('#action').val());

        formData.forEach((value, key) => {
            console.log(`${key}: ${value}`);
        });

        $.ajax({
            url: '../../assests/php/asignarDocenteBD.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                if (response.indexOf('Cambios realizados correctamente') !== -1) {
                    window.location.reload();
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>