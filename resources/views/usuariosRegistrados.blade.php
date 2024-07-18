@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container text-center">
      <h3><b>Usuarios Registrados</b></h3>
      <!-- <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p> -->
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
            </tbody>
        </table>
    </div>
</div>
<script>
    const appConfig = {dataTablesLangUrl:
    "{{ asset('lang/datatables/Spanish.json') }}"};
</script>
<script src="{{ asset('js/listar_usu_admin.js') }}?v={{ time() }}"></script>
@endsection