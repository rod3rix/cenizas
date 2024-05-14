@extends('layouts.app')

@section('content')

 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- You are logged in! -->

<div class="jumbotron">
        <div class="container text-center">
          <h3><b>Usuarios Registrados</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
        </div>

        <hr>

        <div  class="container">
            
            <table id="registros" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>RUT</th>
            <th>CORREO</th>
            <th>Influencia</th>
            <th>Vecindad</th>
            <th>Vecindad MLC</th>
            <th>Poder</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí se cargarán los datos dinámicamente -->
    </tbody>
</table>


    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/datatable.js') }}" defer></script>
<script>
$(document).ready(function() {
    // Realizar la solicitud AJAX para obtener los datos de los usuarios
    $.ajax({
        url: '{{ route("users.data") }}', // Ruta del controlador para obtener los datos de los usuarios
        type: 'POST', // Cambiamos el método HTTP a POST
        dataType: 'json', // Esperamos recibir datos en formato JSON
        data: {_token: '{{ csrf_token() }}'}, // Incluir el token CSRF en los datos de la solicitud
        success: function(response) {
            // Limpiar el cuerpo de la tabla
            $('#registros tbody').empty();

            // Iterar sobre los datos recibidos y agregarlos a la tabla
            $.each(response, function(index, user) {
                $('#registros tbody').append(
                    '<tr>' +
                    '<td>' + user.user_id_link + '</td>' +
                    '<td>' + user.name + '</td>' +
                    '<td>' + user.apellido_paterno + '</td>' +
                    '<td>' + user.rut + '</td>' +
                    '<td>' + user.email + '</td>' +
                    '<td>' + user.influencia + '</td>' +
                    '<td>' + user.vecindad + '</td>' +
                    '<td>' + user.vecindad_mlc + '</td>' +
                    '<td>' + user.poder + '</td>' +
                    '</tr>'
                );
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los usuarios:', error);
        }
    });
});
</script>


@endsection
