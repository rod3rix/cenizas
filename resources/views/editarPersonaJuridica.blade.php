@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Persona Jurídica</div>

                <div class="card-body">
                    <form id="updatePersonaJuridicaForm">
                        @csrf

                        <input id="name" type="hidden" id="personaJuridica_id" name="personaJuridica_id" value="{{ $personaJuridica->id }}" >                        
                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">RUT:</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control" name="rut" value="{{ $personaJuridica->rut }}" required autocomplete="rut" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>


                        <div class="form-group row">
                            <label for="razon_social" class="col-md-4 col-form-label text-md-right">Razón Social:</label>

                            <div class="col-md-6">
                                <input id="razon_social" type="text" class="form-control" name="razon_social" value="{{ $personaJuridica->razon_social }}" autocomplete="razon_social">

                                @error('razon_social')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>


                        <div class="form-group row">
                            <label for="relacion" class="col-md-4 col-form-label text-md-right">Relación:</label>

                            <div class="col-md-6">
                                <select id="relacion" class="form-control" name="relacion" required>
                                    <option value="socio" {{ $personaJuridica->relacion == 'socio' ? 'selected' : '' }}>Socio</option>
                                    <option value="otros" {{ $personaJuridica->relacion == 'otros' ? 'selected' : '' }}>Otros</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>


                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">Estado:</label>

                            <div class="col-md-6">
                                <select id="estado" class="form-control" name="estado">
                                    <option value="activo" {{ $personaJuridica->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="inactivo" {{ $personaJuridica->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <!-- Espacio en blanco -->
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="editarBtn">
                                    Editar
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
        $('#updatePersonaJuridicaForm').submit(function(e) {
            e.preventDefault();

            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '{{ route("actualizarPersonaJuridica") }}',
                data: formData,
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        // La solicitud fue exitosa, ahora verifica el contenido de la respuesta
                        if (response.success) {
                            window.location.href = '../confirmacionEditarPersonaJuridica';
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
