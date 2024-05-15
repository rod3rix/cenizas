@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container">
          <h3><b>RELACIONES JURÍDICAS</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p> -->
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
            </div>
        </div>    
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
                        <tr>
                              <th>RUT</th>
                              <th>RAZÓN SOCIAL</th>
                              <th>RELACIÓN</th>
                              <th>ESTADO</th>
                        </tr>
                    </tfoot>
                  </table>
        </div>
</div>
<script>
function formatRut(cliente) {
  cliente.value = cliente.value
    .replace(/[^0-9kK]/g, '') // Elimina todo excepto números y la letra 'k' o 'K'
    .replace(/^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4'); // Agrega puntos y guión en el formato estándar
}
    
$(document).ready(function() {
    $.ajax({
        url: '{{ route("listarPersonaJuridicas") }}',
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
                    { data: 'rut_link' },
                    { data: 'razon_social' },
                    { data: 'relacion' },
                    { data: 'estado' }
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

    $('#formData').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $('form :input').removeClass('is-invalid');
        $('.invalid-feedback').remove();

        $.ajax({
            url: '{{ route("crearPersonaJuridica") }}',
            type: 'POST',
            data: formData,
            success: function(response, textStatus, xhr) {
                if (xhr.status === 200) {
                    if (response.success) {
                        window.location.href = 'confirmacionPersonaJuridica';
                    } else {
                        $.each(response.errors, function(key, value) {
                            $('#' + key).addClass('is-invalid').after('<div class="invalid-feedback">' + value + '</div>');
                        });
                    }
                } else {
                    console.error('Error en la solicitud:', xhr.status);
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
