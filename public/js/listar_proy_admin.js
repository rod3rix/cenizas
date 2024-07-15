$(document).ready(function() {
    $.ajax({
        url: 'listarApoyoProyectosAdmin',
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
                    { data: 'id', title: 'N° POSTULACIÓN' },
                    { data: 'nombre_proyecto' , title: 'NOMBRE PROYECTO' },
                    { data: 'created_at_formatted', title: 'FECHA ENVIO' },
                    { data: 'estado', title: 'ESTADO' },
                    { data: 'name', title: 'NOMBRE' },
                    { data: 'respuesta' , title: 'RESPUESTA' },
                    { data: 'genero', title: 'GENERO', visible: false },
                    { data: 'pueblo_originario', title: 'PUEBLO ORIGINARIO', visible: false },
                    { data: 'discapacidad', title: 'DISCAPACIDAD', visible: false },
                    { data: 'fecha_nacimiento', title: 'FECHA NACIMIENTO', visible: false },
                    { data: 'actividad_economica', title: 'ACTIVIDAD ECONOMICA', visible: false },
                    { data: 'otros', title: 'OTROS', visible: false },
                    { data: 'direccion', title: 'DIRECCIÓN', visible: false },
                    { data: 'formacion_formal', title: 'FORMACION FORMAL', visible: false },
                    { data: 'profesion', title: 'PROFESION', visible: false },
                    { data: 'nombre_proyecto', title: 'NOMBRE PROYECTO', visible: false },
                    { data: 'tipo_proyecto', title: 'TIPO PROYECTO', visible: false },
                    { data: 'lugar_proyecto', title: 'LUGAR PROYECTO', visible: false },
                    { data: 'directos', title: 'DIRECTOS', visible: false },
                    { data: 'indirectos', title: 'INDIRECTOS', visible: false },
                    { data: 'aporte_solicitado', title: 'APORTE SOLICITADO', visible: false },
                    { data: 'acepto_clausula_proy', title: 'ACEPTO CLAUSULAS', visible: false },
                    { data: 'estado', title: 'ESTADO', visible: false },
                    { data: 'resp', title: 'RESPUESTA', visible: false }
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: function ( idx, data, node ) {
                                return idx !== 5; // Excluye la columna 'respuesta'
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: function ( idx, data, node ) {
                                return idx !== 5; // Excluye la columna 'respuesta'
                            }
                        },
                        filename: 'Portal Comunidades', // Nombre del archivo Excel
                        title: 'Portal Comunidades'
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: function ( idx, data, node ) {
                                return idx !== 5; // Excluye la columna 'respuesta'
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
});