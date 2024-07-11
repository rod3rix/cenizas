@extends('layouts.app')
@section('content')
<div class="jumbotron">
        <div class="container-fluid headpage">
            <div class="row justify-content-center headinner">
            <h1>Ingreso sugerencias, reclamos u otros</h1>
            <p>Utiliza nuestro canal de requerimientos y reclamos para comunicarte directamente con MLC. Registra tu caso y recibe seguimiento y respuesta personalizada.</p>
            </div>
        </div>

        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <form method="POST" id="frm1" name="frm1" enctype="multipart/form-data">
                         <input id="frm" id="frm" value="1" type="hidden">
                         <div id="urlRegiones" style="display: none;" data-url="{{ route('getRegiones') }}"></div>

                        @csrf

                        <div class="form-group row">
                            <label for="tipo" class="col-md-12 col-form-label text-md-left">{{ __('1. Sugerencia, Reclamo u Otro*') }}</label>

                            <div class="col-md-12">
                                <select id="tipo" name="tipo" type="text" class="form-control" autofocus>
                                    <option value="">Seleccione</option>
                                    <option value="Sugerencia">Sugerencia</option>
                                    <option value="Reclamo">Reclamo</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('2. Nombre*') }}</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="name" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_paterno" class="col-md-12 col-form-label text-md-left">{{ __('3. Apellido Paterno*') }}</label>

                            <div class="col-md-12">
                                <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ $user->apellido_paterno }}" autocomplete="apellido_paterno"  disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_materno" class="col-md-12 col-form-label text-md-left">{{ __('4. Apellido Materno*') }}</label>

                            <div class="col-md-12">
                                <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="{{ $user->apellido_materno }}" autocomplete="apellido_materno"  disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rut" class="col-md-12 col-form-label text-md-left">{{ __('5. RUT*') }}</label>

                            <div class="col-md-12">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ $user->rut }}" autocomplete="rut"  disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('6. E-Mail*') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" autocomplete="email" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fono" class="col-md-12 col-form-label text-md-left">{{ __('7. Teléfono*') }}</label>

                            <div class="col-md-12">
                                <input id="fono" type="text" class="form-control" name="fono" value="{{ $user->fono }}" autocomplete="email" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left">{{ __('8. Comuna*') }}</label>

                            <div class="col-md-12">
                                @if(in_array($user->zona, [1, 2]))
                                <input type="text" class="form-control" value="{{ $user->zona == 1 ? 'Taltal' : 'Cabildo' }}" disabled>
                                <input type="hidden" name="comuna" value="{{ $user->zona }}">
                                @else
                                <input id="comuna" name="comuna" type="text" class="form-control" value="{{ old('comuna', '') }}">
                                @endif
                            </div>
                         </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-md-12 col-form-label text-md-left">{{ __('9. Dirección*') }}</label>

                            <div class="col-md-12">
                                <input id="direccion" name="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" autocomplete="direccion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="asunto" class="col-md-12 col-form-label text-md-left">{{ __('10. Asunto*') }}</label>

                            <div class="col-md-12">
                                <input id="asunto" name="asunto" type="text" class="form-control" name="asunto" value="{{ old('asunto') }}" autocomplete="asunto" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-12 col-form-label text-md-left">{{ __('11. Descripción*') }}</label>

                            <div class="col-md-12">
                                <textarea id="descripcion" name="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" autocomplete="descripcion" ></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="archivo" class="col-md-12 col-form-label text-md-left">{{ __('12. Adjuntar foto o Video') }}</label>
                            <div class="col-md-12">
                                <input type="file" id="archivo" name="archivo" class="form-control" >
                                <small>(Formatos .pdf, .zip, .rar. Tamaño máximo 20 mb.)</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-md-right">
                                <button type="button" onclick="enviarFormulario('frm1')" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="resultado"></div>
                </div>
            </div>
        </div>
    </div>
<hr>
</div>     
<script src="{{ asset('js/frm_casos.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/regiones_comunas.js') }}"></script>
@endsection
