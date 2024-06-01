@extends('layouts.app')
@section('content')
<div class="jumbotron">
        <div class="container text-center">
          <h3><b>Ver Sugerencia Reclamo u otros</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>
        <hr>
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
