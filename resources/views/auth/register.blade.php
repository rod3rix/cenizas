@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card">
                <div class="card-header">{{ __('Registro datos personales') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label  text-align-left">{{ __('Nombre*') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellido_paterno" class="col-md-12 col-form-label  text-align-left">{{ __('Apellido Paterno*') }}</label>

                            <div class="col-md-12">
                                <input id="apellido_paterno" type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno" value="{{ old('apellido_paterno') }}"  autocomplete="apellido_paterno" autofocus>

                                @error('apellido_paterno*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="apellido_materno" class="col-md-12 col-form-label  text-align-left">{{ __('Apellido Materno*') }}</label>

                            <div class="col-md-12">
                                <input id="apellido_materno" type="text" class="form-control @error('apellido_materno') is-invalid @enderror" name="apellido_materno" value="{{ old('apellido_materno') }}"  autocomplete="apellido_paterno" autofocus>

                                @error('apellido_materno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rut" class="col-md-12 col-form-label  text-align-left">{{ __('RUT*') }}</label>

                            <div class="col-md-12">
                                <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}"  autocomplete="name" autofocus maxlength="12" onkeyup="formatRut(this)">

                                @error('rut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label text-align-left">{{ __('Email*') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-12 col-form-label text-align-left">{{ __('Teléfono*') }} <br /><small>Ingrese 8 dígitos</small></label>

                            <div class="col-md-12">
                                <div class="input-prefix">
                                <span>+56 9</span>
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}"  autocomplete="name" autofocus onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8">
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror       
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zona" class="col-md-12 col-form-label text-align-left">{{ __('Comuna*') }}</label>

                            <div class="col-md-12">
                                <select id="zona" class="form-control @error('zona') is-invalid @enderror" name="zona">
                                    <option value="">{{ __('Seleccione') }}</option>
                                    <option value="1" @if(old('zona') == '1') selected @endif>{{ __('Taltal') }}</option>
                                    <option value="2" @if(old('zona') == '2') selected @endif>{{ __('Cabildo') }}</option>
                                </select>
                                @error('zona')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label text-align-left">{{ __('Crear una contraseña*') }} <br /><small>Debe contener al menos 8 carateres</small></label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-12 col-form-label text-align-left">{{ __('Repetir contraseña*') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="captcha">
                                   <span>{!! captcha_img() !!}</span>
                                   <button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
                                   </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <small>Tómate tu tiempo para mirar cuidadosamente la imagen del CAPTCHA. Aunque las letras puedan estar distorsionadas, con paciencia podrás distinguirlas.</small>
                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">

                                </div>
                                @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-end">
                                    {{ __('Registrarme') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/format_rut.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/captcha.js') }}?v={{ time() }}"></script>
@endsection
