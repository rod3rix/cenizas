@extends('layouts.app')
@section('content')
<div class="jumbotron">
<div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Ver Sugerencias, Reclamos u otros</h1>
    </div>
  </div>
        <div  class="container">    
        <table id="registros" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>N° CASO</th>
                <th>ASUNTO</th>
                <th>NOMBRE</th>
                <th>FECHA ENVÍO</th>
                <th>ESTADO</th>
                <th>RESPUESTA</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
</div>
<!-- Scripts -->
<script>
    const appConfig = {dataTablesLangUrl:
    "{{ asset('lang/datatables/Spanish.json') }}"};
</script>
<script src="{{ asset('js/listar_sug_rec.js') }}?v={{ time() }}"></script>
@endsection
