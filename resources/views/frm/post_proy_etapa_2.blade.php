<div id="etapa_2" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('  DATOS ORGANIZACIÓN') }}</b></u></div>
            <div class="card-body">
                 <div class="form-group row">
                     <label for="nombre_organizacion" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre Organización*') }}</label>
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
                        <input id="rut_organizacion" type="text" class="form-control @error('rut_organizacion') is-invalid @enderror" name="rut_organizacion" value="{{ old('rut_organizacion') }}" required autocomplete="rut_organizacion" autofocus maxlength="12" onkeyup="formatRut(this)">
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
                        <input id="domicilio_organizacion" name="domicilio_organizacion" type="text" class="form-control @error('domicilio_organizacion') is-invalid @enderror" name="domicilio_organizacion" value="{{ old('domicilio_organizacion') }}" required autocomplete="domicilio_organizacion" autofocus>
                        @error('domicilio_organizacion')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="personalidad_juridica" class="col-md-12 col-form-label text-md-left">{{ __('4. Personalidad Jurídica') }}</label>
                     <div class="col-md-12">
                        <input id="personalidad_juridica" name="personalidad_juridica" type="text" class="form-control @error('personalidad_juridica') is-invalid @enderror" name="personalidad_juridica" value="{{ old('personalidad_juridica') }}" required autocomplete="rut" autofocus>
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
                        <input id="antiguedad_anos" type="text" class="form-control @error('antiguedad_anos') is-invalid @enderror" id="antiguedad_anos" name="antiguedad_anos" value="{{ old('antiguedad_anos') }}" required autocomplete="antiguedad_anos" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12">
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
                        <input id="numero_socios"  name="numero_socios" type="text" class="form-control @error('numero_socios') is-invalid @enderror" name="numero_socios" value="{{ old('numero_socios') }}" required autocomplete="numero_socios" autofocus onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12">
                        @error('numero_socios')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                   <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                         <button type="button" onclick="btn_volver(1)" class="btn btn-primary">
                        {{ __('Anterior') }}
                        </button>
                        <button type="button" onclick="validarFrmProy(2)" class="btn btn-primary">
                           {{ __('Siguiente') }}
                        </button>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>