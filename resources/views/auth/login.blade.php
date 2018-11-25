@extends('layouts.app')
@section('content')


    <div class="limiter">
        <div class="container-login100  bg-gra-01">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form {{ $errors->has('authentication') ? ' has-error' : '' }}">
                    @csrf


					<span class="login100-form-title p-b-34">
						Login
					</span>

                    @if(session()->has('login_error'))
                        <div class="alert alert-danger">
                            {{ session()->get('login_error') }}
                        </div>
                    @endif

                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
                        <input placeholder="Ra ou Email" id="authentication" type="authentication" class="input100" name="authentication" value="{{ old('authentication') }}" autofocus required>
                        <span class="focus-input100"></span>


                        @if ($errors->has('authentication'))
                            <span class="help-block">
                                                    <strong>{{ $errors->first('authentication') }}</strong>
                                                </span>
                        @endif
                    </div>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" >
                        <input placeholder="Senha" class="input100 {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required>
                        <span class="focus-input100"></span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Entrar') }}
                        </button>
                    </div>

                    <div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							{{__('Esqueceu')}}
						</span>

                        <a href="{{ route('password.request') }}" class="txt2">

                            {{__('Ra ou Email / senha?')}}
                        </a>
                    </div>

                    <div class="w-full text-center">
                        <a href="{{route('register')}}" class="txt3">
                            {{__('Registrar-Se')}}

                        </a>
                    </div>
                </form>
                <div class="login100-more" id="img"></div>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection
