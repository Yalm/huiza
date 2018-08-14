@extends('layouts.login')
@section('content')
<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-8 col-11">
                <form class='login' method="POST" action="{{ route('user.login.submit') }}">
                    @csrf
                    <div class='login_title'>
                        <span>Ingrese a su cuenta</span>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
				    @endif
                    <div class='login_fields'>
                        <div class='login_fields__user'>
                            <div class='icon f-s-20'>
                                <i class="fa fa-user"></i>
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
                        <div class='login_fields__submit'>
                            <input type='submit' value='Iniciar sesión'>
                            <div class='forgot'>
                                <a href="{{ route('user.password.request') }}">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
@endsection


