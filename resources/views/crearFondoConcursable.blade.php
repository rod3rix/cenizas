@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h3><b>Creación de Fondos Concursables</b></h3>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content.</p>
    </div>
    <div class="container mt-5">
        <div id="mensajeExito" class="alert alert-success" style="display: none;">
        </div>
        <!-- Primer acordeón independiente -->
        <div class="accordion" id="accordionOne">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Crear Fondo Concursable
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                    <div class="accordion-body">
                        <div class="container mt-5">
                            <form method="POST" id="frm2" name="frm2">
                                @csrf
                                <div class="row mb-3">
                                    <label for="nombre_fondo" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del Fondo:') }}</label>
                                    <div class="col-md-6">
                                        <input id="nombre_fondo" type="text" class="form-control" name="nombre_fondo" value="{{ old('nombre_fondo') }}" autocomplete="nombre_fondo" >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción:') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="descripcion" class="form-control" name="descripcion" autocomplete="descripcion">{{ old('descripcion') }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="zona" class="col-md-4 col-form-label text-md-end">{{ __('Comuna:') }}</label>
                                    <div class="col-md-6">
                                        <select id="zona" class="form-control" name="zona">
                                        <option value="">{{ __('Seleccione') }}</option>
                                        <option value="1" @if(old('zona') == '1') selected @endif>{{ __('Taltal') }}</option>
                                        <option value="2" @if(old('zona') == '2') selected @endif>{{ __('Cabildo') }}</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fecha_inicio" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Inicio:') }}</label>
                                    <div class="col-md-6">
                                        <input id="fecha_inicio" type="text" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio') }}" autocomplete="fecha_inicio" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fecha_termino" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Término:') }}</label>
                                    <div class="col-md-6">
                                        <input id="fecha_termino" type="text" class="form-control" name="fecha_termino" value="{{ old('fecha_termino') }}" autocomplete="fecha_termino" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado:') }}</label>
                                    <div class="col-md-6">
                                        <select id="estado" class="form-control" name="estado">
                                            <option value="">{{ __('Seleccione') }}</option>
                                            <option value="1" @if(old('estado') == '1') selected @endif>{{ __('Activo') }}</option>
                                            <option value="2" @if(old('estado') == '2') selected @endif>{{ __('Inactivo') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="button" class="btn btn-primary" onclick="enviarFormulario('frm2')">
                                            {{ __('Crear Fondo Concursable') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Segundo acordeón independiente -->
        <div class="accordion" id="accordionTwo">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Editar Fondo Concursable
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                    <div class="accordion-body">
                        <div class="container">
                            <table id="registros" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre del Fondo</th>
                                        <th>Comuna</th>
                                        <th>Fecha de Inicio</th>
                                        <th>Fecha de Término</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Los datos se cargarán dinámicamente aquí -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Modal de Edición -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Modal -->
<div class="modal fade" id="editarFondoModal" tabindex="-1" aria-labelledby="editarFondoModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarFondoModalLabel">Editar Fondo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="frmUpdate" name="frmUpdate" enctype="multipart/form-data">
                    @csrf
                    <input id="url" name="url" value="updateAFondo" type="hidden">
                    <input type="hidden" id="fondo_id" name="fondo_id" value="">
                    <div class="mb-3">
                        <label for="nombre_fondo_edit" class="form-label">Nombre del Fondo:</label>
                        <input type="text" class="form-control" id="nombre_fondo_edit" name="nombre_fondo_edit">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_edit" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion_edit" name="descripcion_edit"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="comuna_edit" class="form-label">Comuna:</label>
                        <select id="zona_edit" class="form-control" name="zona_edit">
                            <option value="">{{ __('Seleccione') }}</option>
                            <option value="1" @if(old('zona_edit') == '1') selected @endif>{{ __('Taltal') }}</option>
                            <option value="2" @if(old('zona_edit') == '2') selected @endif>{{ __('Cabildo') }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_inicio_edit" class="form-label">
                        Fecha de Inicio:</label>
                        <input type="text" class="form-control" id="fecha_inicio_edit" name="fecha_inicio_edit" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_termino_edit" class="form-label">Fecha de Término:</label>
                        <input type="text" class="form-control" id="fecha_termino_edit" name="fecha_termino_edit" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="estado_edit" class="form-label">Estado:</label>
                        <select id="estado_edit" class="form-control" name="estado_edit">
                            <option value="">{{ __('Seleccione') }}</option>
                            <option value="1" @if(old('estado') == '1') selected @endif>{{ __('Activo') }}</option>
                            <option value="2" @if(old('estado') == '2') selected @endif>{{ __('Inactivo') }}</option>
                        </select>
                    </div>
                    <button id="actualizarFondo" name="actualizarFondo" type="button" class="btn btn-primary">Actualizar Fondo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const appConfig = {dataTablesLangUrl:
    "{{ asset('lang/datatables/Spanish.json') }}"};
</script>
<script src="{{ asset('js/calendario.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/frm_fondos.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/frm_update.js') }}?v={{ time() }}"></script>
@endsection
