$(document).ready(function() {
    obtenerTitulosFondos();
    listarEdicionFondos();
     // Delegar el evento de clic a los botones generados dinámicamente
    $(document).on('click', '[data-bs-toggle="modal"]', function() {
        var id = $(this).data('id');
        cargarDatosModal(id);
    });
});

function obtenerTitulosFondos() {
        $.ajax({
            url: 'obtenerTitulosFondos',
            type: 'GET',
            success: function(response) {
                // Limpiar opciones actuales del select
                $('#titulo_anual_id').empty();

                // Agregar opciones estáticas
                $('#titulo_anual_id').append($('<option>', {
                    value: '',
                    text: 'Selecciona un título'
                }));

                // Agregar nuevas opciones basadas en los datos recibidos
                $.each(response, function(index, titulo) {
                    $('#titulo_anual_id').append($('<option>', {
                        value: titulo.id,
                        text: titulo.titulo_anual
                    }));
                });
            },
            error: function() {
                console.log('Error al obtener los títulos de fondos.');
            }
        });
    }

function enviarFormulario(idFrm) {

    var formData = new FormData(document.getElementById(idFrm));
    // Adjuntar el ID del formulario al FormData
    formData.append('idFrm', idFrm);

    $('form :input').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    $.ajax({
        url: 'frmTituloFondo',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
   success: function(response, textStatus, xhr) {
        if (xhr.status === 200) {
            // La solicitud fue exitosa, ahora verifica el contenido de la respuesta
            if (response.success) {

                $('#success-message').text(response.message).show();
                  
                if(idFrm=="frm1"){
                    $('#collapseOne').collapse('hide');
                    $('#collapseTwo').collapse('hide'); 
                    $('#frm1')[0].reset();
                    obtenerTitulosFondos();
                }

                if(idFrm=="frm2"){
                    $('#collapseOne').collapse('hide');
                    $('#collapseTwo').collapse('hide');
                    $('#frm2')[0].reset();
                }

            } else {
                // Si la respuesta indica que hubo errores de validación, muestras los mensajes de error debajo de los campos correspondientes
                $.each(response.errors, function(key, value) {
                    // Encuentra el campo correspondiente al error y muestra el mensaje de error
                    $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                });
            }
        } else {
            console.error('Error en la solicitud:', xhr.status);
            // Aquí puedes manejar otros tipos de errores de solicitud si es necesario
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

                // Destruir la instancia existente antes de crear una nueva
                table.destroy();

                // Crear nueva instancia de DataTable con los datos actualizados
                $('#registros').DataTable({
                    language: {
                        url: appConfig.dataTablesLangUrl
                    },
                    data: response,
                    columns: [
                        { data: 'id' },
                        { data: 'nombre_fondo' },
                        // { data: 'descripcion' }, // Asegúrate de que 'descripcion' esté en tu response
                        { data: 'fecha_inicio' },
                        { data: 'fecha_termino' },
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

    // Inicializar la tabla al cargar la página
    //listarEdicionFondos();

function cargarDatosModal(id) {
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
            $('#fecha_inicio_edit').val(data.fecha_inicio);
            $('#fecha_termino_edit').val(data.fecha_termino);
            $('#editarFondoModal').modal('show');
        }
    });
}
