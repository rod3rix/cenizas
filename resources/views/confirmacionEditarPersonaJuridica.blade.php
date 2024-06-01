@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><b>Persona Jurídica, editada con éxito</b></h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary my-2">Volver al inicio</a>
        <a href="{{ route('personaJuridica') }}" class="btn btn-primary my-2">Volver a Personas Jurídicas</a>
      </p>
    </div>
  <br>
  <br>
<hr>
</section>
@endsection
