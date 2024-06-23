@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de Usuario</div>

                <div class="card-body">
                    <form id="updateProfileForm">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="name" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>


                        <div class="form-group row">
                            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-right">Apellido Paterno:</label>

                            <div class="col-md-6">
                                <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ $user->apellido_paterno }}" autocomplete="apellido_paterno" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>


                        <div class="form-group row">
                            <label for="apellido_materno" class="col-md-4 col-form-label text-md-right">Apellido Materno:</label>

                            <div class="col-md-6">
                                <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="{{ $user->apellido_materno }}" autocomplete="apellido_materno" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>


                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">RUT:</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ $user->rut }}" autocomplete="rut" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>

                        <div class="form-group row">
                            <label for="fono" class="col-md-4 col-form-label text-md-right">Teléfono:</label>

                            <div class="col-md-6">
                                 <input id="fono" type="text" class="form-control" name="fono" value="{{ $user->fono }}" autocomplete="fono" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="9">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico:</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" autocomplete="email" >
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/update_perfil.js') }}?v={{ time() }}"></script>
@endsection

