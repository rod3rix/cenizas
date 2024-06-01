$(document).ready(function() {
        $('#frmGuardarPuntaje').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("frmGuardarPuntaje"));
            $.ajax({
                type: 'POST',
                url: 'guardarPuntaje',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        if (response.success) {
                            window.location.href = '../confirmacionAsignacion';
                        } else {
                            $.each(response.errors, function(key, value) {
                            });
                        }
                    } else {
                        console.error('Error en la solicitud:', xhr.status);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Hubo un problema al enviar el formulario:', error);
                }
            });
      });
});