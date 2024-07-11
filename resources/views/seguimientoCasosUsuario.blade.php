@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
        <h1>Seguimiento de casos, sugerencias u otros</h1>
    </div>
    </div>

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
<script>
    const appConfig = {dataTablesLangUrl:
    "{{ asset('lang/datatables/Spanish.json') }}"};
</script>
<script src="{{ asset('js/listar_casos.js') }}?v={{ time() }}"></script>
@endsection
