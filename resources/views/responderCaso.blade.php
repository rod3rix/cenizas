@extends('layouts.app')
@section('content')
@section('content')
@if($acceso)
<section class="jumbotron">
    <div class="container ">
      <h1 class="jumbotron-heading text-center"><b>Responder Caso</b></h1>
      <p class="lead text-muted text-center">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una.</p>
      <br>
      <br>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">N° CASO {{ $caso->id }}</h4>
    <h6 class="border-bottom border-gray pb-2 mb-0">Reclamo / Sugerencia / Otros</h6>
    
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Reclamo:</strong>
            {{ $caso->tipo }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Localidad:</strong>
            {{ $caso->localidad }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Nombre:</strong>
            {{ $caso->name }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Apellido paterno:</strong>
            {{ $caso->apellido_paterno }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Apellido materno:</strong>
            {{ $caso->apellido_materno }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">RUT:</strong>
            {{ $caso->rut }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Correo electrónico:</strong>
            {{ $caso->email }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Teléfono:</strong>
            {{ $caso->fono }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Región:</strong>
            {{ $caso->region }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Comuna:</strong>
            {{ $caso->comuna }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Dirección:</strong>
            {{ $caso->descripcion }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Asunto:</strong>
            {{ $caso->asunto }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Descripción:</strong>
            {{ $caso->descripcion }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Adjuntar foto y/o video:</strong>
            Descargar archivo:
        <a href="{{ asset('storage/archivos/' . $caso->archivo) }}" download>{{ $caso->archivo }}</a>
        </p>
    </div>
<form id="cerrarCasoForm">
    <input type="hidden" id="casoId" value="{{ $caso->casoid }}">
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125">
            <strong class="d-block text-gray-dark">RESPUESTA:</strong>
            <textarea id="respuesta" class="form-control" rows="3" placeholder="Escribir respuesta"></textarea>
            <div id="respuestaAlert" class="alert alert-danger d-none" role="alert">
                ¡La respuesta es obligatoria!
            </div>
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 text-md-right">
            <strong class="d-block text-gray-dark">Adjuntar archivo (Formatos .pdf, .zip, .rar. Tamaño máximo 20 mb.):</strong>
            <div class="mb-3">
                <input class="form-control @error('archivo') is-invalid @enderror" type="file" id="archivo" accept=".pdf,.zip,.rar">
                @error('archivo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="archivoAlert" class="alert alert-danger d-none" role="alert">
                    ¡El archivo es obligatorio!
                </div>
            </div>
            <button id="cerrarCasoBtn" type="button" class="btn btn-primary btn-block">Guardar ></button>
        </p>
    </div>
</form>
</div>
@else
<div class="container text-center">
    <h1>No tiene acceso a esta página</h1>
</div>
@endif
</section>
<!-- Bootstrap Modal for Confirmation -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmar Acción</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Está seguro de que desea cerrar el caso?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="confirmCierreBtn" type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        // Mostrar el modal de confirmación cuando se hace clic en el botón
        $('#cerrarCasoBtn').click(function(e) {
            e.preventDefault();
            // Mostrar el modal de confirmación
            $('#confirmModal').modal('show');
        });

        // Realizar la solicitud AJAX para cerrar el caso cuando se da confirmación
        $('#confirmCierreBtn').click(function() {

            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            // Obtener los valores de los campos
            var respuesta = $('#respuesta').val();
            var archivo = $('#archivo')[0].files[0];
            var casoId = $('#casoId').val();

            // Validate fields
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('casoId', casoId);
            formData.append('respuesta', respuesta);
            formData.append('archivo', archivo);

            // Realizar la solicitud AJAX
            $.ajax({
                url: "{{ route('cerrarCaso') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        // La solicitud fue exitosa, ahora verifica el contenido de la respuesta
                        if (response.success) {
                            // Si la respuesta indica éxito, cierra el modal y redirecciona a otra página
                            $('#confirmModal').modal('hide');
                            window.location.href = '../confirmacionRespuestaCaso';
                        } else {
                            // Si la respuesta indica que hubo errores de validación, muestra los mensajes de error debajo de los campos correspondientes
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
             $('#confirmModal').modal('hide');
        });
    });
</script>

@endsection
