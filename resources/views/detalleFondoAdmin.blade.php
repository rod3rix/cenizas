@extends('layouts.app')
@section('content')
@if($acceso && ($pfondo->estado === 1))
<section class="jumbotron">
  <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Ver postulación y responder a Fondos Concursables</h1>
    </div>
  </div>
    <div class="container ">
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
        <strong class="d-block text-gray-dark">7. Comuna</strong>
         @if($pfondo->zona === 1)
              Taltal
         @else
              Cabildo
         @endif  
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">9. Nacionalidad</strong>
        {{ $pfondo->nacionalidad }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">10. Género</strong>
        {{ $pfondo->genero }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">11. Pertenece a pueblo originario</strong>
          @if($pfondo->pueblo_originario == 1)
              Sí
          @else
              No
          @endif      
        </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">12. Discapacidad</strong>
        @if($pfondo->discapacidad == 1)
            Sí
        @else
            No
        @endif
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">13. Fecha de nacimiento</strong>
         {{ \Carbon\Carbon::parse($pfondo->fecha_nacimiento)->format('d-m-Y') }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">14. Actividad económica</strong>
        @if($pfondo->actividad_economica === 'Otra')
          {{ $pfondo->otros }}
        @else
          {{ $pfondo->actividad_economica }}
        @endif
        </p>
    </div>
    
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">15. Posee formación formal</strong>
        @if($pfondo->formacion_formal == 1)
            Sí
        @else
            No
        @endif
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">16. Nivel educacional</strong>
        {{ $pfondo->profesion }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">17. Acepto cláusula de tratamiento de información personal </strong>
        Aceptada
      </p>
    </div>
</div>

@if($pfondo->tipo=="organizacion")
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
        <strong class="d-block text-gray-dark">4. Antigüedad años</strong>
        {{ $pfondo->antiguedad_anos }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">5. Número de socios</strong>
        {{ $pfondo->numero_socios }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">6. Certificado de personalidad jurídica:</strong>
        <div class="mb-3">
          Descargar archivo:
            <a href="{{ asset('storage/archivos/' . $pfondo->certificado_pj) }}" download>{{ $pfondo->certificado_pj }}</a>
            </div>
      </p>
    </div>
</div>
@endif
@if($pfondo->tipo=="mipyme")
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">DATOS MIPYME (Micro, pequeña y mediana empresa)</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">1. Razón social MIPYME</strong>
        {{ $pfondo->razons_pyme }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. RUT MIPYME</strong>
        {{ $pfondo->rut_pyme }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Domicilio MIPYME</strong>
        {{ $pfondo->domicilio_pyme }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">4. Certificado iniciación actividades (SII)</strong>
        <div class="mb-3">
          Descargar archivo:
            <a href="{{ asset('storage/archivos/' . $pfondo->certificado_sii) }}" download>{{ $pfondo->certificado_sii }}</a>
        </div>
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">5. Ficha de registro social de hogares del representante legal de MIPYME</strong>
        <div class="mb-3">
          Descargar archivo:
            <a href="{{ asset('storage/archivos/' . $pfondo->archivo_rsh) }}" download>{{ $pfondo->archivo_rsh }}</a>
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
          {{ $pfondo->nombre_proyecto }}
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. Tipo de proyecto
        </strong>
        {{ $pfondo->tipo_proyecto }}
      </p>
    </div>
    <form method="POST" id="frmCerrarFondo" name="frmCerrarFondo" enctype="multipart/form-data">
      @csrf
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Fundamentación – Razones que motivan la calidad del proyecto</strong>
        {{ $pfondo->fundamentacion }}
      </p>

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
             Directos: {{ $pfondo->directos }} <br> 
             Indirectos:  {{ $pfondo->indirectos }}
      </p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">9. Fecha de inicio / Fecha Término</strong>Fecha Inicio: {{ \Carbon\Carbon::parse($pfondo->fecha_inicio)->format('d-m-Y') }}<br>
        Fecha Termino:  {{ \Carbon\Carbon::parse($pfondo->fecha_termino)->format('d-m-Y') }}<br> 
        Cantidad de días: {{ $pfondo->cantidad_dias }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">10. Presupuesto:</strong>
             Recursos Humanos: {{ $pfondo->rec_humanos }}<br>
             Materiales e Insumos: {{ $pfondo->mat_insumos }} <br>
             Otros: {{ $pfondo->rec_hum_otros }}<br>
             Total: {{ $pfondo->rec_humanos + $pfondo->mat_insumos + $pfondo->rec_hum_otros }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">11. Montos solicitados:</strong>
             Aporte solicitado: {{ $pfondo->aporte_solicitado }}<br>
             Aporte de terceros: {{ $pfondo->aporte_terceros }} <br>
             Aporte propio: {{ $pfondo->aporte_propio }}<br>
             Total: {{ $pfondo->aporte_solicitado + $pfondo->aporte_terceros + $pfondo->aporte_propio }}
      </p>
    </div>

      <input type="hidden" id="pfondo_id" name="pfondo_id" value="{{ $pfondo->post_fondo_id }}">
      <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125">
              <strong class="d-block text-gray-dark">Respuesta:</strong>
              <textarea id="respuesta" name="respuesta" class="form-control" rows="3" placeholder="Escribir respuesta"></textarea>
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
        </p>
      </div>
      <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 text-md-right">
              <strong class="d-block text-gray-dark">Adjuntar archivo (Formatos .pdf, .zip, .rar. Tamaño máximo 20 mb.):</strong>
              <div class="mb-3">
                  <input class="form-control" type="file" id="archivo" name="archivo" accept=".pdf,.zip,.rar">
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
        ¿Está seguro de que desea cerrar la postulación?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button id="confirmCierreBtn" type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/frm_cerrar_fondo.js') }}?v={{ time() }}"></script>
@else
<div class="container text-center">
  <h1>No tiene acceso a esta página</h1>
<div>
@endif
@endsection
