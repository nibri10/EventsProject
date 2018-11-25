@extends('layouts.app')

@section('content')

    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Info Registro</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group">

                            <input class="input--style-3 {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" placeholder="Nome"
                                   name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif

                        </div>


                        <div class="input-group">
                            <input class="input--style-3 {{ $errors->has('ra') ? ' is-invalid' : '' }}" id="ra"
                            type="text" placeholder="Ra" name="ra" value="{{ old('ra') }}" required>
                            @if ($errors->has('ra'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ra') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="input-group">
                            <input id="email" class="input--style-3 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="input-group">
                            <input class="input--style-3 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   id="password" type="password" placeholder="Senha" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="input-group">
                            <input class="input--style-3" id="password" type="password" placeholder="Confirmar Senha" name="password_confirmation"  required>

                        </div>

                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Registrar-se</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
