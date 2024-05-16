@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container text-center">
          <h3><b>Seguimiento de postulaciones<br>Apoyo Proyecto</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
        </div>

        <div  class="container">          
            <h5><b>Mis relaciones jurídicas asociadas</b></h5>
                  <table id="registros" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>FOLIO</th>
                              <th>NOMBRE PROYECTO</th>
                              <th>FECHA ENVÍO</th>
                              <th>ESTADO</th>
                              <th>RESOLUCION</th>
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Aquí se agregarán dinámicamente los datos -->
                      </tbody>
                       <!--  <tfoot>
                        <tr>
                              <th>FOLIO</th>
                              <th>NOMBRE PROYECTO</th>
                              <th>FECHA ENVÍO</th>
                              <th>ESTADO</th>
                              <th>RESOLUCION</th>
                        </tr>
                    </tfoot> -->
                  </table>
        </div>
</div>
<script>
    
$(document).ready(function() {
    $.ajax({
        url: '{{ route("listarApoyoProyectos") }}',
        type: 'POST',
        dataType: 'json',
        data: {_token: '{{ csrf_token() }}'},
        success: function(response) {
             $('#registros').DataTable({
                language: {
                    url: "{{ asset('lang/datatables/Spanish.json') }}"
                },
                data: response,
                columns: [
                    { data: 'id' },
                    { data: 'nombre_proyecto' },
                    { data: 'created_at_formatted' },
                    { data: 'estado_texto' },
                    { data: 'resolucion' }
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            modifier: {
                                page: 'all' // Exportar todas las páginas
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            modifier: {
                                page: 'all' // Exportar todas las páginas
                            }
                        },
                        filename: 'Portal Comunidades', // Nombre del archivo Excel
                        title: 'Portal Comunidades'
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            modifier: {
                                page: 'all' // Exportar todas las páginas
                            }
                        },
                        filename: 'Portal Comunidades', // Nombre del archivo PDF
                        title: 'Portal Comunidades'
                    }
                ],
                paging: true // Habilitar paginación
            });
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar los datos:', error);
        }
    });
});

</script>

@endsection
