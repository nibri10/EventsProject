@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div id="banner">
                    <img src="img/Banner-site-semana-da-engenharia.png" class="img-fluid" alt="Responsive image">
            </div>
        <div class="col-md-8">
            <div class="card border-success mb-3">
                <div class="card-header border-success mb-3">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @if(session()->has('login_error'))
                <div class="alert alert-success">
                  {{ session()->get('login_error') }}
                </div>
              @endif

                        <div class="form-group row{{ $errors->has('authentication') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail ou Ra') }}</label>
            
                            <div class="col-md-6">
                              <input id="authentication" type="authentication" class="form-control" name="authentication"
                                     value="{{ old('authentication') }}" autofocus>

                              @if ($errors->has('authentication'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('authentication') }}</strong>
                                                </span>
                              @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar-me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg  btn-block " id="corVerdeUnifae">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a class="btn btn-lg btn-info btn-block" id="register" href="{{ route('register') }}">Registrar-se</a>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua Senha?') }}
                                    </a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
