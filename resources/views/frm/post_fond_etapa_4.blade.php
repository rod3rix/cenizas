<div id="etapa_4" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">

    <div class="container mt-5">
        <div class="accordion" id="accordionExample">
            <!-- Crear nuevo registro persona Jurídica -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Mis organizaciones jurídicas asociadas
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <!-- Contenido del formulario para crear nuevo registro -->
                    <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                        <button type="button" onclick="btn_volver(3)" class="btn btn-primary">
                        {{ __('Anterior') }}
                        </button>

                        <button type="button" onclick="validarFrmFondos(4)" class="btn btn-primary">
                           {{ __('Finalizar') }}
                        </button>
                     </div>
                  </div>
                    </div>
                </div>
            </div>
            <!-- Listar personas Jurídicas -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Crear nuevo registro persona Jurídica.
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <!-- Contenido para listar personas jurídicas -->
                           <div class="card">
            <div class="card-header"><b><u>{{ __(' Relaciones Jurídicas ') }}</b></u></div>
                <div class="card-body">
                    <div class="form-group row mb-4"> <!-- Agrega la clase "mb-4" para un margen inferior de 4 -->
                        <label for="rut_juridico" class="col-sm-2 col-form-label">RUT:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="rut_juridico" name="rut_juridico" maxlength="12" onkeyup="formatRut(this)">
                            @error('rut_juridico')
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
                    <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                        <button type="button" onclick="btn_volver(3)" class="btn btn-primary">
                        {{ __('Anterior') }}
                        </button>

                        <button type="button" onclick="validarFrmFondos(4)" class="btn btn-primary">
                           {{ __('Finalizar') }}
                        </button>
                     </div>
                  </div>
             
                  
            </div>
         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
      </div>
   </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/datatable.js') }}" defer></script>