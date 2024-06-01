@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><b>Gracias por postular a<br> Fondos Concursables</b><br>Pronto te daremos una respuesta</h1>
        <a href="{{ route('home') }}" class="btn btn-primary my-2">Volver a inicio</a>
        <a href="{{ route('seguimientoFondos') }}" class="btn btn-primary my-2">Seguimiento de postulación</a>
      </p>
    </div>
  <br>
  <br>
<hr>
</section>
@endsection
