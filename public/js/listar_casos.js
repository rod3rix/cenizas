  $(document).ready(function() {
    $.ajax({
        url: 'casosUsuario', // Ruta del controlador para obtener los casos
        type: 'POST', // Cambiamos el método HTTP a POST
        dataType: 'json', // Esperamos recibir datos en formato JSON
        data: {_token: $('meta[name="csrf-token"]').attr('content')}, // Incluir el token CSRF en los datos de la solicitud
         success: function(response) {
             $('#registros').DataTable({
                language: {
                    url: appConfig.dataTablesLangUrl
                },
                data: response,
                columns: [
                    { data: 'id' },
                    { data: 'asunto' },
                    { data: 'fecha_creacion' },
                    { data: 'estado' },
                    { data: 'respuesta' }
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
            console.error('Error al cargar los casos:', error);
        }
    });
});