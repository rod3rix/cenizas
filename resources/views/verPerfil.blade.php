@extends('layouts.app')

@section('content')
<div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Perfil de Usuario</h1>
    </div>
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre:</label>

                        <div class="col-md-6">
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido_paterno" class="col-md-4 col-form-label text-md-right">Apellido Paterno:</label>

                        <div class="col-md-6">
                            <p>{{ $user->apellido_paterno }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido_materno" class="col-md-4 col-form-label text-md-right">Apellido Materno:</label>

                        <div class="col-md-6">
                            <p>{{ $user->apellido_materno }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rut" class="col-md-4 col-form-label text-md-right">RUT:</label>

                        <div class="col-md-6">
                            <p>{{ $user->rut }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fono" class="col-md-4 col-form-label text-md-right">Teléfono:</label>

                        <div class="col-md-6">
                            <p>{{ $user->fono }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico:</label>

                        <div class="col-md-6">
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                     @if(auth::user()->rol!="1")
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Comuna:</label>

                        <div class="col-md-6">
                            <p>{{ $user->zona == 1 ? 'Taltal' : 'Cabildo' }}</p>
                        </div>
                    </div>
                     @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
