<div id="etapa_3" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('  TIPO PROYECTO') }}</b></u></div>
            <div class="card-body">
               <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group row">
                     <label for="nombres" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre Proyecto*') }}</label>
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
                     <label for="apellidos" class="col-md-12 col-form-label text-md-left">{{ __('2. Equipamiento comunitario/Mejoramiento infraestuctura/ Calidad de Vida y Desarrollo comunitario*') }}</label>
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
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('3. Fundamentación - Razones que motivan lacalidad del proyecto') }}</label>
                     <div class="col-md-12">
                        <textarea id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus></textarea>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('4. Descripción del proyecto / Qué se va hacer*') }}</label>
                     <div class="col-md-12">
                        <textarea id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus></textarea>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('5. Objetivo general*') }}</label>
                     <div class="col-md-12">
                        <textarea id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus></textarea>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="rut" class="col-md-12 col-form-label text-md-left">{{ __('6. Objetivos Especificos*') }}</label>
                     <div class="col-md-12">
                        <textarea id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus></textarea>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('7. Lugar de cierre del proyecto*') }}</label>
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
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('8. Número de beneficiarios directos e indirectos *') }}</label>
                     <div class="col-md-6">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="col-md-6">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('9. Fecha de inicio / Fecha Término *') }}</label>
                      <label for="telefono" class="col-md-4 col-form-label text-md-left">{{ __('Fecha de inicio') }}</label>
                      <label for="telefono" class="col-md-4 col-form-label text-md-left">{{ __('Fecha Término') }}</label>
                      <label for="telefono" class="col-md-4 col-form-label text-md-left">{{ __('Cantidad de días') }}</label>
                     <div class="col-md-4">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="col-md-4">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="col-md-4">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>            
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('10. Presupuesto: Agregar: Recursos Humanos, Materiales e insumos') }}</label>
                      <label for="telefono" class="col-md-2 col-form-label text-md-left">{{ __('Detalle') }}</label>
                      <div class="col-md-5">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <label for="telefono" class="col-md-1 col-form-label text-md-left">{{ __('Monto') }}</label>
                      <div class="col-md-4">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus placeholder="$">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                      <label for="telefono" class="col-md-2 col-form-label text-md-left">{{ __('Detalle') }}</label>
                      <div class="col-md-5">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <label for="telefono" class="col-md-1 col-form-label text-md-left">{{ __('Monto') }}</label>
                      <div class="col-md-4">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus placeholder="$">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-2"></div>
                     <div class="col-md-10">
                        <button type="button" class="btn btn-primary btn-block">{{ __('Agregar otro') }}</button>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="telefono" class="col-md-2 col-form-label text-md-left">{{ __('Total') }}</label>
                     <div class="col-md-10">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus placeholder="$">
                     </div>
                  </div>
                  <div class="form-group row">
                      <label for="telefono" class="col-md-12 col-form-label text-md-left">{{ __('11. Montos solicitados') }}</label>  
                      <label for="telefono" class="col-md-2 col-form-label text-md-left">{{ __('Aporte solicitado') }}</label>
                      <div class="col-md-10">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus placeholder="$">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row">
                      <label for="telefono" class="col-md-2 col-form-label text-md-left">{{ __('Aporte de terceros') }}</label>
                      <div class="col-md-10">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus placeholder="$">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>

                  <div class="form-group row">
                      <label for="telefono" class="col-md-2 col-form-label text-md-left">{{ __('Aporte propio') }}</label>
                      <div class="col-md-10">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus placeholder="$">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  
                  <div class="form-group row">
                     <label for="telefono" class="col-md-2 col-form-label text-md-left">{{ __('Total') }}</label>
                     <div class="col-md-10">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus placeholder="$">
                     </div>
                  </div>

                  <div class="form-group row">
                      <label for="telefono" class="col-md-12 col-form-label text-md-left">12. Cargar Anexo - Declaración jurada simple con firma del representante legal* &nbsp;&nbsp;<br>&nbsp;  &nbsp; (formato .pdf, .zip, .rar. Tamaño máximo 20 mb.)</label>  
                  </div>

                  <div class="form-group row">
                     <div class="col-md-12">
                        <input id="telefono" type="file" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus placeholder="$">
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