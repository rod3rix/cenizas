@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><b>Respuesta al Caso guardada<br>
con éxito</b></h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary my-2">Volver a inicio</a>
        <a href="{{ route('verSugerenciaReclamo') }}" class="btn btn-primary my-2">Seguimiento de postulación</a>
      </p>
    </div>
  <br>
<br>
<hr>
</section>
@endsection
