@extends('layouts.app')

@section('content')

 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><b>Gracias por postular a<br> apoyo de proyectos</b></h1>
      <h1 class="jumbotron-heading">Pronto te daremos una respuesta.</h1>
      <br>
      <br>
      <!-- <p class="lead text-muted">Pronto te daremos una respuesta.</p>
      <p>
       -->  <a href="" class="btn btn-primary my-2">Volver a inicio</a>
        <a href="{{ route('verPostulacionesFondos') }}" class="btn btn-primary my-2">Seguimiento de postulación</a>
      </p>
    </div>
    <br>
      <br>
      
<hr>


  </section>

@endsection
