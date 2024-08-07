@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <div class="container-fluid headpage">
    <div class="row justify-content-center headinner">
      <h1>Postulación apoyo proyecto</h1>
      <p>Grupo Minera Las Cenizas se encuentra comprometido con el desarrollo social y económico de las comunidades en las cuales se encuentran sus proyectos. En función de lo anterior, dispone de financiamiento para aportar a dicho crecimiento y desarrollo. Por este mecanismo puedes postular tu proyecto el cual se puede enmarcar en las siguientes temáticas: cultura y patrimonio, deporte y recreación, desarrollo económico, educación, infraestructura y equipamiento comunitario, medioambiente, salud, voluntariado, animalismo, inclusión u otra temática relevante.</p>
    </div>
  </div>
        
    <div class="container text-center">
          <button type="button" id="bt_et1" class="btn btn-info btn-arrow-right btn-lg">Antecedentes generales</button>
          <button type="button" id="bt_et2" class="btn btn-arrow-right btn-lg">Datos organización / MIPYME</button>
          <button type="button" id="bt_et3"class="btn  btn-arrow-right btn-lg">Postulación</button>
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
      <form>  
    </div>
</div>
<script src="{{ asset('js/format_rut.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/frm_proy_postular.js') }}?v={{ time() }}"></script>
@endsection
