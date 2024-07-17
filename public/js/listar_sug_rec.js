$(document).ready(function() {
    $.ajax({
        url: 'casosUsuarioAdmin', 
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
                    { data: 'id', title: 'N° CASO' },
                    { data: 'asunto', title: 'ASUNTO' },
                    { data: 'nombre_usuario', title: 'NOMBRE' },
                    { data: 'fecha_creacion', title: 'FECHA ENVÍO' },
                    { data: 'estado', title: 'ESTADO' },
                    { data: 'respuesta', title: 'RESPUESTA' },
                    { data: 'tipo', title: 'TIPO', visible: false },
                    { data: 'comuna', title: 'COMUNA', visible: false },
                    { data: 'direccion', title: 'DIRECCIÓN', visible: false },
                    { data: 'descripcion', title: 'DESCRIPCIÓN', visible: false },
                    { data: 'resp', title: 'RESPUESTAS', visible: false }
                ],
             dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: function ( idx, data, node ) {
                                return idx !== 5; // Excluye la columna 'respuesta'
                            }
                        },
                        title: 'Portal Comunidades'
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: function ( idx, data, node ) {
                                return idx !== 5; // Excluye la columna 'respuesta'
                            }
                        },
                        filename: 'Portal Comunidades',
                        title: 'Portal Comunidades'
                    },
                    // {
                    //     extend: 'pdf',
                    //     exportOptions: {
                    //         columns: function ( idx, data, node ) {
                    //             return idx !== 5; // Excluye la columna 'respuesta'
                    //         }
                    //     },
                    //     filename: 'Portal Comunidades',
                    //     title: 'Portal Comunidades'
                    // }
                ],
                paging: true
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los casos:', error);
        }
    });
});