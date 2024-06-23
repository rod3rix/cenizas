@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cambiar Contraseña</div>

                <div class="card-body">
                        <form id="changePasswordForm">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="current_password" class="col-md-4 col-form-label text-md-right">Contraseña Actual</label>

                            <div class="col-md-6">
                                <input id="current_password" type="password" class="form-control" name="current_password"  autocomplete="current-password">
                                
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">Confirmar Nueva Contraseña</label>

                            <div class="col-md-6">
                                <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" autocomplete="new-password">
                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/frm_cambiar_pass_admin.js') }}?v={{ time() }}"></script>
@endsection
