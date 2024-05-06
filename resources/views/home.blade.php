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
          <h1 class="jumbotron-heading">BIENVENIDO</h1>
          <p class="lead text-muted">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</p>
        <br>
        <div class="card-deck mb-3 text-center">
        <div class="row mb-3 text-center">
      <div class="col-4 themed-grid-col"><div class="card mb-4 shadow-sm">
          <div class="card-header">
               <h4>FONDOS CONCURSABLES</h4>
               <h6>(solo organizaciones jurídicas)</h6>
          </div>
          <div class="card-body">
            <a href="{{ route('postularFondos') }}" class="btn btn-lg btn-block btn-primary">Postular Fondos Concursables</a>
            <hr>
            <a href="{{ route('verPostulacionesProyectos') }}" class="btn btn-lg btn-block btn-primary">Ver Estado Postulaciones</a>
          </div>
        </div></div>
      <div class="col-4 themed-grid-col"><div class="card mb-4 shadow-sm">
          <div class="card-header">
                <h4>Apoyo para proyectos</h4>
                <br>
          </div>
          <div class="card-body">
            <a href="{{ route('postularProyectos') }}" class="btn btn-lg btn-block btn-primary">Postular Proyectos</a>
            <hr>
            <a href="{{ route('seguimientoProyectos') }}" class="btn btn-lg btn-block btn-primary">Ver Estado Postulaciones</a>
          </div>
        </div></div>
      <div class="col-4 themed-grid-col">  <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4>sugerencias/RECLAMO</h4>
            <br>
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
