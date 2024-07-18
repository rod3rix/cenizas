@extends('layouts.app')
@section('content')
@section('content')
@if($acceso && ($caso->estado === null || $caso->estado != 1))
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
            {{ $caso->tipo }}
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
            <strong class="d-block text-gray-dark">Dirección:</strong>
            {{ $caso->direccion }}
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
            Sin archivo adjunto
        @endif
        </p>
    </div>
<form method="POST" id="frmInsert" name="frmInsert" enctype="multipart/form-data">
    @csrf
    <input id="url" name="url" value="cerrarCaso" type="hidden">
    <input id="href" name="href" value="../confirmacionRespuestaCaso" type="hidden">
    <input type="hidden" id="casoId" name="casoId" value="{{ $caso->casoid }}">
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125">
                <strong class="d-block text-gray-dark">RESPUESTA:</strong>
                <textarea id="respuesta" name="respuesta" class="form-control" rows="3" placeholder="Escribir respuesta"></textarea>
            </p>
        </div>
    <div class="media text-muted pt-3">
        <p class="media-body pb-3 mb-0 small lh-125 text-md-right">
            <strong class="d-block text-gray-dark">Adjuntar archivo (Formatos .pdf, .zip, .rar. Tamaño máximo 20 mb.):</strong>
            <div class="mb-3">
                <input class="form-control" type="file" id="archivo" name="archivo" accept=".pdf,.zip,.rar">
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
<script src="{{ asset('js/frm_enviar.js') }}?v={{ time() }}"></script>
@endsection
