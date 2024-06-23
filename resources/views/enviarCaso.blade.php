@extends('layouts.app')
@section('content')
<div class="jumbotron">
        <div class="container">
          <h3><b>INGRESO DE CASOS, SUGERENCIA U OTROS</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>

        <hr>
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
                            <label for="localidad" class="col-md-12 col-form-label text-md-left">{{ __('2. Localidad*') }}</label>

                            <div class="col-md-12">
                                <select id="localidad" name="localidad" type="text" class="form-control" {{ in_array($user->zona, [1, 2]) ? 'disabled' : '' }}>
                                    <option value="">Seleccione</option>
                                    <option value="1" {{ $user->zona == 1 ? 'selected' : '' }}>Taltal</option>
                                    <option value="2" {{ $user->zona == 2 ? 'selected' : '' }}>Cabildo</option>
                                </select>
                                @if(in_array($user->zona, [1, 2]))
                                    <input type="hidden" name="localidad" value="{{ $user->zona }}">
                                @endif
                            </div>
                         </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('3. Nombre*') }}</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="name" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_paterno" class="col-md-12 col-form-label text-md-left">{{ __('4. Apellido Paterno*') }}</label>

                            <div class="col-md-12">
                                <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ $user->apellido_paterno }}" required autocomplete="apellido_paterno"  disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_materno" class="col-md-12 col-form-label text-md-left">{{ __('5. Apellido Materno*') }}</label>

                            <div class="col-md-12">
                                <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="{{ $user->apellido_materno }}" required autocomplete="apellido_materno"  disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rut" class="col-md-12 col-form-label text-md-left">{{ __('6. RUT*') }}</label>

                            <div class="col-md-12">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ $user->rut }}" required autocomplete="rut"  disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('7. E-Mail*') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fono" class="col-md-12 col-form-label text-md-left">{{ __('8. Teléfono*') }}</label>

                            <div class="col-md-12">
                                <input id="fono" type="text" class="form-control" name="fono" value="{{ $user->fono }}" required autocomplete="email" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="region" class="col-md-12 col-form-label text-md-left">{{ __('9. Región*') }}</label>

                            <div class="col-md-12">
                                 <select id="region" name="region" type="text" class="form-control" autocomplete="region">
                                    <option value="">Seleccione una región</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="comuna" class="col-md-12 col-form-label text-md-left">{{ __('10. Comuna*') }}</label>

                            <div class="col-md-12">
                                 <select id="comuna" name="comuna" type="text" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-md-12 col-form-label text-md-left">{{ __('11. Dirección*') }}</label>

                            <div class="col-md-12">
                                <input id="direccion" name="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="asunto" class="col-md-12 col-form-label text-md-left">{{ __('12. Asunto*') }}</label>

                            <div class="col-md-12">
                                <input id="asunto" name="asunto" type="text" class="form-control" name="asunto" value="{{ old('asunto') }}" required autocomplete="asunto" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-12 col-form-label text-md-left">{{ __('13. Descripción*') }}</label>

                            <div class="col-md-12">
                                <textarea id="descripcion" name="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" ></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="archivo" class="col-md-12 col-form-label text-md-left">{{ __('14. Adjuntar foto o Video') }}</label>
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
