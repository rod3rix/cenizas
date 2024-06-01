$(document).ready(function() {
  listarUsuariosAdmin();
    var userModal = document.getElementById('userModal');
    userModal.addEventListener('show.bs.modal', function (event) {
            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();
            var button = event.relatedTarget;
            var userId = button.getAttribute('data-id');

            $.ajax({
                url: 'getUserDetails',
                type: 'POST',
                data: { id: userId, 
                _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(user) {
                    $('#userId').val(user.id);
                    $('#modalUserName').val(user.name);
                    $('#modalUserApellidoPaterno').val(user.apellido_paterno);
                    $('#modalUserApellidoMaterno').val(user.apellido_materno);
                    $('#modalUserRut').val(user.rut);
                    $('#modalUserEmail').val(user.email);
                    $('#modalUserTelefono').val(user.fono);
                    $('#modalUserZona').val(user.zona);
                }
            });
    });

$('#userForm').submit(function(event) {
    event.preventDefault();
      $('form :input').removeClass('is-invalid');
      $('.invalid-feedback').remove();
            var userId = $('#userId').val();
            $.ajax({
                url: `updateUser/${userId}`,
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        listarUsuariosAdmin();
                        $('#userModal').modal('hide');
                        $('#statusMessage').removeClass('d-none').text(response.message);
                        $('#collapseTwo').collapse('hide');
                        $('#userForm')[0].reset();
                    } else {
                $.each(response.errors, function(key, value) {
                    $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                });
                }
                }
            });
        });
});

function listarUsuariosAdmin(){
    $.ajax({
        url: 'listarUsuariosAdmin',
        type: 'POST',
        dataType: 'json',
        data: {_token: $('meta[name="csrf-token"]').attr('content')},
        success: function(response) {
            if ($.fn.DataTable.isDataTable('#registros')) {
                $('#registros').DataTable().clear().destroy();
            }
             $('#registros').DataTable({
                language: {
                    url: appConfig.dataTablesLangUrl
                },
                data: response,
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'apellido_paterno' },
                    { data: 'rut' },
                    { data: 'link_editar' }
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

function enviarFormulario(idFrm) {

    var formData = new FormData(document.getElementById(idFrm));

    $('form :input').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    $.ajax({
        url: 'registrarUsuAdmin',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
   success: function(response, textStatus, xhr) {
        if (xhr.status === 200) {
            if (response.success) {
                $('#statusMessage').removeClass('d-none').text(response.message);
                setTimeout(function() {
                    listarUsuariosAdmin();
                    $('#collapseOne').collapse('toggle');
                    $('#frm1')[0].reset();
                }, 2000);

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
