@extends('layouts.app')

@section('content')

 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- You are logged in! -->

<div class="jumbotron">
        <div class="container">
          <h3><b>INGRESO DE CASOS, SUGERENCIA U OTROS</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
        </div>

        <hr>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    <form method="POST" id="frm1" name="frm1" enctype="multipart/form-data">
                         <input id="frm" id="frm" value="1" type="hidden"> 
                        @csrf

                        <div class="form-group row">
                            <label for="tipo" class="col-md-12 col-form-label text-md-left">{{ __('1. Reclamo Sugerencias u Otros*') }}</label>

                            <div class="col-md-12">
                                <select id="tipo" name="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror">
                                    <option value="">Seleccione</option>
                                    <option value="Reclamo">Reclamo</option>
                                    <option value="Sugerencia">Sugerencia</option>
                                    <option value="Otro">Otro</option>
                                </select>

                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="localidad" class="col-md-12 col-form-label text-md-left">{{ __('2. Localidad*') }}</label>

                            <div class="col-md-12">
                                <select id="localidad" name="localidad" type="text" class="form-control @error('localidad') is-invalid @enderror">
                                    <option value="">Seleccione</option>
                                    <option value="Reclamo">pendiente</option>
                                    <option value="Reclamo">pendiente</option>
                                    <option value="Reclamo">pendiente</option>
                                </select>

                                @error('localidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('3. Nombre*') }}</label>
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidop" class="col-md-12 col-form-label text-md-left">{{ __('4. Apellido Paterno*') }}</label>

                            <div class="col-md-12">
                                <input id="apellidop" type="text" class="form-control @error('apellidop') is-invalid @enderror" name="apellidop" value="{{ $user->apellido }}" required autocomplete="apellidop" autofocus disabled>

                                @error('apellidop')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidom" class="col-md-12 col-form-label text-md-left">{{ __('5. Apellido Materno*') }}</label>

                            <div class="col-md-12">
                                <input id="apellidom" type="text" class="form-control @error('apellidom') is-invalid @enderror" name="apellidom" value="{{ $user->apellido }}" required autocomplete="apellidom" autofocus disabled>

                                @error('apellidom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="rut" class="col-md-12 col-form-label text-md-left">{{ __('6. RUT*') }}</label>

                            <div class="col-md-12">
                                <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ $user->rut }}" required autocomplete="rut" autofocus disabled>

                                @error('rut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('7. E-Mail*') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fono" class="col-md-12 col-form-label text-md-left">{{ __('8. Teléfono*') }}</label>

                            <div class="col-md-12">
                                <input id="fono" type="text" class="form-control @error('fono') is-invalid @enderror" name="fono" value="{{ $user->fono }}" required autocomplete="email" disabled>

                                @error('fono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $fono }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="region" class="col-md-12 col-form-label text-md-left">{{ __('9. Región*') }}</label>

                            <div class="col-md-12">
                                 <select id="region" name="region" type="text" class="form-control @error('region') is-invalid @enderror">
                                    <option value="">Seleccione</option>
                                    <option>Arica-Parinacota</option>
                                    <option>Tarapacá</option>
                                    <option>Antofagasta</option>
                                    <option>Atacama</option>
                                    <option>Coquimbo</option>
                                    <option>Valparaíso</option>
                                    <option>Metropolitana</option>
                                    <option>O'Higgins</option>
                                    <option>Maule</option>
                                    <option>Ñuble</option>
                                    <option>Bío Bío</option>
                                    <option>Araucanía</option>
                                    <option>Los Ríos</option>
                                    <option>Los Lagos</option>
                                    <option>Aysén</option>
                                    <option>Magallanes y Antártica Chilena</option>
                                </select>
                                

                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="comuna" class="col-md-12 col-form-label text-md-left">{{ __('10. Comuna*') }}</label>

                            <div class="col-md-12">
                                 <select id="comuna" name="comuna" type="text" class="form-control @error('comuna') is-invalid @enderror">
                                    <option value="">Seleccione</option>
                                    <option value="1" >Comuna</option>
                                    <option value="2">Comuna</option>
                                    <option value="3">otro</option>
                                </select>
                                

                                @error('comuna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-md-12 col-form-label text-md-left">{{ __('11. Dirección*') }}</label>

                            <div class="col-md-12">
                                <input id="direccion" name="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="asunto" class="col-md-12 col-form-label text-md-left">{{ __('12. Asunto*') }}</label>

                            <div class="col-md-12">
                                <input id="asunto" name="asunto" type="text" class="form-control @error('asunto') is-invalid @enderror" name="asunto" value="{{ old('asunto') }}" required autocomplete="asunto" autofocus>

                                @error('asunto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-12 col-form-label text-md-left">{{ __('13. Descripción*') }}</label>

                            <div class="col-md-12">
                                <textarea id="descripcion" name="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus></textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="archivo" class="col-md-12 col-form-label text-md-left">{{ __('14. Adjuntar foto o Video') }}</label>
                            <div class="col-md-12">
                                <input type="file" id="archivo" name="archivo" class="@error('archivo') is-invalid @enderror">
        <small>(Formatos .pdf, .zip, .rar. Tamaño máximo 20 mb.)</small>
        @error('archivo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
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
     
<!-- Scripts -->
<script>

   function enviarFormulario(idFrm) {

    var formData = new FormData(document.getElementById(idFrm));

    $('form :input').removeClass('is-invalid');
    $('.invalid-feedback').remove();

    $.ajax({
        url: 'guardar-formulario',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
   success: function(response, textStatus, xhr) {
        if (xhr.status === 200) {
            // La solicitud fue exitosa, ahora verifica el contenido de la respuesta
            if (response.success) {
                // Si la respuesta indica éxito, puedes realizar alguna acción, como redireccionar a otra página
                window.location.href = 'ingreso-caso';
            } else {
                // Si la respuesta indica que hubo errores de validación, muestras los mensajes de error debajo de los campos correspondientes
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
}
</script>

@endsection
