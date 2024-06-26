@extends('layouts.app')

@section('content')

 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- You are logged in! -->

<section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Bienvenido</h1>
          <p class="mb-3">Acceda al <b>Portal Fondos</b> de Grupo Minera Las Cenizas. Aquí podrá informarse de los fondos concursables con los que contamos, postular tus proyectos y realizar sugerencias o reclamos.</p>
        <div class="card-deck mb-3 text-center">
        <div class="row mb-3 text-center">
      <div class="col-4 themed-grid-col"><div class="card fondos mb-4 shadow-sm">
          <div class="card-header">
               <h4>FONDOS CONCURSABLES</h4>
          </div>
          <div class="card-body">
            <a href="{{ route('postularFondos') }}" class="btn btn-lg btn-block btn-primary">Postular Fondos Concursables</a>
            <hr>
            <a href="{{ route('seguimientoFondos') }}" class="btn btn-lg btn-block btn-primary">Ver Estado Postulaciones</a>
          </div>
        </div></div>
      <div class="col-4 themed-grid-col"><div class="card proyectos mb-4 shadow-sm">
          <div class="card-header">
                <h4>Apoyo para proyectos</h4>
          </div>
          <div class="card-body">
            <a href="{{ route('postularProyectos') }}" class="btn btn-lg btn-block btn-primary">Postular Proyectos</a>
            <hr>
            <a href="{{ route('seguimientoProyectos') }}" class="btn btn-lg btn-block btn-primary">Ver Estado Postulaciones</a>
          </div>
        </div></div>
      <div class="col-4 themed-grid-col">  <div class="card sugerencias mb-4 shadow-sm">
          <div class="card-header">
            <h4>sugerencias/RECLAMO</h4>
          </div>
          <div class="card-body">   
            <a href="{{ route('enviarCaso') }}" class="btn btn-lg btn-block btn-primary">Ingresar Casos</a>
            <hr>
            <a href="{{ route('seguimientoCasosUsu') }}" class="btn btn-lg btn-block btn-primary">Ver Estado Casos</a>
          </div>
        </div></div>
    </div>    
      </div>
        </div>
      </section>

@endsection
