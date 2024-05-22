<div id="etapa_1" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('ANTECEDENTES GENERALES') }}</b></u></div>
            <div class="card-body">
                  <div class="form-group row">
                     <label for="nombres" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre *') }}</label>
                     <div class="col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="apellido_paterno" class="col-md-12 col-form-label text-md-left">{{ __('2. Apellido Paterno *') }}</label>
                     <div class="col-md-12">
                        <input id="apellido_paterno" type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno" value="{{ $user->apellido_paterno }}" required autocomplete="apellido_paterno"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="apellido_materno" class="col-md-12 col-form-label text-md-left">{{ __('3. Apellido Materno *') }}</label>
                     <div class="col-md-12">
                        <input id="apellido_materno" type="text" class="form-control @error('apellido_materno') is-invalid @enderror" name="apellido_materno" value="{{ $user->apellido_materno }}" required autocomplete="apellido_materno"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="rut" class="col-md-12 col-form-label text-md-left">{{ __('4. RUT*') }}</label>
                     <div class="col-md-12">
                        <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ $user->rut }}" required autocomplete="rut"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('5. Correo Electrónico *') }}</label>
                     <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                     <label for="fono" class="col-md-12 col-form-label text-md-left">{{ __('6. Teléfono *') }}</label>
                     <div class="col-md-12">
                        <input id="fono" type="text" class="form-control @error('fono') is-invalid @enderror" name="fono" value="{{ $user->fono }}" required autocomplete="fono"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="nacionalidad" class="col-md-12 col-form-label text-md-left">{{ __('7. Nacionalidad *') }}</label>
                     <div class="col-md-12">
                        <select id="nacionalidad" name="nacionalidad" type="text" class="form-control @error('nacionalidad') is-invalid @enderror" autofocus>
                           <option value="">Seleccione</option>
                           <option value="Chilena">Chilena</option>
                           <option value="Extranjera">Extranjera</option>
                        </select>
                        @error('nacionalidad')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="genero" class="col-md-12 col-form-label text-md-left">{{ __('8. Genero *') }}</label>
                     <div class="col-md-12">
                        <select id="genero" name="genero" type="text" class="form-control @error('genero') is-invalid @enderror">
                           <option value="">Seleccione</option>
                           <option value="Masculino">Masculino</option>
                           <option value="Femenino">Femenino</option>
                           <option value="Femenino">Otro</option>
                        </select>
                        @error('genero')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="pueblo_originario" class="col-md-12 col-form-label text-md-left">{{ __('9. Pertenece a pueblo originario *') }}</label>
                     <div class="col-md-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" id="pueblo_originario" name="pueblo_originario" type="radio" value="1">
                          <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" id="pueblo_originario" name="pueblo_originario" type="radio"  value="0">
                          <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                        @error('pueblo_originario')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="discapacidad" class="col-md-12 col-form-label text-md-left">{{ __('10. Discapacidad *') }}</label>
                     <div class="col-md-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="discapacidad" name="discapacidad" value="1">
                          <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="discapacidad" name="discapacidad" value="0">
                          <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                        @error('discapacidad')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="fecha_nacimiento" class="col-md-12 col-form-label text-md-left">{{ __('11. Fecha nacimiento *') }}</label>
                     <div class="col-md-6">
                        <input id="fecha_nacimiento" type="text" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required autocomplete="fecha_nacimiento"  readonly>
                           @error('fecha_nacimiento')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>  
                  </div>
                  <div class="form-group row">
                     <label for="actividad_economica" class="col-md-12 col-form-label text-md-left">{{ __('12. Actividad económica *') }}</label>
                     <div class="col-md-12">
                        <input id="actividad_economica" type="text" class="form-control @error('actividad_economica') is-invalid @enderror" name="actividad_economica" value="{{ old('actividad_economica') }}" required autocomplete="actividad_economica" >
                        @error('actividad_economica')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="direccion" class="col-md-12 col-form-label text-md-left">{{ __('13. Dirección *') }}</label>
                     <div class="col-md-12">
                        <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" >
                        @error('direccion')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="formacion_formal" class="col-md-12 col-form-label text-md-left">{{ __('14. Posee formación formal *') }}</label>
                     <div class="col-md-12">
                        <input id="formacion_formal" type="text" class="form-control @error('formacion_formal') is-invalid @enderror"name="formacion_formal" value="{{ old('formacion_formal') }}" required autocomplete="formacion_formal" >
                        @error('formacion_formal')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="profesion" class="col-md-12 col-form-label text-md-left">{{ __('15. Profesión *') }}</label>
                     <div class="col-md-12">
                        <input id="profesion" type="text" class="form-control @error('profesion') is-invalid @enderror" name="profesion" value="{{ old('profesion') }}" required autocomplete="profesion" >
                        @error('profesion')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="acepto_clausula" name="acepto_clausula" value="1">
                        </div>
                          <label class="form-check-label" for="acepto_clausula">Acepto cláusula de tratamiento de información personal * <br> Marcar casilla para aceptar cláusula..</label>
                        
                        @error('acepto_clausula')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                           <button type="button" onclick="validarFrmProy(1)" class="btn btn-primary">
                                    {{ __('Siguiente') }}
                           </button>
                     </div>
                  </div>
               <!-- </form> -->
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/calendario.js') }}"></script>
</body>
</html>
