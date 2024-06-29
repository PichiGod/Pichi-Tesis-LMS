<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
    function generarRespaldo(emp) {
        var formData = new FormData();
        formData.append('emp', emp);

        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../assests/php/generarRespaldoBD.php', true);
        xhr.responseType = 'blob';

        xhr.onload = function () {
            if (xhr.status === 200) {
                var blob = new Blob([xhr.response], { type: 'application/sql' });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'respaldo.sql';
                link.click();
            } else {
                console.error('Error exporting database:', xhr.statusText);
            }
        };

        xhr.send(formData);
    }
</script>