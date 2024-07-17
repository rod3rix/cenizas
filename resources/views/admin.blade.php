@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
        <div class="container">
          <h3>PANEL DE ADMINISTRACIÓN</h3>
          <p>
            <a href="{{ route('usuariosRegistrados') }}" class="btn btn-secondary my-3">VER USUARIOS</a>
            <a href="{{ route('verPostulacionesFondos') }}" class="btn btn-secondary my-3">VER POSTULACIONES FONDOS CONCURSABLES</a>
            <a href="{{ route('verPostulacionesProyectos') }}" class="btn btn-secondary my-3">VER POSTULACIONES APOYO PROYECTOS</a>
            <a href="{{ route('verSugerenciaReclamo') }}" class="btn btn-secondary my-3">VER CASOS</a>
          </p>
        </div>
@if(auth::user()->rol=="1")
<div class="container mt-5">
        <!-- Div para mostrar el mensaje de estado -->
        <div id="statusMessage" class="alert alert-success d-none" role="alert"></div>
        <!-- Primer acordeón -->
        <div class="accordion" id="accordionOne">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Ingresar Usuarios Administradores
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                    <div class="accordion-body">
                        <!-- Aquí puedes agregar el contenido de la sección de administración de usuarios -->
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <!-- Contenido del primer acordeón -->
                                            <form method="POST" id="frm1" name="frm1">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre:') }}</label>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno:') }}</label>
                                            <div class="col-md-8">
                                                <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ old('apellido_paterno') }}" autocomplete="apellido_paterno">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="apellido_materno" class="col-md-4 col-form-label text-md-end">{{ __('Apellido Materno:') }}</label>
                                            <div class="col-md-8">
                                                <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="{{ old('apellido_materno') }}" autocomplete="apellido_materno">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT:') }}</label>
                                            <div class="col-md-8">
                                                <input id="rut" type="text" class="form-control" name="rut" value="{{ old('rut') }}" autocomplete="name" maxlength="12" onkeyup="formatRut(this)">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email:') }}</label>
                                            <div class="col-md-8">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono:') }}</label>
                                            <div class="col-md-8">
                                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" autocomplete="name" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="zona" class="col-md-4 col-form-label text-md-end">{{ __('Zona:') }}</label>
                                            <div class="col-md-8">
                                                <select id="zona" class="form-control" name="zona">
                                                    <option value="">{{ __('Seleccione') }}</option>
                                                    <option value="1">{{ __('Cabildo') }}</option>
                                                    <option value="2">{{ __('Taltal') }}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña:') }}</label>
                                            <div class="col-md-8">
                                                <input id="password" type="text" class="form-control" name="password" autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="button" class="btn btn-primary" onclick="enviarFormulario('frm1')">
                                                    {{ __('Registrar Usuario') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                        Editar Usuarios Administradores
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                    <div class="accordion-body">
                        <!-- Aquí puedes agregar el contenido de la sección de edición de usuarios administradores -->
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div  class="container">          
                                        <h5><b>Listado de Usuarios Administradores</b></h5>
                                              <table id="registros" class="table table-striped table-bordered" style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th>ID</th>
                                                          <th>NOMBRE</th>
                                                          <th>APELLIDO</th>
                                                          <th>RUT</th>
                                                          <th>ACCION</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <!-- Aquí se agregarán dinámicamente los datos -->
                                                  </tbody>
                                              </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="userModalLabel">Editar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="userForm">
              @csrf
              <input type="hidden" id="userId" name="id">
              <div class="mb-3 row">
                <label for="modalUserName" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modalUserName" name="modalUserName">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="modalUserApellidoPaterno" class="col-sm-4 col-form-label">Apellido Paterno</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modalUserApellidoPaterno" name="modalUserApellidoPaterno">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="modalUserApellidoMaterno" class="col-sm-4 col-form-label">Apellido Materno</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modalUserApellidoMaterno" name="modalUserApellidoMaterno">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="modalUserRut" class="col-sm-4 col-form-label">RUT</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modalUserRut" name="modalUserRut" onkeyup="formatRut(this)">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="modalUserEmail" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="modalUserEmail" name="modalUserEmail">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="modalUserTelefono" class="col-sm-4 col-form-label">Teléfono</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modalUserTelefono" name="modalUserTelefono" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="12">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="modalUserZona" class="col-sm-4 col-form-label">Zona</label>
                <div class="col-sm-8">
                  <select class="form-select" id="modalUserZona" name="modalUserZona">
                    <option value="1">Taltal</option>
                    <option value="2">Cabildo</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="modalUserPassword" class="col-sm-4 col-form-label">Contraseña</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modalUserPassword" name="modalUserPassword">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<script>
    const appConfig = {dataTablesLangUrl:
    "{{ asset('lang/datatables/Spanish.json') }}"};
</script>
<script src="{{ asset('js/format_rut.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/frm_sadmin.js') }}?v={{ time() }}"></script>
@endif
</section>
@endsection
