@extends('layouts.app')
@section('content')
@if($acceso)
<section class="jumbotron">
    <div class="container ">
      <h1 class="jumbotron-heading text-center"><b>Detalle postulación apoyo proyecto</b></h1>
      <p class="lead text-muted text-center">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">PROYECTO FOLIO {{ $pproy->id }}</h4>
    <h6 class="border-bottom border-gray pb-2 mb-0">Antecedentes generales</h6>
    
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">1. Nombre</strong>
        {{ $pproy->name }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. Apellido paterno</strong>
        {{ $pproy->apellido_paterno }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Apellido materno</strong>
        {{ $pproy->apellido_materno }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">4. RUT</strong>
        {{ $pproy->rut }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">5. Correo electrónico</strong>
        {{ $pproy->email }}
      </p>
    </div>
        <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">6. Teléfono</strong>
        {{ $pproy->fono }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">7. Nacionalidad</strong>
        {{ $pproy->nacionalidad }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">8. Género</strong>
        {{ $pproy->genero }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">9. Pertenece a pueblo originario</strong>
          @if($pproy->pueblo_originario == 1)
              Sí
          @else
              No
          @endif      
        </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">10. Discapacidad</strong>
        @if($pproy->discapacidad == 1)
            Sí
        @else
            No
        @endif
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">11. Fecha de nacimiento</strong>
        {{ $pproy->fecha_nacimiento }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">12. Actividad económica</strong>
        {{ $pproy->actividad_economica }}
        </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">13. Dirección</strong>
        {{ $pproy->direccion}}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">14. Posee formación formal</strong>
        {{ $pproy->formacion_formal }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">15. Profesión</strong>
        {{ $pproy->profesion }}
      </p>
    </div>
<!--     <small class="d-block text-right mt-3">
      <a href="#">All updates</a>
    </small>
 -->  </div>


 <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">DATOS ORGANIZACIÓN</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">1. Nombre organización</strong>
          {{ $pproy->nombre_organizacion }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. RUT organización</strong>
          {{ $pproy->rut_organizacion }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Domicilio organización</strong>
          {{ $pproy->domicilio_organizacion }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">4. Personalidad jurídica</strong>
          {{ $pproy->personalidad_juridica }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">5. Antigüedad años</strong>
          {{ $pproy->antiguedad_anos }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">6. Número de socios</strong>
        {{ $pproy->numero_socios }}
      </p>
    </div>

</div>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">TIPO DE PROYECTO</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">1. Nombre proyecto</strong>
          {{ $pproy->nombre_proyecto }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. Tipo de proyecto</strong>
          {{ $pproy->tipo_proyecto }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Lugar ejecución proyecto</strong>
          {{ $pproy->lugar_proyecto }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">4. Número beneficiarios directos e indirectos</strong>
             Directos: {{ $pproy->directos }} Indirectos:  {{ $pproy->indirectos }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">5. Montos solicitados</strong><p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">Aporte solicitado: ${{ $pproy->aporte_solicitado }}</strong>
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">6. Cargar anexo – Declaración jurada simple con firma del representante legal (ESTANDARIZAR NOMBRE DECLARACIÓN)</strong>
      </p>
    </div>
    <div class="media text-muted pt-3">
      <a href="{{ asset('storage/archivos') }}/declaracion_jurada.pdf" download="declaracion_jurada.pdf">declaracion_jurada</a>
    </div>
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Relaciones jurÍdicas</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">RUT: 76.980.567-7</strong>
      </p>

    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">RAZÓN SOCIAL: Nombre razón social XXXX</strong>
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">RELACIÓN: Socio</strong>
      </p>
    </div>
        <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">ESTADO: Estado?</strong>
      </p>
    </div>
</div>

  <form id="cerrarCasoForm">
      <input type="hidden" id="pproy_id" name="pproy_id" value="{{ $pproy->id }}">
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
            <strong class="d-block text-gray-dark">Estado del proyecto:</strong>
            <select id="estado_proyecto" name="estado_proyecto" class="form-control">
                <option value="">Seleccione</option>
                <option value="2">Proyecto aceptado</option>
                <option value="3">Proyecto rechazado</option>
            </select>
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
            var pproy_id = $('#pproy_id').val();
            var estado_proyecto = $('#estado_proyecto').val();

            // Validate fields
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('pproy_id', pproy_id);
            formData.append('respuesta', respuesta);
            formData.append('archivo', archivo);
            formData.append('estado_proyecto', estado_proyecto);

            // Realizar la solicitud AJAX
            $.ajax({
                url: "{{ route('cerrarProyecto') }}",
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
                            window.location.href = '../confirmacionProyectoAdmin';
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
@else

<h1>No tiene acceso a esta página</h1>

@endif
@endsection

