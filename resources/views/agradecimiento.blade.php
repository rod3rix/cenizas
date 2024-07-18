@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
  <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Gracias por postular a apoyo de proyectos</h1>
      <p>Pronto te daremos una respuesta</p>
    </div>
  </div>
    <div class="container">
        <a href="{{ route('home') }}" class="btn btn-primary my-2">Volver a inicio</a>
        <a href="{{ route('verPostulacionesFondos') }}" class="btn btn-primary my-2">Seguimiento de postulación</a>
      </p>
    </div>
</section>
@endsection
