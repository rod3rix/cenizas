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
      <h3><b>SEGUIMIENTO DE CASOS, SUGERENCIA U OTROS</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
    </div>
    <hr>
    <div  class="container">
    <table id="registros" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>N° CASO</th>
            <th>ASUNTO</th>
            <th>FECHA DE ENVÍO</th>
            <th>ESTADO</th>
            <th>RESPUESTA</th>
        </tr>
    </thead>
        <tbody>
        <!-- Los datos se cargarán aquí a través de AJAX -->
        </tbody>
    </table>
    </div>
</div>
     
<!-- Scripts -->
<script src="{{ asset('js/datatable.js') }}" defer></script>
<script>    
    $(document).ready(function() {
    // Realizar la solicitud AJAX para obtener los datos de los casos
    $.ajax({
        url: '{{ route("casosUsuario") }}', // Ruta del controlador para obtener los casos
        type: 'POST', // Cambiamos el método HTTP a POST
        dataType: 'json', // Esperamos recibir datos en formato JSON
        data: {_token: '{{ csrf_token() }}'}, // Incluir el token CSRF en los datos de la solicitud
        success: function(response) {
            // Limpiar el cuerpo de la tabla
            $('#registros tbody').empty();

            // Iterar sobre los datos recibidos y agregarlos a la tabla
            $.each(response, function(index, caso) {
                $('#registros tbody').append(
                    '<tr>' +
                    '<td>' + caso.id + '</td>' +
                    '<td>' + caso.asunto + '</td>' +
                    '<td>' + caso.fecha_creacion + '</td>' +
                    '<td>' + caso.estado + '</td>' +
                    '<td>' + caso.respuesta + '</td>' +
                    '</tr>'
                );
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los casos:', error);
        }
    });
});
</script>

@endsection
