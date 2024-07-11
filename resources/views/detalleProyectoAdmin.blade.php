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
        <strong class="d-block text-gray-dark">7. Comuna</strong>
         @if($pproy->zona === 1)
              Taltal
         @else
              Cabildo
         @endif  
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">8. Dirección</strong>
        {{ $pproy->direccion}}
      </p>
    </div>

     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">9. Nacionalidad</strong>
        {{ $pproy->nacionalidad }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">10. Género</strong>
        {{ $pproy->genero }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">11. Pertenece a pueblo originario</strong>
          @if($pproy->pueblo_originario == 1)
              Sí
          @else
              No
          @endif      
        </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">12. Discapacidad</strong>
        @if($pproy->discapacidad == 1)
            Sí
        @else
            No
        @endif
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">13. Fecha de nacimiento</strong>
         {{ \Carbon\Carbon::parse($pproy->fecha_nacimiento)->format('d-m-Y') }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">14. Actividad económica</strong>
        @if($pproy->actividad_economica === 'Otra')
          {{ $pproy->otros }}
        @else
          {{ $pproy->actividad_economica }}
        @endif
        </p>
    </div>
    
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">15. Posee formación formal</strong>
        @if($pproy->formacion_formal == 1)
            Sí
        @else
            No
        @endif
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">16. Nivel educacional</strong>
        {{ $pproy->profesion }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">17. Acepto cláusula de tratamiento de información personal </strong>
        Aceptada
      </p>
    </div>
</div>


@if($pproy->tipo=="organizacion")
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
        <strong class="d-block text-gray-dark">4. Antigüedad años</strong>
        {{ $pproy->antiguedad_anos }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">5. Número de socios</strong>
        {{ $pproy->numero_socios }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">6. Certificado de personalidad jurídica:</strong>
        <div class="mb-3">
          Descargar archivo:
            <a href="{{ asset('storage/archivos/' . $pproy->certificado_pj) }}" download>{{ $pproy->certificado_pj }}</a>
            </div>
      </p>
    </div>
</div>
@endif
@if($pproy->tipo=="mipyme")
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">DATOS MIPYME (Micro, pequeña y mediana empresa)</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">1. Razón social MIPYME</strong>
        {{ $pproy->razons_pyme }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. RUT MIPYME</strong>
        {{ $pproy->rut_pyme }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Domicilio MIPYME</strong>
        {{ $pproy->domicilio_pyme }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">4. Certificado iniciación actividades (SII)</strong>
        <div class="mb-3">
          Descargar archivo:
            <a href="{{ asset('storage/archivos/' . $pproy->certificado_sii) }}" download>{{ $pproy->certificado_sii }}</a>
        </div>
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">5. Ficha de registro social de hogares del representante legal de MIPYME</strong>
        <div class="mb-3">
          Descargar archivo:
            <a href="{{ asset('storage/archivos/' . $pproy->archivo_rsh) }}" download>{{ $pproy->archivo_rsh }}</a>
        </div>
      </p>
    </div>
</div>
@endif

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
        <strong class="d-block text-gray-dark">2. Temática</strong>
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
        <strong class="d-block text-gray-dark">5. Montos del proyecto</strong>Aporte solicitado: ${{ $pproy->aporte_solicitado }}<p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125">
        <strong class="d-block text-gray-dark">6. Minera Las Cenizas tiene el derecho de tomar fotografías y hacer visitas del proyecto. Además, instalar placa conmemorativa:</strong> Aceptada
      </p>
    </div>
</div>

  <form id="cerrarCasoForm">
      <input type="hidden" id="pproy_id" name="pproy_id" value="{{ $pproy->id_proy }}">
      <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125">
              <strong class="d-block text-gray-dark">RESPUESTA:</strong>
              <textarea id="respuesta" class="form-control" rows="3" placeholder="Escribir respuesta"></textarea>
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
                  <input class="form-control" type="file" id="archivo" accept=".pdf,.zip,.rar">
              </div>
              <button id="cerrarProyBtn" type="button" class="btn btn-primary btn-block">Guardar ></button>
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
        ¿Está seguro de que desea cerrar la postulación?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="confirmCierreBtn" type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/frm_cerrar_proy.js') }}?v={{ time() }}"></script>
@else
<div class="container text-center">
  <h1>No tiene acceso a esta página</h1>
<div>
@endif
@endsection

