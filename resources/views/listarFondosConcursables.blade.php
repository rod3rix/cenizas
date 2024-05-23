@extends('layouts.app')

@section('content')
<div class="jumbotron">
        <div class="container text-center">
          <h3><b>Ver Fondos Concursables Creados</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>
        <hr>
        <div  class="container">    
            @foreach($titulos as $titulo)
            <h2>{{ $titulo->titulo_anual }}</h2>
            <ul>
                @foreach($listados->where('titulo_anual_id', $titulo->id) as $listado)
                    <li>{{ $listado->nombre_fondo }} </li>
                @endforeach
            </ul>
            @endforeach
        </div>
</div>
@endsection
