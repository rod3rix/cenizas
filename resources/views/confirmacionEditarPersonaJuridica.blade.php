@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
  <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Persona Jurídica, editada con éxito</h1>
    </div>
  </div>
    <div class="container">
      <a href="{{ route('admin.dashboard') }}" class="btn btn-primary my-2">Volver al inicio</a>
      <a href="{{ route('personaJuridica') }}" class="btn btn-primary my-2">Volver a Personas Jurídicas</a>
    </div>
</section>
@endsection
