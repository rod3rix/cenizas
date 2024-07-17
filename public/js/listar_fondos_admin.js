$(document).ready(function() {
    $.ajax({
        url: 'listarFondosAdmin',
        type: 'POST',
        dataType: 'json',
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: function(response) {
             $('#registros').DataTable({
                language: {
                    url:  appConfig.dataTablesLangUrl
                },
                data: response,
                columns: [
                    { data: 'id', title: 'N° POSTULACIÓN' },
                    { data: 'nombre_fondo', title: 'FONDO CONCURSABLE'},
                    { data: 'created_at_formatted', title: 'FECHA CREACIÓN'},
                    { data: 'estado' , title: 'ESTADO'},
                    { data: 'name' , title: 'POSTULANTE'},
                    { data: 'respuesta' },
                    { data: 'genero', title: 'GENERO', visible: false },
                    { data: 'pueblo_originario', title: 'PUEBLO ORIGINARIO', visible: false },
                    { data: 'discapacidad', title: 'DISCAPACIDAD', visible: false },
                    { data: 'fecha_nacimiento', title: 'FECHA NACIMIENTO', visible: false },
                    { data: 'actividad_economica', title: 'ACTIVIDAD ECONOMICA', visible: false },
                    { data: 'otros', title: 'OTROS', visible: false },
                    { data: 'direccion', title: 'DIRECCIÓN', visible: false },
                    { data: 'formacion_formal', title: 'FORMACION FORMAL', visible: false },
                    { data: 'profesion', title: 'PROFESION', visible: false },
                    { data: 'nombre_organizacion', title: 'NOMBRE ORGANIZACION', visible: false },
                    { data: 'rut_organizacion', title: 'RUT', visible: false },
                    { data: 'domicilio_organizacion', title: 'DOMICILIO', visible: false },
                    { data: 'antiguedad_anos', title: 'ANTIGUEDAD AÑOS', visible: false },
                    { data: 'numero_socios', title: 'NUMERO SOCIOS', visible: false },
                    { data: 'razons_pyme', title: 'RAZON SOCIAL PYME', visible: false },
                    { data: 'rut_pyme', title: 'RUT PYME', visible: false },
                    { data: 'domicilio_pyme', title: 'DOMICILIO PYME', visible: false },
                    { data: 'nombre_proyecto', title: 'NOMBRE PROYECTO', visible: false },
                    { data: 'tipo_proyecto', title: 'TIPO PROYECTO', visible: false },
                    { data: 'fundamentacion', title: 'FUNDAMENTACIÓN', visible: false },
                    { data: 'descripcion_proyecto', title: 'DESCRIPCIÓN PROYECTO', visible: false },
                    { data: 'objetivo_general', title: 'OBJETIVO GENERAL', visible: false },
                    { data: 'objetivos_especificos', title: 'OBJETIVOS ESPECÍFICOS', visible: false },
                    { data: 'cierre_proyecto', title: 'CIERRE PROYECTO', visible: false },
                    { data: 'directos', title: 'DIRECTOS', visible: false },
                    { data: 'indirectos', title: 'INDIRECTOS', visible: false },
                    { data: 'fecha_inicio', title: 'FECHA INICIO', visible: false },
                    { data: 'fecha_termino', title: 'FECHA TÉRMINO', visible: false },
                    { data: 'cantidad_dias', title: 'CANTIDAD DÍAS', visible: false },
                    { data: 'rec_humanos', title: 'RECURSOS HUMANOS', visible: false },
                    { data: 'mat_insumos', title: 'MATERIALES E INSUMOS', visible: false },
                    { data: 'rec_hum_otros', title: 'RECURSOS HUMANOS OTROS', visible: false },
                    { data: 'total', title: 'TOTAL', visible: false },
                    { data: 'aporte_solicitado', title: 'APORTE SOLICITADO', visible: false },
                    { data: 'aporte_terceros', title: 'APORTE TERCEROS', visible: false },
                    { data: 'aporte_propio', title: 'APORTE PROPIO', visible: false },
                    { data: 'total_aporte', title: 'TOTAL', visible: false },
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
                //     {
                //         extend: 'pdf',
                //         orientation: 'landscape', // Establece la orientación a horizontal
                //         exportOptions: {
                //             columns: function ( idx, data, node ) {
                //                 return idx !== 5; // Excluye la columna 'respuesta'
                //             }
                //         },
                //         filename: 'Portal Comunidades', // Nombre del archivo PDF
                //         title: 'Portal Comunidades'
                //     }
                ],
                paging: true // Habilitar paginación
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los datos:', error);
        }
    });
});
