$(document).ready(function() {
    $.ajax({
        url: 'listarUsers',
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
                    { data: 'user_id_link' },
                    { data: 'name' },
                    { data: 'apellido_paterno' },
                    { data: 'rut' },
                    { data: 'email' },
                    { data: 'influencia' },
                    { data: 'vecindad' },
                    { data: 'vecindad_mlc' },
                    { data: 'poder' }
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
                        filename: 'Portal Comunidades', 
                        title: 'Portal Comunidades'
                    }
                ],
                paging: true
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los usuarios:', error);
        }
    });
});