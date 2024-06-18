<div id="etapa_2" style="display:none">
    <div class="container mt-3">
        <h5><b>DATOS ORGANIZACIÓN o MIPYME</b></h5>
        <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
        <div class="container mt-5">
            <!-- Select with Tooltip -->
            <div class="mb-3">
                <label for="organizationType" class="form-label">
                    Elija tipo de organización o MIPYME
                    <span data-bs-toggle="tooltip" title="Aquí puedes elegir el tipo de organización o MIPYME.">
                    <i class="bi bi-question-circle"></i>
            </span>
                </label>
                <select class="form-select" id="organizationType" name="organizationType">
                    <option value="">Seleccione una opción</option>
                    <option value="organizacion">Organización</option>
                    <option value="mipyme">Micro, pequeña y mediana empresa (MIPYME)</option>
                </select>
            </div>
            <!-- Divs to Show/Hide -->
            <div id="organizacionDiv" class="d-none">
                <div class="card">
                    <div class="card-header"><b><u>{{ __('Nueva Organización') }}</u></b></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nombre_organizacion" class="col-md-12 col-form-label text-md-left">{{ __('1. Nombre Organización *') }}</label>
                            <div class="col-md-12">
                                <input id="nombre_organizacion" type="text" class="form-control @error('nombre_organizacion') is-invalid @enderror" name="nombre_organizacion" value="{{ old('nombre_organizacion') }}" required autocomplete="nombre_organizacion" autofocus>
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
                                <input id="rut_organizacion" type="text" class="form-control @error('rut_organizacion') is-invalid @enderror" name="rut_organizacion" value="{{ old('rut_organizacion') }}" required autocomplete="rut_organizacion" maxlength="12" onkeyup="formatRut(this)">
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
                                <input id="domicilio_organizacion" name="domicilio_organizacion" type="text" class="form-control @error('domicilio_organizacion') is-invalid @enderror" value="{{ old('domicilio_organizacion') }}" required autocomplete="domicilio_organizacion">
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
                                <input id="personalidad_juridica" name="personalidad_juridica" type="text" class="form-control @error('personalidad_juridica') is-invalid @enderror" value="{{ old('personalidad_juridica') }}" required autocomplete="personalidad_juridica">
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
                                <input id="antiguedad_anos" type="text" class="form-control @error('antiguedad_anos') is-invalid @enderror" name="antiguedad_anos" value="{{ old('antiguedad_anos') }}" required autocomplete="antiguedad_anos" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="3" onpaste="handlePaste(event)">
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
                                <input id="numero_socios" name="numero_socios" type="text" class="form-control @error('numero_socios') is-invalid @enderror" value="{{ old('numero_socios') }}" required autocomplete="numero_socios" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="4" onpaste="handlePaste(event)">
                                @error('numero_socios')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="certificado_pj" class="col-md-12 col-form-label text-md-left">7. Adjuntar certificado de personalidad jurídica* &nbsp;&nbsp;<br>&nbsp; &nbsp; (formato .pdf, .zip, .rar. Tamaño máximo 20 mb.)</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="certificado_pj" type="file" class="form-control @error('certificado_pj') is-invalid @enderror" name="certificado_pj" value="{{ old('certificado_pj') }}" required autocomplete="certificado_pj">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-12 text-md-right">
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
            <div id="mipymeDiv" class="d-none">
                <div class="card">
                    <div class="card-header"><b><u>{{ __('MIPYME') }}</u></b></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="razons_pyme" class="col-md-12 col-form-label text-md-left">{{ __('1. Razón social MIPYME *') }}</label>
                            <div class="col-md-12">
                                <input id="razons_pyme" type="text" class="form-control @error('razons_pyme') is-invalid @enderror" name="razons_pyme" value="{{ old('razons_pyme') }}">
                                @error('nombre_organizacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rut_pyme" class="col-md-12 col-form-label text-md-left">{{ __('2. RUT MIPYME *') }}</label>
                            <div class="col-md-12">
                                <input id="rut_pyme" type="text" class="form-control @error('rut_pyme') is-invalid @enderror" name="rut_pyme" value="{{ old('rut_pyme') }}" maxlength="12" onkeyup="formatRut(this)">
                                @error('rut_pyme')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="domicilio_pyme" class="col-md-12 col-form-label text-md-left">{{ __('3. Domicilio MIPYME *') }}</label>
                            <div class="col-md-12">
                                <input id="domicilio_pyme" name="domicilio_pyme" type="text" class="form-control @error('domicilio_pyme') is-invalid @enderror" value="{{ old('domicilio_pyme') }}" required autocomplete="domicilio_pyme">
                                @error('domicilio_pyme')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="certificado_sii" class="col-md-12 col-form-label text-md-left">4. Adjuntar certificado iniciación actividades (SII) * &nbsp;&nbsp;<br>&nbsp; &nbsp; (formato .pdf, .zip, .rar. Tamaño máximo 20 mb.)</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="certificado_sii" type="file" class="form-control @error('certificado_sii') is-invalid @enderror" name="certificado_sii" value="{{ old('certificado_sii') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="archivo_rsh" class="col-md-12 col-form-label text-md-left">5. Adjuntar ficha de registro social de hogares del representante legal de MIPYME * &nbsp;&nbsp;<br>&nbsp; &nbsp; (formato .pdf, .zip, .rar. Tamaño máximo 20 mb.)</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="archivo_rsh" type="file" class="form-control @error('archivo_rsh') is-invalid @enderror" name="archivo_rsh" value="{{ old('archivo_rsh') }}">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-12 text-md-right">
                                <button type="button" onclick="btn_volver(1)" class="btn btn-primary">
                                    {{ __('Anterior') }}
                                </button>
                                <button type="button" onclick="validarFrmProy(4)" class="btn btn-primary">
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
<script src="{{ asset('js/frm_select_org.js') }}?v={{ time() }}"></script>
