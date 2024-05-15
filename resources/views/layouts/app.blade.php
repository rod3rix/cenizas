<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">

    <!-- Estilos de Bootstrap 5.3.3 -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css" rel="stylesheet">
    
    <!--  -->    
    <link href="https://cdn.rawgit.com/westonganger/bootstrap-directional-buttons/master/dist/bootstrap-directional-buttons.css" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>    

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>    

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>    
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js
"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js
"></script>

</head>
<body>
    <div id="app">
        <div class="container">
             
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'GRUPO MINERO LAS CENIZAS') }} 
                     -->GRUPO MINERO LAS CENIZAS
          </a>
        </a>
      </div>

    @guest
    @else
    @if(auth::user()->type=="user")
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">FONDOS CONCURSABLES</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('postularFondos') }}">POSTULAR FONDOS CONCURSABLES.</a></li>
              <li><a class="dropdown-item" href="{{ route('verPostulacionesProyectos') }}">VER ESTADO POSTULACIONES</a></li>
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
              <li><a class="dropdown-item" href="{{ route('seguimientoProyectos') }}">Ver fondos concursables</a></li>
              <li><a class="dropdown-item" href="{{ route('seguimientoProyectos') }}">Crear fondos concursables</a></li>
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

    <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-6 mb-0 text-body-secondary">Para mayor información, consultas o dudas:  +56 9 9159 4961  /  XXXXX@CENIZAS.CL</p>
    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Términos y condiciones</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">www.cenizas.cl</a></li>

    </ul>
  </footer>
</div>

</body>
</html>
