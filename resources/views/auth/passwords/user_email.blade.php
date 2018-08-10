@extends('layouts.login')

@section('content')

<div class="unix-login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-11">
                <form class='login' method="POST" action="{{ route('user.password.email') }}">
                    @csrf
                        <h1 class="p-20 m-t-20 m-b-10">¿Olvidaste tu contraseña?</h1>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="p-l-20">Le enviaremos un correo electrónico para restablecer su contraseña</p>
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
                        <div class='login_fields__submit'>
                            <input type='submit' value='Enviar'>
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
