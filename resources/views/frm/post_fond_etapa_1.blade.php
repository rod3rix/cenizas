<div id="etapa_1" style="display:none">
   <div class="row justify-content-center">
          <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('FONDOS CONCURSABLES DISPONIBLES') }}</b></u></div>
            <div class="card-body">
                  <div class="form-group row">
                     <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('Fondos Disponibles *') }}</label>
                     <div class="col-md-12">
                        <select id="id_fondo_concursable" name="id_fondo_concursable" class="form-control" autofocus >
                         <option value="">Seleccione Fondo a postular</option>
                         @foreach($listarFondos as $fondo)
                             <option value="{{ $fondo->id }}">{{ $fondo->nombre_fondo }}</option>
                         @endforeach
                        </select>
                     </div>
                  </div> 
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('ANTECEDENTES GENERALES') }}</b></u></div>
            <div class="card-body">
                  <div class="form-group row">
                     <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre *') }}</label>
                     <div class="col-md-12">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="apellido_paterno" class="col-md-12 col-form-label text-md-left">{{ __('2. Apellido Paterno *') }}</label>
                     <div class="col-md-12">
                        <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ $user->apellido_paterno }}" required autocomplete="apellido_paterno"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="apellido_materno" class="col-md-12 col-form-label text-md-left">{{ __('3. Apellido Materno *') }}</label>
                     <div class="col-md-12">
                        <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="{{ $user->apellido_materno }}" required autocomplete="apellido_materno"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="rut" class="col-md-12 col-form-label text-md-left">{{ __('4. RUT*') }}</label>
                     <div class="col-md-12">
                        <input id="rut" type="text" class="form-control" name="rut" value="{{ $user->rut }}" required autocomplete="rut"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('5. Correo Electrónico *') }}</label>
                     <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                     <label for="fono" class="col-md-12 col-form-label text-md-left">{{ __('6. Teléfono *') }}</label>
                     <div class="col-md-12">
                        <input id="fono" type="text" class="form-control" name="fono" value="{{ $user->fono }}" required autocomplete="fono"  disabled>
                     </div>
                  </div>
                  <div class="form-group row">
                        <label for="localidad" class="col-md-12 col-form-label text-md-left">{{ __('7. Comuna') }}</label>
                     <div class="col-md-12">
                        <input type="text" class="form-control" value="{{ $user->zona == 1 ? 'Taltal' : 'Cabildo' }}" disabled>
                     </div>
                  </div>
                  
                  <div class="form-group row">
                     <label for="direccion" class="col-md-12 col-form-label text-md-left">{{ __('8. Dirección *') }}</label>
                     <div class="col-md-12">
                        <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" autocomplete="direccion" >
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="nacionalidad" class="col-md-12 col-form-label text-md-left">{{ __('9. Nacionalidad *') }}</label>
                     <div class="col-md-12">
                        <select id="nacionalidad" name="nacionalidad" type="text" class="form-control">
                           <option value="">Seleccione</option>
                           <option value="Chilena">Chilena</option>
                           <option value="Extranjera">Extranjera</option>
                           <option value="Otra">Otra</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="genero" class="col-md-12 col-form-label text-md-left">{{ __('10. Genero *') }}</label>
                     <div class="col-md-12">
                        <select id="genero" name="genero" type="text" class="form-control">
                           <option value="">Seleccione</option>
                           <option value="Femenino">Femenino</option>
                           <option value="Masculino">Masculino</option>
                           <option value="Otro">Otro</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-12 col-form-label text-md-left">{{ __('11. Pertenece a pueblo originario *') }}</label>
                     <div class="col-md-12" id="v_pueblo_originario">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" id="pueblo_originario_si" name="pueblo_originario" type="radio" value="1">
                          <label class="form-check-label" for="pueblo_originario_si">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" id="pueblo_originario_no" name="pueblo_originario" type="radio"  value="0">
                          <label class="form-check-label" for="pueblo_originario_no">No</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-12 col-form-label text-md-left">{{ __('12. Discapacidad *') }}</label>
                     <div class="col-md-12" id="v_discapacidad">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="discapacidad_si" name="discapacidad" value="1">
                          <label class="form-check-label" for="discapacidad_si">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="discapacidad_no" name="discapacidad" value="0">
                          <label class="form-check-label" for="discapacidad_no">No</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="fecha_nacimiento" class="col-md-12 col-form-label text-md-left">{{ __('13. Fecha nacimiento *') }}</label>
                     <div class="col-md-6">
                        <input id="fecha_nacimiento" type="text" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required autocomplete="fecha_nacimiento"  readonly>
                     </div>  
                  </div>
                  <div class="form-group row">
                     <label for="actividad_economica" class="col-md-12 col-form-label text-md-left">{{ __('14. Actividad económica *') }}</label>
                     <div class="col-md-12">
                      <select id="actividad_economica" class="form-control" name="actividad_economica" required>
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
                     </div>
                  </div>
                  <div class="form-group row" id="otra_especificar_container" style="display: none;">
                   <label for="otra_especificar" class="col-md-12 col-form-label text-md-left">{{ __('Especifique:') }}</label>
                   <div class="col-md-12">
                       <input type="text" id="otra_especificar" name="otra_especificar" class="form-control" value="{{ old('otra_especificar', '') }}">
                   </div>
                  </div>
                  <div class="form-group row">
                     <label for="formacion_formal" class="col-md-12 col-form-label text-md-left">{{ __('15. Posee formación formal *') }}</label>
                     <div class="col-md-12" id="v_formacion_formal">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="formacion_formal_si" name="formacion_formal" value="1">
                          <label class="form-check-label" for="formacion_formal_si">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" id="formacion_formal_no" name="formacion_formal" value="0">
                          <label class="form-check-label" for="formacion_formal_no">No</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                   <label for="profesion" class="col-md-12 col-form-label text-md-left">{{ __('16. Nivel Educacional *') }}</label>
                   <div class="col-md-12">
                       <select id="profesion" class="form-control" name="profesion" required>
                           <option value="">Seleccione una opción</option>
                           <option value="Educación Básica incompleta" {{ old('profesion') == 'Educación Básica incompleta' ? 'selected' : '' }}>Educación Básica incompleta</option>      
                           <option value="Educación Básica completa" {{ old('profesion') == 'Educación Básica completa' ? 'selected' : '' }}>Educación Básica completa</option>
                           <!-- <option value="Educación Básica" {{ old('profesion') == 'Educación Básica' ? 'selected' : '' }}>Educación Básica</option> -->
                           <option value="Educación media" {{ old('profesion') == 'Educación media' ? 'selected' : '' }}>Educación media</option>
                           <option value="Técnico" {{ old('profesion') == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                           <option value="Universitario" {{ old('profesion') == 'Universitario' ? 'selected' : '' }}>Universitario</option>
                           <option value="Postgrado" {{ old('profesion') == 'Postgrado' ? 'selected' : '' }}>Postgrado</option>
                       </select>
                   </div>
               </div>

               <div class="form-group row">
                <div class="col-md-12" id="v_clausula">
                    <label for="formacion_formal" class="col-form-label text-md-left">
                        {{ __('17.') }}
                    </label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label" for="formacion_formal_checkbox">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#clausulaModal">Acepto cláusula de tratamiento de información personal * </a>
                        </label>
                        <input class="form-check-input" type="checkbox" id="acepto_clausula" name="acepto_clausula" value="1">
                    </div>
                    <br>
                     <div>
                            <span>Marcar casilla para aceptar la formación formal.</span>
                     </div>
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
                    <h5 class="modal-title" id="clausulaModalLabel">Cláusula de tratamiento de información personal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <ol class="termscond">
        <li><strong>Objeto:</strong> La presente cláusula regula el tratamiento de la información personal proporcionada por los participantes en el marco de la postulación a los fondos concursables abiertos a la comunidad organizados por Grupo Minera Las Cenizas.</li>
        <li><strong>Finalidad del Tratamiento:</strong> Los datos personales recopilados serán utilizados exclusivamente para gestionar y evaluar las postulaciones a los fondos concursables, así como para comunicarse con los participantes en relación a sus solicitudes y los resultados del concurso.</li>
        <li><strong>Tipo de Datos:</strong> La información solicitada incluye, pero no se limita a, nombres, direcciones, números de contacto, correos electrónicos, y cualquier otra información pertinente para la evaluación de la postulación.</li>
        <li><strong>Confidencialidad y Seguridad:</strong> Grupo Minera Las Cenizas se compromete a mantener la confidencialidad de los datos personales proporcionados, implementando medidas de seguridad adecuadas para proteger dicha información contra accesos no autorizados, pérdidas, o alteraciones.</li>
        <li><strong>Acceso y Rectificación:</strong> Los participantes tienen derecho a acceder, rectificar, y actualizar sus datos personales en cualquier momento. Para ejercer estos derechos, deberán ponerse en contacto con el área de comunidades de Grupo Minera Las Cenizas.</li>
        <li><strong>Conservación de Datos:</strong> Los datos personales serán conservados durante el tiempo necesario para cumplir con las finalidades mencionadas, y posteriormente serán eliminados de acuerdo con las políticas de retención de datos de Grupo Minera Las Cenizas.</li>
        <li><strong>Consentimiento:</strong> Al participar en el proceso de postulación a los fondos concursables, los participantes consienten explícitamente el tratamiento de sus datos personales conforme a lo establecido en la presente cláusula.</li>
        <li><strong>Transferencia de Datos:</strong> Grupo Minera Las Cenizas no transferirá los datos personales a terceros sin el consentimiento previo y expreso de los participantes, salvo en los casos en que sea requerido por ley.</li>
        <li><strong>Modificaciones:</strong> Grupo Minera Las Cenizas se reserva el derecho a modificar la presente cláusula en cualquier momento. Cualquier cambio será comunicado oportunamente a los participantes.</li>
      </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<!-- Scripts -->
<script src="{{ asset('js/calendario.js') }}?v={{ time() }}"></script>
</body>
</html>
