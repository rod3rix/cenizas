<div id="etapa_2" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">
             <div class="container mt-5">
        <div class="accordion" id="accordionExample">
            <!-- Crear nuevo registro persona Jurídica -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Mis organizaciones asociadas
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                         <div class="row mb-3">
                <label for="id_dato_organizacion" class="col-md-4 col-form-label text-md-end">{{ __('Asociar Organización:') }}</label>
                <div class="col-md-6">
                    <select id="id_dato_organizacion" name="id_dato_organizacion" class="form-control @error('id_dato_organizacion') is-invalid @enderror">
                       
                    </select>
                    @error('id_dato_organizacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
                        <!-- Contenido del formulario para crear nuevo registro -->
                    <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                        <button type="button" onclick="btn_volver(1)" class="btn btn-primary">
                        {{ __('Anterior') }}
                        </button>

                        <button type="button" onclick="validarFrmFondos(5)" class="btn btn-primary">
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
                        Crear nuevo registro organización.
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <!-- Contenido para listar personas jurídicas -->
                           <div class="card">
                                         <div class="card-header"><b><u>{{ __(' Nueva Organización') }}</b></u></div>
                <div class="card-body">
           
                 <div class="form-group row">
                     <label for="nombre_organizacion" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre Organización *') }}</label>
                     <div class="col-md-12">
                        <input id="nombre_organizacion" type="text" class="form-control @error('nombre_organizacion') is-invalid @enderror" name="nombre_organizacion" id="nombre_organizacion" value="{{ old('nombre_organizacion') }}" required autocomplete="nombre_organizacion" autofocus>
                        @error('nombre_organizacion')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="rut_organizacion" class="col-md-12 col-form-label text-md-left">{{ __('2. Rut Organización *') }}</label>
                     <div class="col-md-12">
                        <input id="rut_organizacion" type="text" class="form-control @error('rut_organizacion') is-invalid @enderror" name="rut_organizacion" value="{{ old('rut_organizacion') }}" required autocomplete="rut_organizacion"  maxlength="12" onkeyup="formatRut(this)">
                        @error('rut_organizacion')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="domicilio_organizacion" class="col-md-12 col-form-label text-md-left">{{ __('3. Domicilio Organización *') }}</label>
                     <div class="col-md-12">
                        <input id="domicilio_organizacion" name="domicilio_organizacion" type="text" class="form-control @error('domicilio_organizacion') is-invalid @enderror" name="domicilio_organizacion" value="{{ old('domicilio_organizacion') }}" required autocomplete="domicilio_organizacion" >
                        @error('domicilio_organizacion')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="personalidad_juridica" class="col-md-12 col-form-label text-md-left">{{ __('4. Personalidad Jurídica *') }}</label>
                     <div class="col-md-12">
                        <input id="personalidad_juridica" name="personalidad_juridica" type="text" class="form-control @error('personalidad_juridica') is-invalid @enderror" name="personalidad_juridica" value="{{ old('personalidad_juridica') }}" required autocomplete="rut" >
                        @error('personalidad_juridica')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="antiguedad_anos" class="col-md-12 col-form-label text-md-left">{{ __('5. Antiguedad de años *') }}</label>
                     <div class="col-md-12">
                        <input id="antiguedad_anos" type="text" class="form-control @error('antiguedad_anos') is-invalid @enderror" id="antiguedad_anos" name="antiguedad_anos" value="{{ old('antiguedad_anos') }}" required autocomplete="antiguedad_anos" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="3" onpaste="handlePaste(event)">
                        @error('antiguedad_anos')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="numero_socios" class="col-md-12 col-form-label text-md-left">{{ __('6. Número de socios *') }}</label>
                     <div class="col-md-12">
                        <input id="numero_socios"  name="numero_socios" type="text" class="form-control @error('numero_socios') is-invalid @enderror" name="numero_socios" value="{{ old('numero_socios') }}" required autocomplete="numero_socios"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="4" onpaste="handlePaste(event)">
                        @error('numero_socios')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <br>
                   <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                         <button type="button" onclick="btn_volver(1)" class="btn btn-primary">
                        {{ __('Anterior') }}
                        </button>
                        <button type="button" onclick="validarFrmFondos(2)" class="btn btn-primary">
                           {{ __('Siguiente') }}
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