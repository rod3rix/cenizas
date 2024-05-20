@extends('layouts.app')

@section('content')

<section class="jumbotron text-center">
        <div class="container">
          <h3>PANEL DE ADMINISTRACIÓN</h3>
          <p class="lead text-muted">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
          <p>
            <a href="#" class="btn btn-secondary my-3">VER USUARIOS</a>
            <a href="#" class="btn btn-secondary my-3">VER USUARIOS FONDOS CONCURSABLES</a>
            <a href="#" class="btn btn-secondary my-3">VER POSTULACIONES APOYO PROYECTOS</a>
            <a href="#" class="btn btn-secondary my-3">VER CASOS</a>
          </p>
        </div>
        @if(auth::user()->id=="1")

        <div class="container mt-5">
        <!-- Div para mostrar el mensaje de estado -->
        <div id="statusMessage" class="alert alert-success d-none" role="alert"></div>
        <!-- Primer acordeón -->
        <div class="accordion" id="accordionOne">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Ingresar Usuarios Administradores
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                    <div class="accordion-body">
                        <!-- Aquí puedes agregar el contenido de la sección de administración de usuarios -->
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <!-- Contenido del primer acordeón -->
                                            <form method="POST" id="frm1" name="frm1">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno:') }}</label>
                                            <div class="col-md-8">
                                                <input id="apellido_paterno" type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno" value="{{ old('apellido_paterno') }}" autocomplete="apellido_paterno" autofocus>
                                                @error('apellido_paterno')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="apellido_materno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno:') }}</label>
                                            <div class="col-md-8">
                                                <input id="apellido_materno" type="text" class="form-control @error('apellido_materno') is-invalid @enderror" name="apellido_materno" value="{{ old('apellido_materno') }}" autocomplete="apellido_materno" autofocus>
                                                @error('apellido_materno')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT:') }}</label>
                                            <div class="col-md-8">
                                                <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" autocomplete="name" autofocus maxlength="12" onkeyup="formatRut(this)">
                                                @error('rut')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email:') }}</label>
                                            <div class="col-md-8">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono:') }}</label>
                                            <div class="col-md-8">
                                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="name" autofocus onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12">
                                                @error('telefono')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="zona" class="col-md-4 col-form-label text-md-end">{{ __('Zona:') }}</label>
                                            <div class="col-md-8">
                                                <select id="zona" class="form-control @error('zona') is-invalid @enderror" name="zona">
                                                    <option value="">{{ __('Seleccione') }}</option>
                                                    <option value="1">{{ __('Cabildo') }}</option>
                                                    <option value="2">{{ __('Taltal') }}</option>
                                                </select>
                                                @error('zona')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña:') }}</label>
                                            <div class="col-md-8">
                                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="button" class="btn btn-primary" onclick="enviarFormulario('frm1')">
                                                    {{ __('Registrar Usuario') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Segundo acordeón independiente -->
        <div class="accordion" id="accordionTwo">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Editar Usuarios Administradores
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                    <div class="accordion-body">
                        <!-- Aquí puedes agregar el contenido de la sección de edición de usuarios administradores -->
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div  class="container">          
                                        <h5><b>Listado de Usuarios Administradores</b></h5>
                                              <table id="registros" class="table table-striped table-bordered" style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th>ID</th>
                                                          <th>NOMBRE</th>
                                                          <th>APELLIDO</th>
                                                          <th>RUT</th>
                                                          <th>ACCION</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <!-- Aquí se agregarán dinámicamente los datos -->
                                                  </tbody>
                                              </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    @csrf
                    <input type="hidden" id="userId" name="id">
                    <div class="mb-3 row">
                        <label for="modalUserName" class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="modalUserName" name="modalUserName">
                            @error('modalUserName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="modalUserApellidoPaterno" class="col-sm-4 col-form-label">Apellido Paterno</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="modalUserApellidoPaterno" name="modalUserApellidoPaterno">
                            @error('modalUserApellidoPaterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="modalUserApellidoMaterno" class="col-sm-4 col-form-label">Apellido Materno</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="modalUserApellidoMaterno" name="modalUserApellidoMaterno">
                            @error('modalUserApellidoMaterno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="modalUserRut" class="col-sm-4 col-form-label">RUT</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="modalUserRut" name="modalUserRut" onkeyup="formatRut(this)">
                            @error('modalUserRut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="modalUserEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="modalUserEmail" name="modalUserEmail">
                            @error('modalUserEmail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="modalUserTelefono" class="col-sm-4 col-form-label">Teléfono</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="modalUserTelefono" name="modalUserTelefono" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12">
                            @error('modalUserTelefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="modalUserZona" class="col-sm-4 col-form-label">Zona</label>
                        <div class="col-sm-8">
                         <select class="form-select" id="modalUserZona" name="modalUserZona">
                            <option value="1">Taltal</option>
                            <option value="2">Cabildo</option>
                        </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="modalUserPassword" class="col-sm-4 col-form-label">Contraseña</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="modalUserPassword" name="modalUserPassword">
                            @error('modalUserPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>


<script>

function formatRut(cliente) {
  cliente.value = cliente.value
    .replace(/[^0-9kK]/g, '') // Elimina todo excepto números y la letra 'k' o 'K'
    .replace(/^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4'); // Agrega puntos y guión en el formato estándar
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
            // La solicitud fue exitosa, ahora verifica el contenido de la respuesta
            if (response.success) {
                // Si la respuesta indica éxito, puedes realizar alguna acción, como redireccionar a otra página
                $('#statusMessage').removeClass('d-none').text(response.message);
                setTimeout(function() {
                    listarUsuariosAdmin();
                    $('#collapseOne').collapse('toggle');
                    $('#frm1')[0].reset();
                }, 2000);

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

$(document).ready(function() {

listarUsuariosAdmin();


// Cuando se abra el modal, cargar la información del usuario
        var userModal = document.getElementById('userModal');
        userModal.addEventListener('show.bs.modal', function (event) {
            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();
            var button = event.relatedTarget;
            var userId = button.getAttribute('data-id');

            $.ajax({
                url: '{{ route("getUserDetails") }}',
                type: 'POST',
                data: { id: userId, _token: '{{ csrf_token() }}' },
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

        // Enviar formulario mediante AJAX
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
                        // Éxito, puedes hacer algo como cerrar el modal o mostrar un mensaje
                        listarUsuariosAdmin();
                        $('#userModal').modal('hide');
                        $('#statusMessage').removeClass('d-none').text(response.message);
                        $('#collapseTwo').collapse('hide');
                        $('#userForm')[0].reset();
                        // Aquí puedes realizar otras acciones según sea necesario
                    } else {
                        // Si la respuesta indica que hubo errores de validación, muestras los mensajes de error debajo de los campos correspondientes
                $.each(response.errors, function(key, value) {
                    // Encuentra el campo correspondiente al error y muestra el mensaje de error
                    $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                });
                    }
                }
            });
        });

});

function listarUsuariosAdmin(){
    $.ajax({
        url: '{{ route("listarUsuariosAdmin") }}',
        type: 'POST',
        dataType: 'json',
        data: {_token: '{{ csrf_token() }}'},
        success: function(response) {
             // Destruir la instancia existente de DataTable si ya está inicializada
            if ($.fn.DataTable.isDataTable('#registros')) {
                $('#registros').DataTable().clear().destroy();
            }

             $('#registros').DataTable({
                language: {
                    url: "{{ asset('lang/datatables/Spanish.json') }}"
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

}
        



</script> 

@endsection
