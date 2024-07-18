@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
        <div class="container-fluid headpage">
          <div class="row justify-content-center headinner">
            <h1>Bienvenid@</h1>
            <p>Acceda al <b>Portal Fondos</b> de Grupo Minera Las Cenizas. Aquí podrá informarse de los fondos concursables con los que contamos, postular tus proyectos y realizar sugerencias o reclamos</p>
          </div>
        </div>
        <div class="container">
        <div class="card-deck mb-3 text-center">
        <div class="row mb-3 text-center">
      <div class="col-md-4 themed-grid-col"><div class="card fondos mb-4">
          <div class="card-header">
               <h4>Fondos Concursables</h4>
          </div>
          <div class="card-body">
            <a href="{{ route('postularFondos') }}" class="btn btn-lg btn-block btn-primary">Postular Fondos Concursables</a>
            <a href="{{ route('seguimientoFondos') }}" class="btn btn-lg btn-block btn-primary">Ver Estado Postulaciones</a>
          </div>
        </div></div>
      <div class="col-md-4 themed-grid-col"><div class="card proyectos mb-4">
          <div class="card-header">
                <h4>Apoyo para proyectos</h4>
          </div>
          <div class="card-body">
            <a href="{{ route('postularProyectos') }}" class="btn btn-lg btn-block btn-primary">Postular Proyectos</a>
            <a href="{{ route('seguimientoProyectos') }}" class="btn btn-lg btn-block btn-primary">Ver Estado Postulaciones</a>
          </div>
        </div></div>
      <div class="col-md-4 themed-grid-col">  <div class="card sugerencias mb-4">
          <div class="card-header">
            <h4>sugerencias/Reclamo</h4>
          </div>
          <div class="card-body">   
            <a href="{{ route('enviarCaso') }}" class="btn btn-lg btn-block btn-primary">Ingresar Casos</a>
            <a href="{{ route('seguimientoCasosUsu') }}" class="btn btn-lg btn-block btn-primary">Ver Estado Casos</a>
          </div>
        </div></div>
    </div>    
      </div>
        </div>
      </section>
@endsection
