@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container text-center">
        <h3><b>SEGUIMIENTO POSTULACIONES A FONDOS CONCURSABLES ENVIADAS</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
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
