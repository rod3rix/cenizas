@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Postular Fondos Concursables</h1>
      <p>Los <b>Fondos Concursables de Desarrollo Comunitario para Organizaciones Sociales de Cabildo</b>, son una iniciativa de Grupo Minero Las Cenizas que busca apoyar en el desarrollo socioeconómico de Cabildo. Se enmarca en el principio de responsabilidad social de nuestra Política de Sustentabilidad.<br />
      <b>“Generar relaciones de respeto y colaboración mutua con las comunidades cercanas a nuestras operaciones mineras”.</b></p>
    </div>
  </div>
    @if ($isVigente)
    <div class="container text-center">
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">Antecedentes generales</button>
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">Datos organización / MIPYME</button>
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">Postulación</button>
    </div>

    <div class="container">
    <form method="POST" id="frm_fondos" name="frm_fondos" enctype="multipart/form-data">
        <input id="frm"  name="frm" type="hidden"  value="1" >
        @csrf
        <div class="bt_et1">
        @include('frm.post_fond_etapa_1')
        </div>
        <div class="bt_et2">
        @include('frm.post_fond_etapa_2')
        </div>
        <div class="bt_et3">        
        @include('frm.post_fond_etapa_3')
        </div>
      <form>  
    </div>
     @else
     <div class="container text-center">
        <h3>Por el momento no existen fondos concursables</h3>
     </div>
     @endif
</div>
<script src="{{ asset('js/format_rut.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/frm_fondos_postular.js') }}?v={{ time() }}"></script>
@endsection
