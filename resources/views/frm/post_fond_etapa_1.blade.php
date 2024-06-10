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
                           <option value="Otra">Otra</option>
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
                           <option value="Femenino">Femenino</option>
                           <option value="Masculino">Masculino</option>
                           <option value="Otro">Otro</option>
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
                      <select id="actividad_economica" class="form-control @error('actividad_economica') is-invalid @enderror" name="actividad_economica" required>
                          <option value="">Seleccione su actividad económica</option>
                          <option value="Trabajador/a asalariado/a" {{ old('actividad_economica') == 'Trabajador/a asalariado/a' ? 'selected' : '' }}>Trabajador/a asalariado/a</option>
                          <option value="Trabajador/a independiente" {{ old('actividad_economica') == 'Trabajador/a independiente' ? 'selected' : '' }}>Trabajador/a independiente</option>
                          <option value="Estudiante" {{ old('actividad_economica') == 'Estudiante' ? 'selected' : '' }}>Estudiante</option>
                          <option value="Desempleado/a" {{ old('actividad_economica') == 'Desempleado/a' ? 'selected' : '' }}>Desempleado/a</option>
                          <option value="Jubilado/a" {{ old('actividad_economica') == 'Jubilado/a' ? 'selected' : '' }}>Jubilado/a</option>
                          <option value="Dueño/a de casa" {{ old('actividad_economica') == 'Dueño/a de casa' ? 'selected' : '' }}>Dueño/a de casa</option>
                          <option value="Freelancer" {{ old('actividad_economica') == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                          <option value="Empresario/a" {{ old('actividad_economica') == 'Empresario/a' ? 'selected' : '' }}>Empresario/a</option>
                          <option value="Empleado/a del hogar" {{ old('actividad_economica') == 'Empleado/a del hogar' ? 'selected' : '' }}>Empleado/a del hogar</option>
                          <option value="Trabajador/a por cuenta propia" {{ old('actividad_economica') == 'Trabajador/a por cuenta propia' ? 'selected' : '' }}>Trabajador/a por cuenta propia</option>
                          <option value="Agricultor/a" {{ old('actividad_economica') == 'Agricultor/a' ? 'selected' : '' }}>Agricultor/a</option>
                          <option value="Artista" {{ old('actividad_economica') == 'Artista' ? 'selected' : '' }}>Artista</option>
                          <option value="Profesional independiente (médico, abogado, contador, etc.)" {{ old('actividad_economica') == 'Profesional independiente (médico, abogado, contador, etc.)' ? 'selected' : '' }}>Profesional independiente (médico, abogado, contador, etc.)</option>
                          <option value="Militar" {{ old('actividad_economica') == 'Militar' ? 'selected' : '' }}>Militar</option>
                          <option value="Funcionario/a público/a" {{ old('actividad_economica') == 'Funcionario/a público/a' ? 'selected' : '' }}>Funcionario/a público/a</option>
                          <option value="Otra" {{ old('actividad_economica') == 'Otra' ? 'selected' : '' }}>Otra (especifique)</option>
                      </select>
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
                       <select id="profesion" class="form-control @error('profesion') is-invalid @enderror" name="profesion" required>
                           <option value="">Seleccione una opción</option>
                           <option value="Educación Básica" {{ old('profesion') == 'Educación Básica' ? 'selected' : '' }}>Educación Básica</option>
                           <option value="Educación media" {{ old('profesion') == 'Educación media' ? 'selected' : '' }}>Educación media</option>
                           <option value="Técnico" {{ old('profesion') == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                           <option value="Universitario" {{ old('profesion') == 'Universitario' ? 'selected' : '' }}>Universitario</option>
                           <option value="Postgrado" {{ old('profesion') == 'Postgrado' ? 'selected' : '' }}>Postgrado</option>
                       </select>
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
                          <label class="form-check-label" for="acepto_clausula">        <a href="#" data-bs-toggle="modal" data-bs-target="#clausulaModal">Acepto cláusula de tratamiento de información personal *</a>
                           <br> Marcar casilla para aceptar cláusula..</label>
                        @error('acepto_clausula')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                           <button type="button" onclick="validarFrmFondos(1)" class="btn btn-primary">
                                    {{ __('Siguiente') }}
                           </button>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
<style>
.modal-dialog {
   max-width: 90%;
}
</style>
    <!-- Modal -->
    <div class="modal fade" id="clausulaModal" tabindex="-1" aria-labelledby="clausulaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clausulaModalLabel">CLAUSULA FONDO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC<br>
                        <br>
                        Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"<br>
                        <br>
                        Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"<br>
                        <br>
                        Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<!-- Scripts -->
<script src="{{ asset('js/calendario.js') }}"></script>
</body>
</html>
