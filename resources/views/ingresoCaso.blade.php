@extends('layouts.app')

@section('content')

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading"><b>Gracias por ingresar tu caso</b></h1>
    <h1 class="jumbotron-heading">Pronto te daremos una respuesta</h1>
    <br>
      <a href="{{ route('home') }}" class="btn btn-primary my-2">Volver al Inicio</a>
      <a href="{{ route('seguimientoCasosUsu') }}" class="btn btn-primary my-2">Seguimiento caso</a>
    </p>
  </div>
  <br>
  <br>
  <hr>
</section>

@endsection
