@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
  <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Asignación de Usuario <br>guardada con éxito</h1>
    </div>
  </div>
    <div class="container">
      <a href="{{ route('admin.dashboard') }}" class="btn btn-primary my-2">Volver al inicio</a>
      <a href="{{ route('usuariosRegistrados') }}" class="btn btn-primary my-2">Asignar otro usuario</a>
    </div>
</section>
@endsection
