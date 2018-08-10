@extends('layouts.shop')

@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Recuperar contraseña
    </h2>
</section>
<div class="container bg0 p-t-75 p-b-85">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="text-center p-b-20">¡Ingrese su correo electrónico y le enviaremos las instrucciones!</p>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Dirección de correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center align-items-center">
                        <div class="col-md-2">
                            <a  class="cl5 hov-cl1" href=" {{ url('/login') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                        </div>
                            <div class="col-md-6 ">
                                <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                                    Recuperar contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
