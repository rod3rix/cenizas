@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
  <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>El usuario ha sido actualizado correctamente</h1>
    </div>
  </div>
    <div class="container">
      <a href="{{ route('home') }}" class="btn btn-primary my-2">Volver a inicio</a>
    </div>
</section>
@endsection
