@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
        <h1>Seguimiento postulaciones a Fondos Concursables</h1>
    </div>
    </div>

        <div  class="container">          
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
                      </tbody>
                  </table>
        </div>
</div>
<script>
    const appConfig = {dataTablesLangUrl:
    "{{ asset('lang/datatables/Spanish.json') }}"};
</script>
<script src="{{ asset('js/listar_fondos.js') }}?v={{ time() }}"></script>
@endsection
