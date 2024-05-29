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

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/dataTables.bootstrap5.css') }}" rel="stylesheet">

    <link href="{{ asset('css/buttons.bootstrap5.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/bootstrap-directional-buttons.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">

    <link rel="stylesheet" href="https://comuni.zlab.cl/assets/css/custom.css">
    <!-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
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
             
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
      <div class="col-md-3 mb-2 mb-md-0">
        <!-- <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none"> -->
          <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'GRUPO MINERO LAS CENIZAS') }} 
                     -->GRUPO MINERO LAS CENIZAS
          </a>
        <!-- </a> -->
      </div>

    @guest
    @else
    @if(auth::user()->type=="user")
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">FONDOS CONCURSABLES</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('postularFondos') }}">POSTULAR FONDOS CONCURSABLES.</a></li>
              <li><a class="dropdown-item" href="{{ route('seguimientoFondos') }}">VER ESTADO POSTULACIONES</a></li>
            </ul>
          </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">APOYO PROYECTOS</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('postularProyectos') }}">POSTULAR PROYECTOS</a></li>
              <li><a class="dropdown-item" href="{{ route('seguimientoProyectos') }}">VER ESTADO POSTULACIONES</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">RECLAMOS/SUGERENCIAS</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('enviarCaso') }}">INGRESAR CASO</a></li>
              <li><a class="dropdown-item" href="{{ route('seguimientoCasosUsu') }}">VER ESTADO DEL CASO</a></li>
            </ul>
          </li>
      </ul>
      @endif

      @if(auth::user()->type=="admin")
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('usuariosRegistrados') }}" data-bs-toggle="" aria-expanded="false">USUARIOS</a>
          </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">FONDOS CONCURSABLES</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('verPostulacionesFondos') }}">Ver Postulaciones</a></li>
              <li><a class="dropdown-item" href="{{ route('listarFondosConcursables') }}">Ver fondos concursables</a></li>

              @if(auth::user()->rol=="1")
                <li><a class="dropdown-item" href="{{ route('crearFondoConcursable') }}">Crear fondos concursables</a></li>
              @endif

            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('verPostulacionesProyectos') }}" data-bs-toggle="" aria-expanded="false">APOYO PROYECTOS</a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('verSugerenciaReclamo') }}" data-bs-toggle="" aria-expanded="false">SUGERENCIAS/RECLAMOS</a>
          </li>
      </ul>
      @endif
      @endguest

      
        @guest
        <div class="col-md-3 text-end">
        @if (Route::has('login'))
            <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">{{ __('Entrar') }}</a>
        @endif

        @if (Route::has('register'))
            <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Registrar') }}</a>
        @endif
        </div>
        @else
        <ul class="navbar-nav ms-auto">
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
                                    @endif

                                    @if(auth::user()->type=="user")
                                    <a class="dropdown-item" href="{{ route('verPerfilUsu') }}">
                                        {{ __('Perfil Personal') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('personaJuridica') }}">
                                        {{ __('Perfil Persona Juridica') }}
                                    </a>

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
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div class="container zfooter">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4">
    <p class="col-md-6 mb-0 text-body-secondary">Para mayor información, consultas o dudas:  +56 9 9159 4961  /  XXXXX@CENIZAS.CL</p>
    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Términos y condiciones</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">www.cenizas.cl</a></li>

    </ul>
  </footer>
</div>
<script>
(function(d, t, g, k) {
    var ph = d.createElement(t),
    s = d.getElementsByTagName(t)[0],
    t = (new URLSearchParams(window.location.search)).get(k);
    t && localStorage.setItem(k, t);
    t = localStorage.getItem(k);
    ph.type = 'text/javascript';
    ph.async = true;
    ph.defer = true;
    ph.charset = 'UTF-8';
    ph.src = g + '&v=' + (new Date()).getTime();
    ph.src += t ? '&' + k + '=' + t : '';
    s.parentNode.insertBefore(ph, s);
})(document, 'script', '//fb.zimple.pro/?p=21473&ph_apikey=046938ab124c94e711b10564aa759d62', 'ph_access_token');
</script>
</body>
</html>
