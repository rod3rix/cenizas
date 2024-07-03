@extends('layouts.app')
@section('content')
@if($acceso)
<section class="jumbotron">
    <div class="container ">
      <h1 class="jumbotron-heading text-center"><b>Respuesta Caso</b></h1>
      <p class="lead text-muted text-center">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una.</p>
 
  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">N° CASO {{ $caso->casoid }}</h4>    
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
            <strong class="d-block text-gray-dark">Adjunto foto y/o video:</strong>
            Descargar archivo:
        @if ($caso->archivo)
        <a href="{{ asset('storage/archivos/' . $caso->archivo) }}" download>{{ $caso->archivo }}</a>
        @else
            Sin archivo adjunto
        @endif
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125">
            <strong class="d-block text-gray-dark">RESPUESTA:</strong>
            {{ $caso->respuesta }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 text-md-right">
            <strong class="d-block text-gray-dark">Archivo Adjunto:</strong>
            <div class="mb-3">
            @if($caso->archivo_respuesta)
              Descargar archivo:
            <a href="{{ asset('storage/archivos/' . $caso->archivo_respuesta) }}" download>{{ $caso->archivo_respuesta }}</a>
            @else
              Sin Archivo
            @endif
            </div>
        </p>
    </div>
</div>
@else
<div class="container text-center">
    <h1>No tiene acceso a esta página</h1>
</div>
@endif
</section>
@endsection
