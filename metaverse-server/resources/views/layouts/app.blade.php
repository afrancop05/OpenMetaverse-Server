<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-md bg-info navbar-light bg-gray-100 shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{ url('/about') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">

<!-- Lado izquierdo Of Navbar -->

                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/') }}">Inicio</a>
                  </li>
<!-- Si añades .show a la clase dropdown-menu se abre al dibujarse -->
                      @auth
                      @if ((auth()->check()) && auth()->user()->hasRole('admin'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle show text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                Administración
                            </a>

                        <ul class="dropdown-menu" data-bs-popper="static">
                            <li><a class="dropdown-item" href="{{ route('usuariostodos') }}">
                                  {{ "Usuarios" }}
                              </a>
                            </li>
                              <li>
                              <a class="dropdown-item" href="{{ url('/listagrupos') }}">
                                  {{ "Grupos" }}
                              </a>
                        </li>
                        <li>
                              <a class="dropdown-item" href="{{ url('importar') }}">
                                  {{ "Importar Usuarios" }}
                              </a>
                        </li>
                        <li>
                            
                              <a class="dropdown-item" href="{{ url('exportarusuarios') }}">
                                  {{ "Exportar Usuarios" }}
                              </a>
                        </li>
                        
                      @endif
                  @endauth


                    </ul>
                  </li>
                </ul>



<!-- Lado derecho Of Navbar -->
                                   <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Cerrar Sesion') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>



              </div>
            </div>
          </nav>













        <main class="py-4">
            @yield('content')
        </main>

        <!--
        <footer class="mt-auto text-black-50">
            <p>Aplicación creada por amgelin</p>
          </footer>
        -->

    </div>
</body>
</html>
