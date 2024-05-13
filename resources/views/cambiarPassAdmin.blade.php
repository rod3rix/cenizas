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
            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current-password">
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="new_password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>

        <div class="col-md-6">
            <input id="new_password" type="password" class="form-control" name="new_password" required autocomplete="new-password">
            @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">Confirmar Nueva Contraseña</label>

        <div class="col-md-6">
            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password">
            @error('new_password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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

<script>
    $(document).ready(function() {
        $('#changePasswordForm').submit(function(e) {
            e.preventDefault();

            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '{{ route("change.password") }}',
                data: formData,
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        // La solicitud fue exitosa, ahora verifica el contenido de la respuesta
                        if (response.success) {
                            window.location.href = 'confirmacionPass';
                        } else {
                            // Si la respuesta indica que hubo errores de validación, muestra los mensajes de error debajo de los campos correspondientes
                            $.each(response.errors, function(key, value) {
                                // Encuentra el campo correspondiente al error y muestra el mensaje de error
                                $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                            });
                        }
                    } else {
                        console.error('Error en la solicitud:', xhr.status);
                        // Aquí puedes manejar otros tipos de errores de solicitud si es necesario
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Hubo un problema al enviar el formulario:', error);
                }
            });
        });
    });
</script>

@endsection
