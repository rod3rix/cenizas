@extends('layouts.app')

@section('content')

@if($acceso)
<section class="jumbotron">
    <div class="container ">
      <h1 class="jumbotron-heading text-center"><b>Ver postulación y responder a Fondos Concursables</b></h1>
      <p class="lead text-muted text-center">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">PROYECTO FOLIO {{ $pfondo->id }}</h4>
    <h6 class="border-bottom border-gray pb-2 mb-0">Antecedentes generales</h6>
    
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">1. Nombre</strong>
        {{ $pfondo->name }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. Apellido paterno</strong>
        {{ $pfondo->apellido_paterno }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Apellido materno</strong>
        {{ $pfondo->apellido_materno }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">4. RUT</strong>
        {{ $pfondo->rut }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">5. Correo electrónico</strong>
        {{ $pfondo->email }}
      </p>
    </div>
        <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">6. Teléfono</strong>
        {{ $pfondo->fono }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">7. Nacionalidad</strong>
        {{ $pfondo->nacionalidad }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">8. Género</strong>
        {{ $pfondo->genero }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">9. Pertenece a pueblo originario</strong>
          @if($pfondo->pueblo_originario == 1)
              Sí
          @else
              No
          @endif      
        </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">10. Discapacidad</strong>
        @if($pfondo->discapacidad == 1)
            Sí
        @else
            No
        @endif
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">11. Fecha de nacimiento</strong>
        {{ $pfondo->fecha_nacimiento }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">12. Actividad económica</strong>
        {{ $pfondo->actividad_economica }}
        </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">13. Dirección</strong>
        {{ $pfondo->direccion}}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">14. Posee formación formal</strong>
        {{ $pfondo->formacion_formal }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">15. Profesión</strong>
        {{ $pfondo->profesion }}
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
        {{ $pfondo->nombre_organizacion }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. RUT organización</strong>
        {{ $pfondo->rut_organizacion }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Domicilio organización</strong>
        {{ $pfondo->domicilio_organizacion }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">4. Personalidad jurídica</strong>
        {{ $pfondo->personalidad_juridica }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">5. Antigüedad años</strong>
        {{ $pfondo->antiguedad_anos }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">6. Número de socios</strong>
        {{ $pfondo->numero_socios }}
      </p>
    </div>

</div>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">TIPO DE PROYECTO</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">1. Nombre proyecto</strong>
          {{ $pfondo->nombre_proyecto }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. Tipo de proyecto
        </strong>
        {{ $pfondo->equipamiento }}
      </p>
    </div>
    <form id="cerrarFondoForm">
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Fundamentación – Razones que motivan la calidad del proyecto</strong>
        {{ $pfondo->fundamentacion }}
      </p>
      <div class="col col-sm-4">
            <label for="calificacion" class="col-sm-2 col-form-label  border-bottom border-gray">Calificación:</label>
            <select class="form-control" id="calificar" name="calificar">
                <option value="">Seleccione</option>
                @for ($i = 0; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>

                @endfor
            </select>
            @error('calificar')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">4. Descripción del proyecto / Qué se va hacer</strong>
        {{ $pfondo->descripcion_proyecto }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">5. Objetivo general</strong>
        {{ $pfondo->objetivo_general }}
        <p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">6. Objetivos específicos</strong>
        {{ $pfondo->objetivos_especificos }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">7. Lugar de cierre del proyecto</strong>
        {{ $pfondo->cierre_proyecto }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">8. Número beneficiarios directos e indirectos</strong>
             Directos: {{ $pfondo->directos }} Indirectos:  {{ $pfondo->indirectos }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">9. Fecha de inicio / Fecha Término</strong>Fecha Termino: {{ $pfondo->directos }} Fecha Inicio:  {{ $pfondo->fecha_termino }} Cantidad de días: {{ $pfondo->cantidad_dias }}
      </p>
    </div>

   <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">10. Presupuesto: Agregar: Recursos Humanos, Materiales e insumos</strong>
        PENDIENTE*******************************************************************
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">11. Montos solicitados</strong>
      </p>
    </div>
    
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">Aporte solicitado:
        <strong class="d-block text-gray-dark"> ${{ $pfondo->aporte_solicitado }} </strong>          
      </p>
    </div>
           <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">Aporte Terceros:
        <strong class="d-block text-gray-dark"> ${{ $pfondo->aporte_terceros }}</strong>
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">Aporte Propio:
        <strong class="d-block text-gray-dark"> ${{ $pfondo->aporte_propio }}</strong>
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">12. Cargar anexo – Declaración jurada simple con firma del representante legal</strong>
      </p>
    </div>

    <div class="media text-muted pt-3">
      <a href="{{ asset('storage') }}/{{ $pfondo->archivo_anexo }}" download="{{ $pfondo->archivo_anexo }}">Descargar Anexo</a>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">13. Certificado</strong>
      </p>
    </div>

    <div class="media text-muted pt-3">
      <a href="{{ asset('storage/' . $pfondo->archivo_certificado ) }}" download="Fondo_anexo.pdf">Descargar Certificado</a>
    </div>
  
  </div>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Relaciones jurÍdicas</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">RUT: {{ $pfondo->rut }}</strong>
      </p>

    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">RAZÓN SOCIAL: {{ $pfondo->razon_social }}</strong>
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">RELACIÓN: {{ $pfondo->relacion }}</strong>
      </p>
    </div>
        <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">ESTADO: {{ $pfondo->estado }}</strong>
      </p>
    </div>
</div>
      <input type="hidden" id="pfondo_id" name="pfondo_id" value="{{ $pfondo->post_fondo_id }}">
      <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125">
              <strong class="d-block text-gray-dark">RESPUESTA:</strong>
              <textarea id="respuesta" name="respuesta" class="form-control" rows="3" placeholder="Escribir respuesta"></textarea>
            @error('respuesta')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </p>
      </div>
      <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 text-md-right">
            <strong class="d-block text-gray-dark">Estado del proyecto:</strong>
            <select id="estado_fondo" name="estado_fondo" class="form-control">
                <option value="">Seleccione</option>
                <option value="2">Proyecto aceptado</option>
                <option value="3">Proyecto rechazado</option>
            </select>
            @error('estado_fondo')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </p>
      </div>
      <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 text-md-right">
              <strong class="d-block text-gray-dark">Adjuntar archivo (Formatos .pdf, .zip, .rar. Tamaño máximo 20 mb.):</strong>
              <div class="mb-3">
                  <input class="form-control" type="file" id="archivo" name="archivo" accept=".pdf,.zip,.rar">
                  @error('archivo')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              <button id="cerrarFondoBtn" type="button" class="btn btn-primary btn-block">Guardar ></button>
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
        $('#cerrarFondoBtn').click(function(e) {
            e.preventDefault();
            // Mostrar el modal de confirmación
            $('#confirmModal').modal('show');
        });

        // Realizar la solicitud AJAX para cerrar el caso cuando se da confirmación
        $('#confirmCierreBtn').click(function() {

            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            // Obtener los valores de los campos
            var calificar = $('#calificar').val();
            var respuesta = $('#respuesta').val();
            var archivo = $('#archivo')[0].files[0];
            var pfondo_id = $('#pfondo_id').val();
            var estado_fondo = $('#estado_fondo').val();

            // Validate fields
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('pfondo_id', pfondo_id);
            formData.append('calificar', calificar);
            formData.append('respuesta', respuesta);
            formData.append('archivo', archivo);
            formData.append('estado_fondo', estado_fondo);

            // Realizar la solicitud AJAX
            $.ajax({
                url: "{{ route('cerrarFondo') }}",
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
                            window.location.href = '../confirmacionFondoAdmin';
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
