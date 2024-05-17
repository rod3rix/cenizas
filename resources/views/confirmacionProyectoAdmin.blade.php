@extends('layouts.app')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><b>Respuesta a Apoyo Proyecto<br>guardada con éxito</b></h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary my-2">Volver a inicio</a>
        <a href="{{ route('verPostulacionesProyectos') }}" class="btn btn-primary my-2">Asignar otro proyecto</a>
      </p>
    </div>
    <br>
      <br>
      
<hr>


  </section>

@endsection
