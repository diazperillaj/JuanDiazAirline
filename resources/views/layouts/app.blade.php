<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth-styles.css') }}">
</head>
<body>
    <header>
        <div class="logo">
            <h2>Juan Diaz Airlines <img src="{{ asset('src/avion.png') }}" alt="logout" width="15px" height="15px"></h2>
        </div>
        <nav class="navegation">
            <ul class="menu">

                @guest
                    <li><a class="login_href" href="{{ route('ingreso.show') }}">Iniciar Sesión</a></li>
                    <li><a class="register_href" href="{{ route('registro.show') }}">Registrarse</a></li>
                @endguest

                @auth
                    @can('crearAerolineas')
                        @if (request()->routeIs('aerolineas.index'))
                            <li><a class="login_nav_options vuelos_option" href="" id="create_btn">Crear Aerolinea</a></li>
                        @endif
                    @endcan
                    @can('crearVuelos')
                        @if (request()->routeIs('vuelos.show'))
                            <li><a class="login_nav_options vuelos_option" href="" id="create_btn">Crear Vuelo</a></li>
                        @endif
                    @endcan
                    @can('verAerolineas')
                        <li><a class="login_nav_options aerolineas_option" href="{{ route('aerolineas.index') }}">Aerolineas</a></li>
                    @endcan

                    @can('verVuelos')
                        <li><a class="login_nav_options vuelos_option" href="{{ route('vuelos.index') }}">Vuelos</a></li>
                    @endcan

                    <li class="user_options"><a class="user_href">{{ auth()->user()->name ?? auth()->user()->username }} <img src="{{ asset('src/dropdown.png') }}" alt="logout" width="10px" height="10px"></a>
                        <ul class="submenu">
                            <li><a href="{{ route('log.logout') }}">Cerrar sesión</a></li>
                        </ul>
                    </li>

                @endauth
            </ul>
        </nav>
    </header>
    @yield('content')
</body>
</html>