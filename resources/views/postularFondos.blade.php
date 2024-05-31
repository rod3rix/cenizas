@extends('layouts.app')

@section('content')

<div class="jumbotron">
        <div class="container">
          <h3><b>Postular Fondos Concursables</b></h3>
          <p>Los <b>Fondos Concursables de Desarrollo Comunitario para Organizaciones Sociales de Cabildo</b>, son una iniciativa de Grupo Minero Las Cenizas que busca apoyar en el desarrollo socioeconómico de Cabildo. Se enmarca en el principio de responsabilidad social de nuestra Política de Sustentabilidad.<br />
          <b>“Generar relaciones de respeto y colaboración mutua con las comunidades cercanas a nuestras operaciones mineras”.</b></p>
        </div>
    <hr>
    @if ($isVigente)
    <div class="container">
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">ANTECEDENTES GENERALES</button>
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">DATOS ORGANIZACIÓN</button>
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">TIPO PROYECTO</button>
          <button type="button" class="btn btn-info btn-arrow-right btn-lg">RELACIONES JURÍDICAS</button>
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
        <div class="bt_et4">
        @include('frm.post_fond_etapa_4')
        </div>
      <form>  
    </div>
     @else
     <div class="container text-center">
        <h3><b>MOMENTANEAMENTE NO EXISTEN FONDOS CONCURSABLES</b></h3>
     </div>
     @endif

</div>
<script src="{{ asset('js/frm_fondos_postular.js') }}?v={{ time() }}"></script>
@endsection
