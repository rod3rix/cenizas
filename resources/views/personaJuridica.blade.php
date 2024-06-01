@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container">
          <h3><b>RELACIONES JURÍDICAS</b></h3>
          <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>
        <div class="container">
            <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
            Ingresar otra relación jurídica
            </button>
            <div class="collapse" id="collapseForm">
                <div class="card card-body">
                    <form id="formData">
                        @csrf
                        <div class="form-group row mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
                        <label for="rut" class="col-sm-2 col-form-label">RUT:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="rut" name="rut" maxlength="12" onkeyup="formatRut(this)">
                        @error('rut')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        </div>

                        <div class="form-group row mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
                            <label for="razon_social" class="col-sm-2 col-form-label">Razón Social:</label>
                            <div class="col-sm-10">
                               <input type="text" class="form-control" id="razon_social" name="razon_social" >
                                @error('razon_social')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
           
                        <div class="form-group row mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
                            <label for="relacion" class="col-sm-2 col-form-label">Relación:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="relacion" name="relacion">
                                    <option value="">Seleccione</option>
                                    <option value="socio">Socio</option>
                                    <option value="otros">Otros</option>
                                </select>
                                @error('relacion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
                            <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="estado" name="estado">
                                    <option value="">Seleccione</option>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                                @error('estado')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
        <div  class="container">          
            <h5><b>Mis relaciones jurídicas asociadas</b></h5>
                  <table id="registros" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>RUT</th>
                              <th>RAZÓN SOCIAL</th>
                              <th>RELACIÓN</th>
                              <th>ESTADO</th>
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
<script src="{{ asset('js/format_rut.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/persona_juridicas_usu.js') }}?v={{ time() }}"></script>

@endsection
