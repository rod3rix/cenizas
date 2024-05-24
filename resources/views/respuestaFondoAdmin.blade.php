@extends('layouts.app')

@section('content')
<section class="jumbotron">
    <div class="container ">
      <h1 class="jumbotron-heading text-center"><b>Ver respuesta postulación a <br>
Fondos Concursables</b></h1>
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
      <a href="{{ asset('storage/archivos/') }}/{{ $pfondo->archivo_anexo }}" download="{{ $pfondo->archivo_anexo }}">Descargar Anexo</a>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">13. Certificado</strong>
      </p>
    </div>

    <div class="media text-muted pt-3">
      <a href="{{ asset('storage/archivos/' . $pfondo->archivo_certificado ) }}" download="Fondo_anexo.pdf">Descargar Certificado</a>
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

 <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">RESPUESTA:</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">{{ $pfondo->respuesta }}</strong>
      </p>
    </div>
     <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">Archivo Adjunto</strong>
        <a href="{{ asset('storage/archivos/' . $pfondo->archivo_respuesta ) }}">Descargar Archivo</a>
      </p>
    </div>
</div>
</div>
</section>
@endsection
