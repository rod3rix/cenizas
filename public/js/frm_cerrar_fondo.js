    $(document).ready(function() {
        // Mostrar el modal de confirmación cuando se hace clic en el botón
        $('#cerrarFondoBtn').click(function(e) {
            e.preventDefault();
            // Mostrar el modal de confirmación
            $('#confirmModal').modal('show');
        });

        // Realizar la solicitud AJAX para cerrar el caso cuando se da confirmación
        $('#confirmCierreBtn').click(function() {

            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            // Obtener los valores de los campos
            var calificar = $('#calificar').val();
            var respuesta = $('#respuesta').val();
            var archivo = $('#archivo')[0].files[0];
            var pfondo_id = $('#pfondo_id').val();
            var estado_fondo = $('#estado_fondo').val();
            var _token = $('meta[name="csrf-token"]').attr('content');

            // Validate fields
            var formData = new FormData();
            formData.append('_token', _token);
            formData.append('pfondo_id', pfondo_id);
            formData.append('calificar', calificar);
            formData.append('respuesta', respuesta);
            formData.append('archivo', archivo);
            formData.append('estado_fondo', estado_fondo);

            // Realizar la solicitud AJAX
            $.ajax({
                url: 'cerrarFondo',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        // La solicitud fue exitosa, ahora verifica el contenido de la respuesta
                        if (response.success) {
                            // Si la respuesta indica éxito, cierra el modal y redirecciona a otra página
                            $('#confirmModal').modal('hide');
                            window.location.href = '../confirmacionFondoAdmin';
                        } else {
                            // Si la respuesta indica que hubo errores de validación, muestra los mensajes de error debajo de los campos correspondientes
                            $.each(response.errors, function(key, value) {
                                // Encuentra el campo correspondiente al error y muestra el mensaje de error
                                $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                            });
                        }
                    } else {
                        console.error('Error en la solicitud:', xhr.status);
                        // Aquí puedes manejar otros tipos de errores de solicitud si es necesario
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Hubo un problema al enviar el formulario:', error);
                }
            });
             $('#confirmModal').modal('hide');
        });
    });