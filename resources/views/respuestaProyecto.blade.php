@extends('layouts.app')

@section('content')
@if($acceso && ($pproy->estado === 2 || $pproy->estado === 3))
<section class="jumbotron">
  <div class="container">
     <div class="my-3 p-3 bg-white rounded shadow-sm">
     <div class="media pt-3">
        <h4>RESPUESTA APOYO PROYECTO POSTULACIÓN N°: {{ $pproy->id }}</h4>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">RESPUESTA:</strong>
        {{ $pproy->respuesta }}<p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">ESTADO:</strong>
        @if($pproy->estado==2)
            Aceptado
        @else
            Rechazado
        @endif<p>
    </div>
    <div class="media text-muted pt-3">
      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">ARCHIVO ADJUNTO:</strong>
        @if($pproy->archivo_respuesta)
      <a href="{{ asset('storage/archivos/' . $pproy->archivo_respuesta ) }}" download="{{ $pproy->archivo_respuesta }}">Descargar Adjunto</a>
      @else
      Sin archivo
      @endif 
      <p>
    </div>

    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button text-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Ver detalles Apoyo Proyecto postulado
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
              <h6 class="border-bottom border-gray pb-2 mb-0">Antecedentes generales</h6>

              @foreach([
                'Nombre' => $pproy->name,
                'Apellido paterno' => $pproy->apellido_paterno,
                'Apellido materno' => $pproy->apellido_materno,
                'RUT' => $pproy->rut,
                'Correo electrónico' => $pproy->email,
                'Teléfono' => $pproy->fono,
                'Comuna'  => $pproy->zona == 1 ? 'Taltal' : 'Cabildo',
                'Dirección' => $pproy->direccion,
                'Nacionalidad' => $pproy->nacionalidad,
                'Género' => $pproy->genero,
                'Pertenece a pueblo originario' => $pproy->pueblo_originario == 1 ? 'Sí' : 'No',
                'Discapacidad' => $pproy->discapacidad == 1 ? 'Sí' : 'No',
                'Fecha de nacimiento' => $pproy->fecha_nacimiento,
                'Actividad económica' => $pproy->actividad_economica,
    
                'Posee formación formal' => $pproy->formacion_formal == 1 ? 'Sí' : 'No',
                'Profesión' => $pproy->profesion,
                'Acepto cláusula de tratamiento de información personal' => "Aceptada",
              ] as $label => $value)
              <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">{{ $loop->iteration }}. {{ $label }}</strong>
                  {{ $value }}
                </p>
              </div>
              @endforeach
            </div>

            @if($pproy->tipo == "organizacion")
            <div class="my-3 p-3 bg-white rounded shadow-sm">
              <h6 class="border-bottom border-gray pb-2 mb-0">DATOS ORGANIZACIÓN</h6>
              @foreach([
                'Nombre organización' => $pproy->nombre_organizacion,
                'RUT organización' => $pproy->rut_organizacion,
                'Domicilio organización' => $pproy->domicilio_organizacion,
                'Antigüedad años' => $pproy->antiguedad_anos,
                'Número de socios' => $pproy->numero_socios
              ] as $label => $value)
              <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">{{ $loop->iteration }}. {{ $label }}</strong>
                  {{ $value }}
                </p>
              </div>
              @endforeach
              <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125">
                  <strong class="d-block text-gray-dark">6. Certificado de personalidad jurídica:</strong>
                  <div class="mb-3">
                    Descargar archivo:
                    <a href="{{ asset('storage/archivos/' . $pproy->certificado_pj) }}" download>{{ $pproy->certificado_pj }}</a>
                  </div>
                </p>
              </div>
            </div>
            @endif

            @if($pproy->tipo == "mipyme")
            <div class="my-3 p-3 bg-white rounded shadow-sm">
              <h6 class="border-bottom border-gray pb-2 mb-0">DATOS MIPYME (Micro, pequeña y mediana empresa)</h6>
              @foreach([
                'Razón social MIPYME' => $pproy->razons_pyme,
                'RUT MIPYME' => $pproy->rut_pyme,
                'Domicilio MIPYME' => $pproy->domicilio_pyme
              ] as $label => $value)
              <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">{{ $loop->iteration }}. {{ $label }}</strong>
                  {{ $value }}
                </p>
              </div>
              @endforeach
              @foreach([
                'Certificado iniciación actividades (SII)' => $pproy->certificado_sii,
                'Ficha de registro social de hogares del representante legal de MIPYME' => $pproy->archivo_rsh
              ] as $label => $value)
              <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125">
                  <strong class="d-block text-gray-dark">{{ $loop->iteration + 3 }}. {{ $label }}</strong>
                  <div class="mb-3">
                    Descargar archivo:
                    <a href="{{ asset('storage/archivos/' . $value) }}" download>{{ $value }}</a>
                  </div>
                </p>
              </div>
              @endforeach
            </div>
            @endif

            <div class="my-3 p-3 bg-white rounded shadow-sm">
              <h6 class="border-bottom border-gray pb-2 mb-0">TIPO DE PROYECTO</h6>
              @foreach([
                'Nombre proyecto' => $pproy->nombre_proyecto,
                'Temática' => $pproy->tipo_proyecto,
                'Lugar ejecución proyecto' => $pproy->lugar_proyecto,
                'Número beneficiarios directos e indirectos' => 'Directos: ' . $pproy->directos . ' Indirectos: ' . $pproy->indirectos,
                'Montos del proyecto' => 'Aporte solicitado: $' . $pproy->aporte_solicitado,
                'Minera Las Cenizas tiene el derecho de tomar fotografías y hacer visitas del proyecto. Además, instalar placa conmemorativa.' => 'Aceptada'
              ] as $label => $value)
              <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                  <strong class="d-block text-gray-dark">{{ $loop->iteration }}. {{ $label }}</strong>
                  {{ $value }}
                </p>
              </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@else
<div class="container text-center">
  <h1>No tiene acceso a esta página</h1>
</div>
@endif
@endsection
