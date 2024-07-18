@extends('layouts.app')
@section('content')
<div class="jumbotron">
        <div class="container text-center">
          <h3><b>Ver Fondos Concursables Creados</b></h3>
          <!-- <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p> -->
        </div>
        <hr>
        <div  class="container">    
            @foreach($listados as $listado)
            <ul>
                    <li>{{ $listado->nombre_fondo }} </li>
           </ul>
            @endforeach
        </div>
</div>
@endsection
