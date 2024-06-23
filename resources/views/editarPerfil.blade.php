@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDICIÓN DATOS PERSONALES') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}" autocomplete="nombres">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" autocomplete="apellidos">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('RUT') }}</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}" autocomplete="rut">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" autocomplete="telefono">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDICIÓN PERSONA JURIDÍCA') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="razon_social" class="col-md-4 col-form-label text-md-right">{{ __('Razón Social') }}</label>

                            <div class="col-md-6">
                                <input id="razon_social" type="text" class="form-control" name="razon_social" value="{{ old('razon_social') }}"autocomplete="razon_social">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('RUT') }}</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}" autocomplete="rut">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" autocomplete="direccion">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="giro" class="col-md-4 col-form-label text-md-right">{{ __('Giro') }}</label>

                            <div class="col-md-6">
                                <input id="giro" type="text" class="form-control" name="giro" value="{{ old('giro') }}" autocomplete="giro" >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDICIÓN RELACIONES JURIDÍCAS') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="razon_social" class="col-md-4 col-form-label text-md-right">{{ __('Razón Social') }}</label>

                            <div class="col-md-6">
                                <input id="razon_social" type="text" class="form-control" name="razon_social" value="{{ old('razon_social') }}"  autocomplete="razon_social">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('RUT') }}</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}" autocomplete="rut">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="relacion" class="col-md-4 col-form-label text-md-right">{{ __('RELACIÓN') }}</label>

                            <div class="col-md-6">
                                <select id="relacion" type="text" class="form-control" name="relacion" value="{{ old('relacion') }}" autocomplete="relacion">
                                    <option>SELECIONE</option> 
                                    <option>SOCIO</option>
                                    <option>DUEÑO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
