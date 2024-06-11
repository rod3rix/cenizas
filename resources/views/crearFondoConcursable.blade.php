@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h3><b>Creación de Fondos Concursables</b></h3>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content.</p>
    </div>
    <div class="container mt-5">
        <!-- Mensaje de éxito -->
        <div id="success-message" class="alert alert-success" style="display: none;">
            ¡El formulario se ha enviado correctamente!
        </div>
        <div id="statusMessage" class="alert alert-success d-none" role="alert"></div>
        <!-- Primer acordeón -->
        <div class="accordion" id="accordionOne">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Crear Título del Fondo Concursable Anual
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                    <div class="accordion-body">
                        <!-- Aquí puedes agregar el contenido de la sección de administración de usuarios -->
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form method="POST" id="frm1" name="frm1">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="nombre_fondo" class="col-md-4 col-form-label text-md-end">{{ __('Título Anual:') }}</label>
                                            <div class="col-md-6">
                                                <input id="titulo_anual" type="text" class="form-control @error('titulo_anual') is-invalid @enderror" name="titulo_anual" value="{{ old('titulo_anual') }}" autocomplete="titulo_anual" autofocus>
                                                @error('titulo_anual')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="button" class="btn btn-primary" onclick="enviarFormulario('frm1')">
                                                    {{ __('Crear Título') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Segundo acordeón independiente -->
        <div class="accordion" id="accordionTwo">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Crear Fondo Concursable
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                    <div class="accordion-body">
                        <div class="container mt-5">
                            <form method="POST" id="frm2" name="frm2">
                                @csrf
                                <div class="row mb-3">
                                    <label for="nombre_fondo" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del Fondo:') }}</label>
                                    <div class="col-md-6">
                                        <input id="nombre_fondo" type="text" class="form-control @error('nombre_fondo') is-invalid @enderror" name="nombre_fondo" value="{{ old('nombre_fondo') }}" autocomplete="nombre_fondo" autofocus>
                                        @error('nombre_fondo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción:') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" autocomplete="descripcion">{{ old('descripcion') }}</textarea>
                                        @error('descripcion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fecha_inicio" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Inicio:') }}</label>
                                    <div class="col-md-6">
                                        <input id="fecha_inicio" type="text" class="form-control @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio" value="{{ old('fecha_inicio') }}" autocomplete="fecha_inicio">
                                        @error('fecha_inicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fecha_termino" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Término:') }}</label>
                                    <div class="col-md-6">
                                        <input id="fecha_termino" type="text" class="form-control @error('fecha_termino') is-invalid @enderror" name="fecha_termino" value="{{ old('fecha_termino') }}" autocomplete="fecha_termino">
                                        @error('fecha_termino')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="titulo_anual_id" class="col-md-4 col-form-label text-md-end">{{ __('Asociar a Título Anual:') }}</label>
                                    <div class="col-md-6">
                                        <select id="titulo_anual_id" name="titulo_anual_id" class="form-control @error('titulo_anual') is-invalid @enderror">

                                        </select>
                                        @error('titulo_anual_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="button" class="btn btn-primary" onclick="enviarFormulario('frm2')">
                                            {{ __('Crear Fondo Concursable') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/calendario.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/frm_fondos.js') }}?v={{ time() }}"></script>
@endsection
