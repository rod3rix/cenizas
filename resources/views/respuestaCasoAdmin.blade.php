@extends('layouts.app')

@section('content')

<section class="jumbotron">
    <div class="container ">
      <h1 class="jumbotron-heading text-center"><b>Responder Caso</b></h1>
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
            {{ $caso->apellido }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Apellido materno:</strong>
            {{ $caso->appellido }}
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
            {{ $caso->respuesta }}
        </p>
    </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 text-md-right">
            <strong class="d-block text-gray-dark">Adjuntar archivo (Formatos .pdf, .zip, .rar. Tamaño máximo 20 mb.):</strong>
            <div class="mb-3">
          Descargar archivo:
            <a href="{{ asset('storage/archivos/' . $caso->archivo) }}" download>{{ $caso->archivo_respuesta }}</a>
            </div>
        </p>
    </div>
</form>
</div>
</section>
@endsection
