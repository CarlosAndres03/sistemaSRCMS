<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SRCMS</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="p-4" style="background-color:#0b231e;">
        <!--<img src="/images/logoheader.svg">-->
    </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #13322b;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ ('SRCMS') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" aria-current="page" href="#" role="button" data-bs-toggle="dropdown">Controles mínimos</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('planeacion.anios')}}">Planeación</a></li>
                                <li><a class="dropdown-item" href="{{ route('gestion.anios')}}">Gestión</a></li>
                                <li><a class="dropdown-item" href="{{ route('rh.anios')}}">Recursos humanos</a></li>
                                <li><a class="dropdown-item" href="{{ route('equiposfisicos.anios')}}">Equipos físicos</a></li>
                                <li><a class="dropdown-item" href="{{ route('centrodatos.anios')}}">Centros de datos</a></li>
                                <li><a class="dropdown-item" href="{{ route('redtel.anios')}}">Redes y telecomunicaciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('equipocomputo.anios')}}">Equipo de cómputo</a></li>
                                <li><a class="dropdown-item" href="{{ route('tecmovil.anios')}}">Tecnologia móvil</a></li>
                                <li><a class="dropdown-item" href="{{ route('sisappserv.anios')}}">Sistemas, aplicaciones y servicios</a></li>
                                <li><a class="dropdown-item" href="{{ route('bd.anios')}}">Bases de datos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            @can('editar-control mínimo')
                            <a class="nav-link active dropdown-toggle" aria-current="page" href="/usuarios" role="button" data-bs-toggle="dropdown">Administrar usuarios</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="/usuarios">Usuarios</a></li>
                                <li><a class="dropdown-item" href="/roles">Roles</a></li>
                            </ul>
                            @endcan
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/soporte">Soporte</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('usuarios.showResetpassword') }}">Cambiar contraseña</a>
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
    </div>
</body>

</html>