@extends('layouts.shop')

@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
            Registrarse
		</h2>
	</section>


    <div class="container bg0 p-t-75 p-b-85">
      <div class="row">
        <div class="col-md-12 ">
          <h1 class="p-b-50 cl5"><b>Crea una cuenta</b></h1>
        </div>

        <div class="col-md-12">
          <h4 class="cl5">
            <b>Información personal</b>
          </h4>
          <hr>
            <form method="POST" action="{{ route('register') }}">
              @csrf
            <div class="col-sm-6 p-b-5">
              <label class="stext-102 cl5" for="name">Nombre</label>
              <input class="size-111 bor8 stext-102 cl5 p-lr-20" id="name" type="text" name="name" value="{{ old('name') }}" required>
              @if ($errors->has('name'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-sm-6 p-b-5">
              <label class="stext-102 cl5" for="email">Dirección de correo electrónico</label>
              <input class="size-111 bor8 stext-102 cl5 p-lr-20" id="email" type="text" name="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>

          <h4 class="cl5">
            <b>Información de sesión</b>
          </h4><hr><br>


          <div class="row">
            <div class="col-sm-6 p-b-5">
              <label class="stext-102 cl5" for="password">Contraseña</label>
              <input class="size-111 bor8 stext-102 cl5 p-lr-20" id="password" type="password" name="password" required>
              @if ($errors->has('password'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-sm-6 p-b-5">
              <label class="stext-102 cl5" for="password_confirmation">Confirmar Contraseña</label>
              <input class="size-111 bor8 stext-102 cl5 p-lr-20" id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
          </div>
            <hr>
            <div class="form-inline d-flex justify-content-between">
              <a  class="cl5 hov-cl1" href=" {{ url('/login') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
              <div class="w-size25">
                <!-- Button -->
                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                  Registrarse
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection
