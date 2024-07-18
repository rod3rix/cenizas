@extends('layouts.app')
@section('content')
<div class="jumbotron">
<div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Usuarios Registrados</h1>
    </div>
  </div>
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