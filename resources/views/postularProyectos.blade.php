@extends('layouts.app')

@section('content')

<div class="jumbotron">
        <div class="container">
          <h3><b>POSTULACIÓN APOYO PROYECTO</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>

        <hr>

    <div class="container">
          <button type="button" id="bt_et1" class="btn btn-info btn-arrow-right btn-lg">ANTECEDENTES GENERALES</button>
          <button type="button" id="bt_et2" class="btn btn-arrow-right btn-lg">DATOS ORGANIZACIÓN</button>
          <button type="button" id="bt_et3"class="btn  btn-arrow-right btn-lg">TIPO PROYECTO</button>
          <button type="button" id="bt_et4" class="btn btn-arrow-right btn-lg">RELACIONES JURÍDICAS</button>
    </div>

    <div class="container">
    <form method="POST" id="frm_proy" name="frm_proy" enctype="multipart/form-data">
        <input id="frm"  name="frm" type="hidden"  value="1" >
        @csrf
        <div class="bt_et1">
        @include('frm.post_proy_etapa_1')
        </div>
        <div class="bt_et2">
        @include('frm.post_proy_etapa_2')
        </div>
        <div class="bt_et3">        
        @include('frm.post_proy_etapa_3')
        </div>
        <div class="bt_et4">
        @include('frm.post_proy_etapa_4')
        </div>
      <form>  
    </div>
</div>
<script src="{{ asset('js/frm_proy_postular.js') }}?v={{ time() }}"></script>
@endsection
