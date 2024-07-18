@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
  <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Respuesta al Caso guardada con éxito</h1>
    </div>
  </div>
    <div class="container">
      <a href="{{ route('admin.dashboard') }}" class="btn btn-primary my-2">Volver a inicio</a>
      <a href="{{ route('verSugerenciaReclamo') }}" class="btn btn-primary my-2">Seguimiento del caso</a>
    </div>
</section>
@endsection
