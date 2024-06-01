    
$(document).ready(function() {
    $.ajax({
        url: 'listarApoyoProyectos',
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
                    { data: 'id' },
                    { data: 'nombre_proyecto' },
                    { data: 'created_at_formatted' },
                    { data: 'estado_texto' },
                    { data: 'resolucion' }
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            }
                        },
                        filename: 'Portal Comunidades',
                        title: 'Portal Comunidades'
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            }
                        },
                        filename: 'Portal Comunidades',                         title: 'Portal Comunidades'
                    }
                ],
                paging: true
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los datos:', error);
        }
    });
});