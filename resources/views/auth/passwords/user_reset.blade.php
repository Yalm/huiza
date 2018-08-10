@extends('layouts.login')

@section('content')
<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-11">
                <form class='login' method="POST" action="{{ route('user.password.request') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="p-20 m-t-40 m-b-30">Restablecer contraseña</h1>
                    <div class='login_fields'>
                        <div class='login_fields__user'>
                            <div class='icon f-s-20'>
                                <i class="fa fa-envelope"></i>
                            </div>
                            <input placeholder='Correo electrónico' type='email' name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            @endif
                        </div>

                        <div class='login_fields__password'>
                            <div class='icon f-s-20'>
                                <i class="fa fa-unlock-alt"></i>
                            </div>
                            <input placeholder='Contraseña' type='password' name="password" required>
                            @if ($errors->has('password'))
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            @endif
                        </div>

                        <div class='login_fields__password'>
                            <div class='icon f-s-20'>
                                <i class="fa fa-unlock-alt"></i>
                            </div>
                            <input placeholder='Confirmar Contraseña' type='password' name="password_confirmation" required>
                        </div>

                        <div class='login_fields__submit'>
                            <input type='submit' value='Restablecer'>
                            <div class='forgot'>
                                <span>¿Recuerdas tu contraseña?
                                    <a href="{{ url('admin/login') }}">Iniciar Sesión</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
@endsection
