@extends('layouts.app')
@section('content')
@if($acceso && ($caso->estado !== null || $caso->estado === 1))
<section class="jumbotron">
<div class="container ">
    <div class="my-3 p-3 bg-white rounded ">
    <div class="media text-muted pt-3">
        <h4>SUGERENCIA, RECLAMO U OTRO CASO N°:{{ $caso->casoid }}</h4>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">RESPUESTA:</strong>
        {{ $caso->respuesta }}<p>
    </div>

    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">ARCHIVO ADJUNTO:</strong>
        @if($caso->archivo_respuesta)
      <a href="{{ asset('storage/archivos/' . $caso->archivo) }}" download>{{ $caso->archivo_respuesta }}</a>
      @else
      Sin archivo
      @endif 
      <p>
    </div>
  </div>
 
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
    <button class="accordion-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        VER DETALLE CASO INGRESADO
    </button>

    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Tipo:</strong>
            {{ $caso->tipo }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Comuna:</strong>
            @if($caso->comuna === 1)
              Taltal
            @else
              Cabildo
            @endif 
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
            @if ($caso->archivo)
                <a href="{{ asset('storage/archivos/' . $caso->archivo) }}" download>{{ $caso->archivo }}</a>
            @else
                <p>Sin archivo adjunto</p>
            @endif
        </p>
    </div>
</div>
      </div>
    </div>
  </div>
</div>
@else
<div class="container text-center">
    <h1>No tiene acceso a esta página</h1>
</div>
@endif
</section>
@endsection
