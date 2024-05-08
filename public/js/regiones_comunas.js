$(document).ready(function() {
    // Obtener la URL de la ruta de las regiones
    var urlRegiones = $('#urlRegiones').data('url');
    // Obtener el token CSRF de Laravel
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Hacer la solicitud AJAX para obtener las regiones
    $.ajax({
        url: urlRegiones,
        method: 'POST',
        data: {
            _token: csrfToken
        },
        success: function(response) {
            // Limpiar el select de regiones
            $('#region').empty().append('<option value="">Seleccione</option>');
            // Llenar el select con las regiones recibidas
            $.each(response, function(key, value) {
                $('#region').append($('<option>', {
                    value: value.id, // Suponiendo que el modelo de región tiene un atributo 'id'
                    text: value.nombre // Suponiendo que el modelo de región tiene un atributo 'nombre'
                }));
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al obtener las regiones:', error);
        }
    });

    // Evento change para el select de regiones
    $('#region').change(function() {
        var regionId = $(this).val();

        // Hacer la solicitud AJAX para obtener las comunas
        $.ajax({
            url: 'getComunas',
            method: 'POST',
            data: {
                region_id: regionId,
                _token: csrfToken // Aquí se agrega el token CSRF
            },
            success: function(response) {
                // Limpiar el select de comunas
                $('#comuna').empty().append('<option value="">Seleccione</option>');
                // Llenar el select de comunas con las obtenidas del servidor
                $.each(response, function(key, value) {
                    $('#comuna').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener las comunas:', error);
            }
        });
    });
});
