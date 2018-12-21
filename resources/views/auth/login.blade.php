@extends('layouts.app')
@section('body-class','signup-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset("img/city.jpg")}}'); background-size: cover; background-position: top center;">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="card card-signup">
                
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="header header-primary text-center">
                        <h4>Inicio de sesión</h4>
                        {{-- <div class="social-line">
                            <a href="#" class="btn btn-simple btn-just-icon">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#" class="btn btn-simple btn-just-icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-simple btn-just-icon">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div> --}}
                    </div>
                    <p class="text-divider">Ingresa tus credenciales</p>
                    <div class="content">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo electrónico">
                             @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock_outline</i>
                            </span>
                           <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>


                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                Recordarme
                            </label>
                        </div>
                    </div>
                    @if(session('aviso'))
                <div class="alert alert-success" style="margin-top: 25px">
                          <div class="container-fluid">
                            <div class="alert-icon">
                              <i class="material-icons">check</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                             {{session('aviso')}}
                           </div>
                      </div>
                      @endif
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-simple btn-primary btn-lg">Login</button>
                    </div>
                    <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                           {{ __('Forgot Your Password?') }}
                                       
                                    </a>-->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
