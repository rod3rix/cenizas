@extends('layouts.app')
@section('content')
@if($acceso)
<section class="jumbotron">
    <div class="container ">
      <h1 class="jumbotron-heading text-center"><b>Usuario Registrado</b></h1>
      <p class="lead text-muted text-center">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h4 class="border-bottom border-gray pb-2 mb-0">USUARIO ID </h4>
    <h6 class="border-bottom border-gray pb-2 mb-0">Antecedentes generales</h6>
    
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">1. Nombre</strong>
        {{ $user->name}}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">2. Apellido paterno</strong>
         {{ $user->apellido_paterno }}
      
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">3. Apellido materno</strong>
        {{ $user->apellido_materno }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">4. RUT</strong>
        {{ $user->rut }}
      </p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">5. Correo electrónico</strong>
        {{ $user->email }}
      </p>
    </div>
        <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">6. Teléfono</strong>
        {{ $user->fono }}
      </p>
    </div>
      </div>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">POSTULACIONES ENVIADAS</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">XXXXXXXXXXXXX</strong>
      </p>
    </div>
  </div>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">SUGERENCIAS/RECLAMOS</h6>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 ">
        <strong class="d-block text-gray-dark">XXXXXXXXXXXXXXX</strong>
      </p>
    </div>
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0 text-center">ASIGNAR INFLUENCIA, VECINDAD, AFINIDAD MLC</h6>

<form method="POST" id="frmGuardarPuntaje" name="frmGuardarPuntaje">
@csrf
<input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
    @csrf
    <div class="row">
        <div class="col">
            <label for="influencia" class="col-sm-2 col-form-label">Influencia:</label>
            <select class="form-control" id="influencia" name="influencia">
                <option value="">Seleccione</option>
                @for ($i = 0; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $user->influencia == $i ? 'selected' : '' }}>{{ $i }}</option>

                @endfor
            </select>
        </div>
        <div class="col">
            <label for="vecindad" class="col-sm-2 col-form-label">Vecindad:</label>
            <select class="form-control" id="vecindad" name="vecindad">
                <option value="">Seleccione</option>
                @for ($i = 0; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $user->vecindad == $i ? 'selected' : '' }}>{{ $i }}</option>

                @endfor
            </select>
        </div>
        <div class="col">
            <label for="vecindad_mlc" class="col-sm-6 col-form-label">Afinidad MLC:</label>
            <select class="form-control" id="vecindad_mlc" name="vecindad_mlc">
                <option value="">Seleccione</option>
                @for ($i = 0; $i <= 5; $i++)
              <option value="{{ $i }}" {{ $user->vecindad_mlc == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="col">
            <label for="poder" class="col-sm-2 col-form-label">Poder:</label>
            <select class="form-control" id="poder" name="poder">
                <option value="">Seleccione</option>
                @for ($i = 0; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $user->poder == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
         <div class="row mt-3">
        <div class="col">
            <button type="submit" class="btn btn-primary">Asignar</button>
        </div>
    </div>
    </div>
</form>
</div>
</div>
</section>
<script src="{{ asset('js/frm_guardar_puntaje.js') }}?v={{ time() }}"></script>
@else
<div class="container text-center">
  <h1>No tiene acceso a esta página</h1>
<div>
@endif
@endsection