<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'EventsProject'}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/dojo/1.13.0/dojo/dojo.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('painel.index') }}">
                    {{ 'Events Project ' }}
                </a>
                    <!-- Left Side Of Navbar -->
                <div class="navbar-collapse collapse show mr-auto" >
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-dark bg-dark ml-auto">
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
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item"><a class="nav-link" href="/painel">Painel</a></li>

                                    @if (Auth::user()->level>=1)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('events.create')}}">Cadastrar Eventos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('events.index')}}">Editar Eventos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('usuarios.index')}}">Usuários Inscristos Eventos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('files.index')}}"> Mostrar Arquivos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('files.create')}}"> Adicionar Arquivos</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->level==0)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('usuarios.subscription',Auth::user()->id)}}">Eventos Inscritos</a>
                                        </li>
                                    @endif
                                </ul>
                            <li class=" nav-item dropdown">
                                <a  class="nav-link dropdown-toggle " href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    @if(Auth::user()->level==1)
                                    <a class="dropdown-item" href="{{route('users.create')}}">{{'Criar Usúarios'}}</a>
                                        <a class="dropdown-item" href="{{route('users.index')}}">{{'Listar Usúarios'}}</a>

                                        @endif
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-5">
            @yield('content')
        </main>



    </div>
</body>
</html>
