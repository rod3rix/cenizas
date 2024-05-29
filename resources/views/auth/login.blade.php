@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header logo">
                    <img src="https://comuni.zlab.cl/assets/images/logo-cenizas-color.png" alt="GRUPO MINERO LAS CENIZAS">
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-2">
                            <label for="email" class="col-12 col-form-label text-align-left">{{ __(' Usuario') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-12 col-form-label text-align-left">{{ __('Contraseña') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="row mb-0">
                            <div class="col-md-12 d-grid gap-2">
                                <button type="submit" class="btn btn-primary d-grid gap-2">
                                    {{ __('Ingresar') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('REGISTRARSE') }}
                                    </a>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidó la contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                    </div>
                    </div>
                        <div class="row mt-4 mb-2">
                            <div class="col-md-12">
                                    <a class="linkcorp" href="https://www.cenizas.cl/">{{ __('www.cenizas.cl') }}
                                    </a>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12">
                                    <a class="linktc" href="{{ route('terminoCondiciones') }}">{{ __('Términos y condiciones') }}
                                    </a>
                            </div>
                        </div>
                
            
        </div>
    </div>
</div>
</section>
@endsection
