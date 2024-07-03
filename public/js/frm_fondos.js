$(document).ready(function() {
    listarEdicionFondos();
});

$(document).on('click', '.verDetallesTitulo', function() {
    var id = $(this).data('id');
    cargarDatosTituloModal(id);
});

$(document).on('click', '.verDetallesFondo', function() {
    var id = $(this).data('id');
    cargarDatosFondoModal(id);
});

function enviarFormulario(idFrm) {

    var formData = new FormData(document.getElementById(idFrm));

    formData.append('idFrm', idFrm);

    $('form :input').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    $.ajax({
        url: 'frmCrearAFondo',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response, textStatus, xhr) {
        if (xhr.status === 200) {
            if (response.success) {

                $('#mensajeExito').text(response.message).show();
                
                listarEdicionFondos();

                $('#collapseOne').collapse('hide');
                $('#collapseTwo').collapse('hide');
                $('#frm2')[0].reset();

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
}

function listarEdicionFondos() {
        $.ajax({
            url: 'listarEdicionFondos',
            type: 'POST',
            dataType: 'json',
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                var table = $('#registros').DataTable();

                table.destroy();

                $('#registros').DataTable({
                    language: {
                        url: appConfig.dataTablesLangUrl
                    },
                    data: response,
                    columns: [
                        { data: 'id' },
                        { data: 'nombre_fondo' },
                        { data: 'zona' },
                        { data: 'fecha_inicio' },
                        { data: 'fecha_termino' },
                        { data: 'estado' },
                        { data: 'link_modal' }
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
                console.error('Error al cargar los datos:', error);
            }
        });
}
    
function cargarDatosFondoModal(id) {
    $.ajax({
        url: 'getFondo',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // Obtener el token CSRF
            id: id
        },
        success: function(data) {
            $('#fondo_id').val(data.id);
            $('#nombre_fondo_edit').val(data.nombre_fondo);
            $('#descripcion_edit').val(data.descripcion);
            $('#zona_edit').val(data.zona);  // Asegúrate de que 'data.comuna' tenga el valor correcto
            $('#fecha_inicio_edit').val(data.fecha_inicio);
            $('#fecha_termino_edit').val(data.fecha_termino);
            $('#estado_edit').val(data.estado);  // Asegúrate de que 'data.estado' tenga el valor correcto
        }
    });
}
