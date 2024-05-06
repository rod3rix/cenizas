@extends('layouts.app')

@section('content')

 @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
@endif

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Bienvenido</h1>
    <h1 class="jumbotron-heading"><b>Gracias por registrarte</b></h1>
    <br>
      <a href="{{ route('home') }}" class="btn btn-primary my-2">Ir al menu principal</a>
    </p>
  </div>
  <br>
  <br>
  <hr>
</section>

@endsection
