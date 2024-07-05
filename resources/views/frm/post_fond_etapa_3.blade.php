<div id="etapa_3" style="display:none">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header"><b><u>{{ __('  TIPO DE PROYECTO') }}</b></u></div>
            <div class="card-body">
               <div class="form-group row">
                  <label for="nombre_proyecto" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre Proyecto*') }}</label>
                  <div class="col-md-12">
                     <input id="nombre_proyecto" type="text" class="form-control" name="nombre_proyecto" value="{{ old('nombre_proyecto') }}" required autocomplete="nombre_proyecto" autofocus>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="tipo_proyecto" class="col-md-12 col-form-label text-md-left">{{ __('2. Tipo de proyecto *') }}
                     <span data-bs-toggle="tooltip" title="Seleccione el tipo de proyecto que desea realizar.">
                        <i class="bi bi-question-circle"></i>
                     </span>
                  </label>
                  <div class="col-md-12">
                        <div class="organizacionDiv d-none">
                         <select class="form-select" id="tipo_proyecto" name="tipo_proyecto">
                               <option value="">Seleccione</option>
                             <option value="Equipamiento para organizaciones">Equipamiento para organizaciones</option>
                             <option value="Mejoramiento infraestructura sedes y entorno comunitario">Mejoramiento infraestructura sedes y entorno comunitario</option>
                             <option value="Medio ambiente y cultura">Medio ambiente y cultura</option>
                         </select>
                     </div>

                     <div class="mipymeDiv d-none">
                         <select class="form-select" id="tipo_proyecto" name="tipo_proyecto">
                             <option value="Apoyo a emprendimientos y oficios en vías de formalización">Apoyo a emprendimientos y oficios en vías de formalización</option>
                         </select>
                     </div>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="fundamentacion" class="col-md-12 col-form-label text-md-left">{{ __('3. Fundamentación - Razones que motivan la calidad del proyecto') }}
                     <span data-bs-toggle="tooltip" title="Aquí puedes elegir el tipo ....">
                        <i class="bi bi-question-circle"></i>
                     </span>
                  </label>
                  <div class="col-md-12">
                     <textarea id="fundamentacion" type="text" class="form-control" name="fundamentacion" value="{{ old('fundamentacion') }}" required autocomplete="fundamentacion"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="descripcion_proyecto" class="col-md-12 col-form-label text-md-left">{{ __('4. Descripción del proyecto / Qué se va hacer*') }}</label>
                  <div class="col-md-12">
                     <textarea id="descripcion_proyecto" type="text" class="form-control" name="descripcion_proyecto" value="{{ old('descripcion_proyecto') }}" required autocomplete="descripcion_proyecto"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="objetivo_general" class="col-md-12 col-form-label text-md-left">{{ __('5. Objetivo general*') }}
                     <span data-bs-toggle="tooltip" title="Aquí puedes elegir el tipo ....">
                        <i class="bi bi-question-circle"></i>
                     </span>
                  </label>
                  <div class="col-md-12">
                     <textarea id="objetivo_general" type="text" class="form-control" name="objetivo_general" value="{{ old('objetivo_general') }}" required autocomplete="objetivo_general"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="objetivos_especificos" class="col-md-12 col-form-label text-md-left">{{ __('6. Objetivos Específicos*') }}
                     <span data-bs-toggle="tooltip" title="Aquí puedes elegir el tipo ....">
                        <i class="bi bi-question-circle"></i>
                     </span>
                  </label>
                  <div class="col-md-12">
                     <textarea id="objetivos_especificos" type="text" class="form-control" name="objetivos_especificos" value="{{ old('objetivos_especificos') }}" required autocomplete="objetivos_especificos"></textarea>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="cierre_proyecto" class="col-md-12 col-form-label text-md-left">{{ __('7. Lugar de cierre del proyecto*') }}</label>
                  <div class="col-md-12">
                     <input id="cierre_proyecto" type="text" class="form-control" name="cierre_proyecto" value="{{ old('cierre_proyecto') }}" required autocomplete="cierre_proyecto">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-12 col-form-label text-md-left">{{ __('8. Número de beneficiarios directos e indirectos *') }}</label>
                  <div class="col-md-2">
                     <label for="directos" class="col-form-label text-md-left">Directos
                        <span data-bs-toggle="tooltip" title="Aquí puedes elegir el tipo ....">
                           <i class="bi bi-question-circle"></i>
                        </span>
                     </label>
                  </div>
                  <div class="col-md-4">
                     <input id="directos" type="text" class="form-control" name="directos" value="{{ old('directos') }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="3" onpaste="handlePaste(event)">
                  </div>
                  <div class="col-md-2">
                     <label for="indirectos" class="col-form-label text-md-left">Indirectos
                        <span data-bs-toggle="tooltip" title="Aquí puedes elegir el tipo ....">
                           <i class="bi bi-question-circle"></i>
                        </span>
                     </label>
                  </div>
                  <div class="col-md-4">
                     <input id="indirectos" type="text" class="form-control" name="indirectos" value="{{ old('indirectos') }}" required autocomplete="indirectos" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="3" onpaste="handlePaste(event)">
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-12 col-form-label text-md-left">{{ __('9. Fecha de inicio / Fecha Término *') }}</label>
                  <label for="fecha_inicio" class="col-md-4 col-form-label text-md-left">{{ __('Fecha de inicio') }}</label>
                  <label for="fecha_termino" class="col-md-4 col-form-label text-md-left">{{ __('Fecha Término') }}</label>
                  <label for="cantidad_dias" class="col-md-4 col-form-label text-md-left">{{ __('Cantidad de días') }}</label>
                  <div class="col-md-4">
                     <input id="fecha_inicio" type="text" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio') }}" readonly>
                  </div>
                  <div class="col-md-4">
                     <input id="fecha_termino" type="text" class="form-control" name="fecha_termino" value="{{ old('fecha_termino') }}" readonly>
                  </div>
                  <div class="col-md-4">
                     <input id="cantidad_dias" type="text" class="form-control" name="cantidad_dias" value="{{ old('cantidad_dias') }}" required autocomplete="cantidad_dias" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="3" onpaste="handlePaste(event)" readonly>
                  </div>
                  <div class="col-md-12">
                      <div id="date-error" class="alert alert-danger" style="display:none;">La fecha de inicio debe ser anterior a la fecha de término.</div>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="col-md-12 col-form-label text-md-left">{{ __('10. Presupuesto:') }}</label>
                  <div class="form-group row">
                     <label for="rec_humanos" class="col-md-2 col-form-label text-md-left">{{ __('Recursos Humanos') }}</label>
                     <div class="col-md-10">
                        <input id="rec_humanos" type="text" class="miles form-control tot_presupuesto" name="rec_humanos" value="{{ old('rec_humanos') }}" autocomplete="rec_humanos" placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label for="mat_insumos" class="col-md-2 col-form-label text-md-left">{{ __('Materiales e Insumos') }}</label>
                     <div class="col-md-10">
                        <input id="mat_insumos" type="text" class="miles form-control tot_presupuesto" name="mat_insumos" value="{{ old('mat_insumos') }}" required autocomplete="mat_insumos" placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label for="otros" class="col-md-2 col-form-label text-md-left">{{ __('Otros') }}</label>
                     <div class="col-md-10">
                        <input id="otros" type="text" class="miles form-control tot_presupuesto" name="otros" value="{{ old('otros') }}" required autocomplete="otros" placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label for="tot_presupuesto" class="col-md-2 col-form-label text-md-left">{{ __('Total') }}</label>
                     <div class="col-md-10">
                        <input id="tot_presupuesto" type="text" class="miles form-control" name="tot_presupuesto" value="{{ old('tot_presupuesto') }}" autocomplete="tot_presupuesto" placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)" readonly>
                     </div>
                  </div>
               </div>
               
               <div class="form-group row">
                  <label class="col-md-12 col-form-label text-md-left">{{ __('11. Montos solicitados') }}</label>
                  <label class="col-md-2 col-form-label text-md-left">{{ __('Aporte solicitado') }}</label>
                  <div class="col-md-10">
                     <input id="aporte_solicitado" type="text" class="miles form-control sum_mont_sol" name="aporte_solicitado" value="{{ old('aporte_solicitado') }}" required autocomplete="aporte_solicitado" placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)">
                  </div>
               </div>

               <div class="form-group row">
                  <label for="aporte_terceros" class="col-md-2 col-form-label text-md-left">{{ __('Aporte de terceros') }}</label>
                  <div class="col-md-10">
                     <input id="aporte_terceros" type="text" class="miles form-control sum_mont_sol" name="aporte_terceros" value="{{ old('aporte_terceros') }}" required autocomplete="aporte_terceros" placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)">
                  </div>
               </div>

               <div class="form-group row">
                  <label for="aporte_propio" class="col-md-2 col-form-label text-md-left">{{ __('Aporte propio') }}</label>
                  <div class="col-md-10">
                     <input id="aporte_propio" type="text" class="miles form-control sum_mont_sol" name="aporte_propio" value="{{ old('aporte_propio') }}" required autocomplete="aporte_propio" placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)">
                  </div>
               </div>

               <div class="form-group row">
                  <label for="total" class="col-md-2 col-form-label text-md-left">{{ __('Total') }}</label>
                  <div class="col-md-10">
                     <input id="sum_mont_sol" type="text" class="miles form-control" name="sum_mont_sol" value="{{ old('total') }}" autocomplete="total" placeholder="$" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12" onpaste="handlePaste(event)" readonly>
                  </div>
               </div>

               <div class="form-group row">
                  <label for="archivo_anexo" class="col-md-12 col-form-label text-md-left">12. Cargar Anexo - Declaración jurada simple con firma del representante legal* &nbsp;&nbsp;<br>&nbsp; &nbsp; (formato .pdf, .zip, .rar. Tamaño máximo 20 mb.)</label>
               </div>

               <div class="form-group row">
                  <div class="col-md-12">
                     <input id="archivo_anexo" type="file" class="form-control" name="archivo_anexo" value="{{ old('archivo_anexo') }}" required autocomplete="archivo_anexo">
                  </div>
               </div>
               <br>
               <div class="form-group row">
                  <div class="col-md-12 text-md-right">
                     <button type="button" onclick="btn_volver(2)" class="btn btn-primary">
                        {{ __('Anterior') }}
                     </button>
                     <button type="button" onclick="validarFrmFondos(4)" class="btn btn-primary">
                        {{ __('Siguiente') }}
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/calendario.js') }}?v={{ time() }}"></script>
