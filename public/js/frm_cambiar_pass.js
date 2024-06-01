$(document).ready(function() {
        $('#changePasswordUsu').submit(function(e) {
            e.preventDefault();
            
            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'cambiarPass',
                data: formData,
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        if (response.success) {
                            window.location.href = 'confirmacionPass';
                        } else {
                            $.each(response.errors, function(key, value) {
                                $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
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
