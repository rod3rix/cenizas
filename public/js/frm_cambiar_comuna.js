  $(document).ready(function() {
        $('#cambiarComunaButton').on('click', function(e) {
            e.preventDefault();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: 'cambiarComuna',
                type: 'POST',
                data: {
                    _token: csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        $('#mensajeExito').text(response.message); 
                        $('#mensajeModal').modal('show');
                    }
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.status + ' ' + xhr.statusText);
                }
            });
        });
        // Redirigir al cerrar el modal
        $('#mensajeModal').on('hidden.bs.modal', function () {
            window.location.href = "admin"; // Redirigir a la página de inicio
        });
    });