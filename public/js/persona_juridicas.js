$(document).ready(function() {
    $.ajax({
        url: 'listarPersonaJuridicas',
        type: 'POST',
        dataType: 'json',
        data: {_token: '{{ csrf_token() }}'},
        success: function(response) {
             $('#registros').DataTable({
                language: {
                    url: "{{ asset('lang/datatables/Spanish.json') }}"
                },
                data: response,
                columns: [
                    { data: 'rut_link' },
                    { data: 'razon_social' },
                    { data: 'relacion' },
                    { data: 'estado' }
                ]
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los datos:', error);
        }
    });

    $('#formData').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $('form :input').removeClass('is-invalid');
        $('.invalid-feedback').remove();

        $.ajax({
            url: 'crearPersonaJuridica',
            type: 'POST',
            data: formData,
            success: function(response, textStatus, xhr) {
                if (xhr.status === 200) {
                    if (response.success) {
                        window.location.href = 'confirmacionPersonaJuridica';
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