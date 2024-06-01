 $(document).ready(function() {
        $('#changePasswordForm').submit(function(e) {
            e.preventDefault();

            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            var formData = $(this).serialize();
            
            $.ajax({
                type: 'POST',
                url: 'cambiarPassAd',
                data: formData,
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        if (response.success) {
                            window.location.href = 'confirmacionPassAdmin';
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