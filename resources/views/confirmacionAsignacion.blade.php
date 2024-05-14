@extends('layouts.app')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><b>Asignación de Usuario<br> guardada con éxito</b></h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary my-2">Volver al inicio</a>
        <a href="{{ route('usuariosRegistrados') }}" class="btn btn-primary my-2">Asignar otro usuario</a>
      </p>
    </div>
    <br>
      <br>
      
<hr>


  </section>

@endsection
