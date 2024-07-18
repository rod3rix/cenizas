@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
  <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Bienvenid@</h1>
      <p>Gracias por registrarte</p>
    </div>
  </div>
    <div class="container">
      <a href="{{ route('home') }}" class="btn btn-primary my-2">Ir al menu principal</a>
    </div>
</section>
@endsection
