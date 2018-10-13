<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                <ul class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Painel</a></li>
                                    <li><a class="dropdown-item" href="#">Configurações</a></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
                <div class="container-fluid">
                        <div class="row">
                          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                            <div class="sidebar-sticky">
                              <ul class="nav flex-column">
                                <li class="nav-item">
                                <a class="nav-link active" href="/painel">
                                    <span data-feather="home"></span>
                                    Inicio <span class="sr-only">(current)</span>
                                  </a>
                                </li>
                            @if (Auth::user()->level>=1)    
                                <li class="nav-item">
                                  <a class="nav-link" href="painel/events/create">
                                    <span data-feather="file"></span>
                                    Cadastrar Eventos
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">
                                    <span data-feather="shopping-cart"></span>
                                    Editar Eventos
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">
                                    <span data-feather="users"></span>
                                   Apagar Eventos
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">
                                    <span data-feather="bar-chart-2"></span>
                                    Listar Usuários
                                  </a>
                                </li>
                
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                          <span data-feather="bar-chart-2"></span>
                                          Apagar Usuários
                                    </a>
                                </li>
                            @endif
                           @if(Auth::user()->level>=0)  
                                <li class="nav-item">
                                  <a class="nav-link" href="#">
                                    <span data-feather="layers"></span>
                                    Eventos Inscritos
                                  </a>
                                </li>

                                <li class="nav-item">
                                        <a class="nav-link" href="#">
                                          <span data-feather="layers"></span>
                                          Cancelar Inscrições
                                        </a>
                                </li>
                            @endif
                            
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>       
                              </ul>
                            
                        </div>
                             
                </nav>
            @yield('content')
        </main>
    </div>
</body>
</html>