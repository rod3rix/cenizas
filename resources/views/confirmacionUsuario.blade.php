@extends('layouts.app')

@section('content')

 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading"><b>El usuario ha sido actualizado correctamente<br></b></h1>
        <a href="{{ route('home') }}" class="btn btn-primary my-2">Volver a inicio</a>
      </p>
    </div>
    <br>
      <br>
      
<hr>


  </section>

@endsection
