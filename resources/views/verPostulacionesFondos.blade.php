@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Ver Postulaciones a Fondos Concursables</h1>
    </div>
  </div>
        <div  class="container">          
            <!-- <h5><b>Mis relaciones jurídicas asociadas</b></h5> -->
                  <table id="registros" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>FOLIO</th>
                              <th>NOMBRE PROYECTO</th>
                              <th>FECHA ENVÍO</th>
                              <th>ESTADO</th>
                              <th>POSTULANTE</th>
                              <th>RESPUESTA</th>
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Aquí se agregarán dinámicamente los datos -->
                      </tbody>
                  </table>
        </div>
</div>
<!-- Scripts -->
<script>
    const appConfig = {dataTablesLangUrl:
    "{{ asset('lang/datatables/Spanish.json') }}"};
</script>
<script src="{{ asset('js/listar_fondos_admin.js') }}?v={{ time() }}"></script>
@endsection
