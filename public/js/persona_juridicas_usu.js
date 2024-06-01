$(document).ready(function() {
    $.ajax({
        url: 'listarPersonaJuridicas',
        type: 'POST',
        dataType: 'json',
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: function(response) {
             $('#registros').DataTable({
                language: {
                    url: appConfig.dataTablesLangUrl
                },
                data: response,
                columns: [
                    { data: 'rut_link' },
                    { data: 'razon_social' },
                    { data: 'relacion' },
                    { data: 'estado' }
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            modifier: {
                                page: 'all' // Exportar todas las páginas
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            modifier: {
                                page: 'all' // Exportar todas las páginas
                            }
                        },
                        filename: 'Portal Comunidades', // Nombre del archivo Excel
                        title: 'Portal Comunidades'
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            modifier: {
                                page: 'all' // Exportar todas las páginas
                            }
                        },
                        filename: 'Portal Comunidades', // Nombre del archivo PDF
                        title: 'Portal Comunidades'
                    }
                ],
                paging: true // Habilitar paginación
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
