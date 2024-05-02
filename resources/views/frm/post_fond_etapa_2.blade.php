<div id="etapa_2" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('  DATOS ORGANIZACIÓN') }}</b></u></div>
            <div class="card-body">
               <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group row">
                     <label for="nombres" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre Organización*') }}</label>
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
                     <label for="apellidos" class="col-md-12 col-form-label text-md-left">{{ __('2. Rut Organización *') }}</label>
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
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('3. Domicilio Organización *') }}</label>
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
                     <label for="rut" class="col-md-12 col-form-label text-md-left">{{ __('4. Personalidad Jurídica') }}</label>
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
                     <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('5. Antiguedad de años *') }}</label>
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
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('6. Número de socios *') }}</label>
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