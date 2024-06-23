<div id="etapa_3" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('  TIPO PROYECTO') }}</b></u></div>
            <div class="card-body">
                  <div class="form-group row">
                     <label for="nombre_proyecto" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre Proyecto *') }}</label>
                     <div class="col-md-12">
                        <input id="nombre_proyecto" name="nombre_proyecto" type="text" class="form-control"  value="{{ old('nombre_proyecto') }}" autocomplete="nombre_proyecto" autofocus>
                     </div>
                  </div>
                  <div class="form-group row">
                     <!-- <label for="tipo_proyecto" class="col-md-12 col-form-label text-md-left">{{ __('2. Tipo de proyecto *') }}</label> -->
                     <label for="tipo_proyecto" class="col-md-12 col-form-label text-md-left">{{ __('2. Temática *') }}<span data-bs-toggle="tooltip" title="Aquí puedes elegir Temática.">
                    <i class="bi bi-question-circle"></i></span></label>
                     <div class="col-md-12">
                        <select id="tipo_proyecto" class="form-control" name="tipo_proyecto" required autocomplete="tipo_proyecto" >
                           <option value="">Seleccione</option>
                           <!-- <option value="Apoyo a emprendimientos y oficios en vías de formalización">Apoyo a emprendimientos y oficios en vías de formalización</option>
                           <option value="Equipamiento para organizaciones">Equipamiento para organizaciones</option>
                           <option value="Mejoramiento infraestructura sedes y entorno comunitario">Mejoramiento infraestructura sedes y entorno comunitario</option>
                           <option value="Medio ambiente y cultura">Medio ambiente y cultura</option> -->
                           <option value="Animalismo">Animalismo</option>
                           <option value="Cultura y Patrimonio">Cultura y Patrimonio</option>
                           <option value="Deporte y Recreación">Deporte y Recreación</option>
                           <option value="Desarrollo Económico">Desarrollo Económico</option>
                           <option value="Educación">Educación</option>
                           <option value="Inclusión">Inclusión</option>
                           <option value="Infra. y Equip. Comunitario">Infra. y Equip. Comunitario</option>
                           <option value="Medioambiente">Medioambiente</option>
                           <option value="Salud">Salud</option>
                           <option value="Voluntariado">Voluntariado</option>
                           <option value="Otra">Otra</option>
                       </select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="lugar_proyecto" class="col-md-12 col-form-label text-md-left">{{ __('3. Lugar de ejecución del proyecto*') }}<span data-bs-toggle="tooltip" title="Aquí puedes elegir ....">
                    <i class="bi bi-question-circle"></i></span></label>
                     <div class="col-md-12">
                        <textarea id="lugar_proyecto" name="lugar_proyecto" type="text" class="form-control" name="lugar_proyecto" value="{{ old('lugar_proyecto') }}" required autocomplete="lugar_proyecto" ></textarea>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-12 col-form-label text-md-left">{{ __('4. Número beneficiarios directos e indirectos *') }}</label>
                      <label for="directos" class="col-md-2 col-form-label text-md-left">{{ __('Directos') }}<span data-bs-toggle="tooltip" title="Aquí puedes elegir ....">
                      <i class="bi bi-question-circle"></i></span></label>
                      <div class="col-md-2">
                        <input id="directos" type="text" class="form-control" name="directos" value="{{ old('directos') }}" required autocomplete="directos"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="3" onpaste="handlePaste(event)">
                     </div>
                      <label for="indirectos" class="col-md-2 col-form-label text-md-left">{{ __('Indirectos') }}<span data-bs-toggle="tooltip" title="Aquí puedes elegir ....">
                    <i class="bi bi-question-circle"></i></span></label>
                     <div class="col-md-2">
                        <input id="indirectos" type="text" class="form-control" name="indirectos" value="{{ old('indirectos') }}" required autocomplete="indirectos"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="3" onpaste="handlePaste(event)">
                     </div>     
                  </div>
                  <hr>
                  <div class="form-group row">
                     <label for="aporte_solicitado" class="col-md-12 col-form-label text-md-left">{{ __('5.  Montos del proyecto *') }}</label>
                     <label for="aporte_solicitado" class="col-md-2 col-form-label text-md-left">{{ __('Aporte solicitado') }}</label>
                      <div class="col-md-4">
                        <input id="aporte_solicitado" type="text" class="miles form-control" name="aporte_solicitado" value="{{ old('aporte_solicitado') }}" required autocomplete="aporte_solicitado"  placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)">
                     </div>
                  </div>
                  <hr>
                  <div class="form-group row">
                     <div class="col-md-12">
                        <div class="form-check form-check-inline">
                           <label class="form-check-label" for="acepto_clausula_proy">6. Minera Las Cenizas tiene el derecho de tomar fotografías y hacer visitas del proyecto. Además, instalar placa conmemorativa *<br>Marcar casilla para aceptar cláusula</label>
                          <input class="form-check-input" type="checkbox" id="acepto_clausula_proy" name="acepto_clausula_proy" value="1">
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="form-group row">
                     <div class="col-md-12  text-md-right">
                         <button type="button" onclick="btn_volver(2)" class="btn btn-primary">
                        {{ __('Anterior') }}
                        </button>
                         <button type="button" onclick="validarFrmProy(3)" class="btn btn-primary">
                           {{ __('Siguiente') }}
                        </button>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>