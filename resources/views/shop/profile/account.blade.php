@extends('shop.profile.layout')
@section('main')
 @include('shop.checkout.account')
<form class="form-row p-t-40" method="POST" action="{{ route('changePassword') }}">
@csrf
    <div class="col-md-12">
        <h1 class="p-b-30 cl5">CAMBIO DE CONTRASEÑA</h1>    
    </div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="form-group col-md-12">
        <label class="cl5 stext-101" for="inputPassword">CONTRASEÑA ACTUAL (DÉJALA EN BLANCO PARA QUE NO HAYA CAMBIOS)</label>
        <input type="password" class="form-control" required name="current-password"
                id="inputPassword">
        @if ($errors->has('current-password'))
            <span class="text-danger">
                <strong>{{ $errors->first('current-password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12">
        <label class="cl5 stext-101" for="inputNewPassword">NUEVA CONTRASEÑA (DÉJALO EN BLANCO PARA QUE NO HAYA CAMBIOS)</label>
        <input  type="password" class="form-control" required name="new-password"
                id="inputNewPassword" >
        @if ($errors->has('new-password'))
            <span class="text-danger">
                <strong>{{ $errors->first('new-password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12 p-b-10">
        <label class="cl5 stext-101" for="inputNewPasswordConfirmation">CONFIRMAR NUEVA CONTRASEÑA</label>
        <input type="password" class="form-control" required name="new-password_confirmation"
                id="inputNewPasswordConfirmation">
    </div>
    <button type="submit" 
            class="col-md-3 flex-c-m stext-101 cl0 size-121 bg3 bor1 
            hov-btn3 p-lr-15 trans-04 pointer">
            Actualizar contraseña
    </button>
</form>
@endsection