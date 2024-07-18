<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GRUPO MINERO LAS CENIZAS</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">

    <!-- Estilos de Bootstrap 5.3.3 -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-directional-buttons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/datepicker-es.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>    
    <script src="{{ asset('js/dataTables.js') }}"></script>    
    <script src="{{ asset('js/dataTables.bootstrap5.js') }}"></script>    
    <script src="{{ asset('js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('js/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
</head>

<body class="">
    <div id="app">
        <div class="container zheader">
             
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
      <div class="col-md-3 mb-2 mb-md-0">
        <!-- <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none"> -->
          <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'GRUPO MINERO LAS CENIZAS') }} 
                     -->
                     <img src="{{ asset('images/logo-cenizas.svg') }}" alt="GRUPO MINERO LAS CENIZAS">
          </a>
        <!-- </a> -->
      </div>

    @guest
    @else
    @if(auth::user()->type=="user")
    <nav class="navbar navbar-expand-lg ms-auto" aria-label="Offcanvas navbar large">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
          <div class="offcanvas-header">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ url('/') }}">Inicio</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fondos Concursables</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('postularFondos') }}">Postular Fondos Concursables</a></li>
                  <li><a class="dropdown-item" href="{{ route('seguimientoFondos') }}">Ver Estado Postulaciones</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Apoyo proyectos</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('postularProyectos') }}">Postular Proyectos</a></li>
                  <li><a class="dropdown-item" href="{{ route('seguimientoProyectos') }}">Ver Estado Postulaciones</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sugerencias / Reclamos</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('enviarCaso') }}">Ingresar Caso</a></li>
                  <li><a class="dropdown-item" href="{{ route('seguimientoCasosUsu') }}">Ver estado del caso</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
      @endif

      @if(auth::user()->type=="admin")
      <nav class="navbar navbar-expand-lg ms-auto" aria-label="Offcanvas navbar large">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ url('/') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('usuariosRegistrados') }}" data-bs-toggle="" aria-expanded="false">Usuarios</a></li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fondos Concursables</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('verPostulacionesFondos') }}">Ver Postulaciones</a></li>
                    <li><a class="dropdown-item" href="{{ route('listarFondosConcursables') }}">Ver fondos concursables</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link " href="{{ route('verPostulacionesProyectos') }}" data-bs-toggle="" aria-expanded="false">Apoyo proyectos</a</li>
                <li class="nav-item"><a class="nav-link" href="{{ route('verSugerenciaReclamo') }}" data-bs-toggle="" aria-expanded="false">Sugerencias / Reclamo</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      @endif
      @endguest

      
        @guest
        <div class="col-md-3 text-end">
        @if (Route::has('login'))
            <a class="btn btn-outline-primary me-2 btn-login" href="{{ route('login') }}">{{ __('Entrar') }}</a>
        @endif

        @if (Route::has('register'))
            <a class="btn btn-primary btn-register" href="{{ route('register') }}">{{ __('Registrar') }}</a>
        @endif
        </div>
        @else
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(auth::user()->type=="admin")
                                    <a class="dropdown-item" href="{{ route('verPerfil') }}">
                                        {{ __('Ver Perfil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('cambiarPassAdmin') }}">
                                        {{ __('Cambiar contraseña') }}
                                    </a>
                                        @if(auth::user()->rol=="1")
                                        <button class="dropdown-item" id="cambiarComunaButton">
                                            {{ __('Cambiar Comuna') }}
                                        </button>
                                        @endif
                                    @endif

                                    @if(auth::user()->type=="user")
                                    <a class="dropdown-item" href="{{ route('verPerfilUsu') }}">
                                        {{ __('Perfil Personal') }}
                                    </a>
                                    <!-- <a class="dropdown-item" href="{{ route('personaJuridica') }}">
                                        {{ __('Perfil Persona Juridica') }}
                                    </a> -->

                                    <a class="dropdown-item" href="{{ route('cambiarPass') }}">
                                        {{ __('Cambiar contraseña') }}
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
        </ul>          
        @endguest
      
    </header>
  </div>
        <main class="pb-4">
            @yield('content')
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="mensajeModalLabel">Mensaje</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="mensajeExito">
            <!-- El mensaje se insertará aquí -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container zfooter">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4">
  <p class="col-md-6 mb-0 text-body-secondary">Para mayor información, consultas o dudas:  <a href="tel:+56991594961">+56 9 9159 4961</a>  /  <a href="mailto:comunidades@cenizas.cl">comunidades@cenizas.cl</a></p>
  <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="{{ route('terminoCondiciones') }}" class="nav-link px-2 text-body-secondary">Términos y condiciones</a></li>
      <li class="nav-item"><a href="https://cenizas.cl" class="nav-link px-2 text-body-secondary">www.cenizas.cl</a></li>

    </ul>
  </footer>
</div>
<script src="{{ asset('js/frm_cambiar_comuna.js') }}?v={{ time() }}"></script>
</body>
</html>
