@extends('layouts.app')

@section('content')


<div class="jumbotron">
        <div class="container">
          <h3><b>RELACIONES JURÍDICAS</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
        </div>

        <hr>

        <div  class="container">
            
      <h5><b>Mis relaciones jurídicas asociadas</b></h5>
      <table id="registros" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>RUT</th>
                  <th>RAZÓN SOCIAL</th>
                  <th>RELACIÓN</th>
                  <th>ESTADO</th>
              </tr>
          </thead>
          <tbody>
              <!-- Aquí se agregarán dinámicamente los datos -->
          </tbody>
          <tfoot>
          </tfoot>
      </table>
  </div>
  </div>

<div class="container">
    <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
        Ingresar otra relación jurídica
    </button>
    <div class="collapse" id="collapseForm">
        <div class="card card-body">
    <form id="formData">
    @csrf
<div class="form-group row mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
    <label for="rut" class="col-sm-2 col-form-label">RUT:</label>
    <div class="col-sm-10">
       <input type="text" class="form-control" id="rut" name="rut" maxlength="12" onkeyup="formatRut(this)">
        @error('rut')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
    <label for="razon_social" class="col-sm-2 col-form-label">Razón Social:</label>
    <div class="col-sm-10">
       <input type="text" class="form-control" id="razon_social" name="razon_social" >
        @error('razon_social')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
   
<div class="form-group row mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
    <label for="relacion" class="col-sm-2 col-form-label">Relación:</label>
    <div class="col-sm-10">
        <select class="form-control" id="relacion" name="relacion">
            <option value="">Seleccione</option>
            <option value="socio">Socio</option>
            <option value="otros">Otros</option>
        </select>
        @error('relacion')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
    <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
    <div class="col-sm-10">
        <select class="form-control" id="estado" name="estado">
            <option value="">Seleccione</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
        @error('estado')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
    <button type="submit" class="btn btn-primary">Crear</button>
</div>

    
</form>
</div>
<!-- Scripts -->
<script src="{{ asset('js/datatable.js') }}"></script>
<script>

function formatRut(cliente) {
  cliente.value = cliente.value
    .replace(/[^0-9kK]/g, '') // Elimina todo excepto números y la letra 'k' o 'K'
    .replace(/^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4'); // Agrega puntos y guión en el formato estándar
}
    $(document).ready(function() {

      $.ajax({
        url: '{{ route("listarPersonaJuridicas") }}', // Ruta del controlador para obtener los casos
        type: 'POST', // Cambiamos el método HTTP a POST
        dataType: 'json', // Esperamos recibir datos en formato JSON
        data: {_token: '{{ csrf_token() }}'}, // Incluir el token CSRF en los datos de la solicitud
            success: function(response) {
                // Limpiar el cuerpo de la tabla
                $('#registros tbody').empty();

                // Iterar sobre los datos recibidos y agregarlos a la tabla
                $.each(response, function(index, personaJuridica) {
                    $('#registros tbody').append(
                        '<tr>' +
                        '<td>' + personaJuridica.rut_link + '</td>' +
                        '<td>' + personaJuridica.razon_social + '</td>' +
                        '<td>' + personaJuridica.relacion + '</td>' +
                        '<td>' + personaJuridica.estado + '</td>' +
                        '</tr>'
                    );
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los datos:', error);
            }
      });


        // Capturar el evento de envío del formulario
        $('#formData').submit(function(e) {
            e.preventDefault(); // Evitar el envío tradicional del formulario
            var formData = $(this).serialize(); // Serializar los datos del formulario

            $('form :input').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            // Enviar la solicitud AJAX
            $.ajax({
                url: '{{ route("crearPersonaJuridica") }}',
                type: 'POST',
                data: formData,
                success: function(response, textStatus, xhr) {
                    if (xhr.status === 200) {
                        // La solicitud fue exitosa, ahora verifica el contenido de la respuesta
                        if (response.success) {
                            window.location.href = 'confirmacionPersonaJuridica';
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


    </div>

</div>
     


@endsection
