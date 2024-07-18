@extends('layouts.app')
@section('content')
<div class="jumbotron">
        <div class="container-fluid headpage">
                <div class="row justify-content-center headinner">
                        <h1>Ver Fondos Concursables Creados</h1>
                </div>
        </div>
        <div  class="container">    
            @foreach($listados as $listado)
            <ul>
                    <li>{{ $listado->nombre_fondo }} </li>
           </ul>
            @endforeach
        </div>
</div>
@endsection
