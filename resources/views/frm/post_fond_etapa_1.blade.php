<div id="etapa_1" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('ANTECEDENTES GENERALES') }}</b></u></div>
            <div class="card-body">
               <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group row">
                     <label for="nombres" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre *') }}</label>
                     <div class="col-md-12">
                        <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="apellidos" class="col-md-12 col-form-label text-md-left">{{ __('2. Apellido Paterno *') }}</label>
                     <div class="col-md-12">
                        <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('3. Apellido Materno *') }}</label>
                     <div class="col-md-12">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="rut" class="col-md-12 col-form-label text-md-left">{{ __('4. RUT*') }}</label>
                     <div class="col-md-12">
                        <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" required autocomplete="rut" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('5. Correo Electrónico *') }}</label>
                     <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('6. Teléfono *') }}</label>
                     <div class="col-md-12">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('7. Nacionalidad *') }}</label>
                     <div class="col-md-12">
                        <select id="nombres" type="text" class="form-control">
                           <option>Seleccione</option>
                           <option value="0">Chilena</option>
                           <option value="1">Extranjera</option>
                        </select>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('8. Genero *') }}</label>
                     <div class="col-md-12">
                        <select id="nombres" type="text" class="form-control">
                           <option>Seleccione</option>
                           <option value="Reclamo">Masculino</option>
                           <option value="Sugerencia">Femenino</option>
                        </select>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('9. Pertenece a pueblo originario') }}</label>
                     <div class="col-md-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1">
                          <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                          <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('10. Discapacidad') }}</label>
                     <div class="col-md-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1">
                          <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                          <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('11. Fecha nacimiento') }}</label>
                     <div class="col-md-12">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('12. Actividad económica') }}</label>
                     <div class="col-md-12">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('13. Dirección *') }}</label>
                     <div class="col-md-12">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('13. Posee formación formal ') }}</label>
                     <div class="col-md-12">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('15. Profesión') }}</label>
                     <div class="col-md-12">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-12">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                          <label class="form-check-label" for="inlineCheckbox1">Acepto cláusula de tratamiento de información personal* <br> Marcar casilla para aceptar cláusula</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Anterior') }}
                        </button>

                         <button type="submit" class="btn btn-primary">
                        {{ __('Siguiente') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>