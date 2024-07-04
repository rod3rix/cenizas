@extends('layouts.app')
@section('content')
@if($acceso)
<section class="jumbotron">
    <div class="container ">
        <h1 class="jumbotron-heading text-center"><b>Usuario Registrado</b></h1>
        <!-- <p class="lead text-muted text-center">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p> -->
        
        <!-- Información de Usuario -->
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h4 class="border-bottom border-gray pb-2 mb-0">USUARIO ID</h4>
            <h6 class="border-bottom border-gray pb-2 mb-0">Antecedentes generales</h6>
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">1. Nombre</strong>
                    {{ $user->name}}
                </p>
            </div>
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">2. Apellido paterno</strong>
                    {{ $user->apellido_paterno }}
                </p>
            </div>
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">3. Apellido materno</strong>
                    {{ $user->apellido_materno }}
                </p>
            </div>
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">4. RUT</strong>
                    {{ $user->rut }}
                </p>
            </div>
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">5. Correo electrónico</strong>
                    {{ $user->email }}
                </p>
            </div>
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">6. Teléfono</strong>
                    {{ $user->fono }}
                </p>
            </div>
        </div>

        <!-- Postulaciones Enviadas -->
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">POSTULACIONES ENVIADAS - SUGERENCIAS/RECLAMOS</h6>
            <div class="media text-muted pt-3">
                <div class="accordion" id="accordionOne">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Fondos Concursables
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
                            <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th class="col-4">Nombre</th>
                                                            <th class="col-4">Fecha</th>
                                                            <th class="col-4">Estado</th>
                                                            <th class="col-4">Actividad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($pfondos as $fondo)
                                                        <tr>
                                                            <td class="col-4">{{ $fondo->nombre_fondo }}</td>
                                                            <td class="col-4">{{ $fondo->created_at }}</td>
                                                            <td class="col-4">{{ $fondo->estado }}</td>
                                                            <td class="col-4">{!! $fondo->resolucion !!}</td>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion" id="accordionTwo">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Apoyo Proyectos
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                            <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th class="col-4">Nombre</th>
                                                            <th class="col-4">Fecha</th>
                                                            <th class="col-4">Estado</th>
                                                            <th class="col-4">Actividad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($pproy as $proy)
                                                        <tr>
                                                            <td class="col-4">{{ $proy->nombre_proyecto }}</td>
                                                            <td class="col-4">{{ $proy->created_at }}</td>
                                                            <td class="col-4">{{ $proy->estado }}</td>
                                                            <td class="col-4">{!! $proy->respuesta !!}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion" id="accordionThree">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed text-center-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Sugerencias/reclamos
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionThree">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th class="col-4" >Tipo</th>
                                                            <th class="col-4">Fecha</th>
                                                            <th class="col-4">Estado</th>
                                                            <th class="col-4">Actividad</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($casos as $caso)
                                                        <tr>
                                                            <td class="col-4">{{ $caso->tipo }}</td>
                                                            <td class="col-4">{{ $caso->created_at }}</td>
                                                            <td class="col-4">{{ $caso->estado }}</td>
                                                            <td class="col-4">{!! $caso->respuesta !!}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Asignar Influencia, Vecindad, Afinidad MLC -->
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0 text-center">ASIGNAR INFLUENCIA, VECINDAD, AFINIDAD MLC</h6>
            <form method="POST" id="frmGuardarPuntaje" name="frmGuardarPuntaje">
                @csrf
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="influencia" class="col-sm-2 col-form-label">Influencia:</label>
                        <select class="form-control" id="influencia" name="influencia">
                            <option value="">Seleccione</option>
                            @for ($i = 0; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $user->influencia == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <label for="vecindad" class="col-sm-2 col-form-label">Vecindad:</label>
                        <select class="form-control" id="vecindad" name="vecindad">
                            <option value="">Seleccione</option>
                            @for ($i = 0; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $user->vecindad == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <label for="vecindad_mlc" class="col-sm-6 col-form-label">Afinidad MLC:</label>
                        <select class="form-control" id="vecindad_mlc" name="vecindad_mlc">
                            <option value="">Seleccione</option>
                            @for ($i = 0; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $user->vecindad_mlc == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col">
                        <label for="poder" class="col-sm-2 col-form-label">Poder:</label>
                        <select class="form-control" id="poder" name="poder">
                            <option value="">Seleccione</option>
                            @for ($i = 0; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $user->poder == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Asignar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="{{ asset('js/frm_guardar_puntaje.js') }}?v={{ time() }}"></script>
@else
<div class="container text-center">
    <h1>No tiene acceso a esta página</h1>
</div>
@endif
@endsection
