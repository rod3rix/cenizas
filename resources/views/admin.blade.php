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
          <h3>PANEL DE ADMINISTRACIÓN</h3>
          <p class="lead text-muted">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
          <p>
            <a href="#" class="btn btn-lg btn-secondary my-3">VER USUARIOS</a>
            <a href="#" class="btn btn-lg btn-secondary my-3">VER USUARIOS FONDOS CONCURSABLES</a>
            <a href="#" class="btn btn-lg btn-secondary my-3">VER POSTULACIONES APOYO PROYECTOS</a>
            <a href="#" class="btn btn-lg btn-secondary my-3">VER CASOS</a>
          </p>
        </div>
      </section>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
