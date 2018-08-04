@extends('shop.profile.layout')
@section('main')
<section class="p-tb-20">
    <h1>Hola {{ "$customer->name (¿no eres $customer->name?" }} 
        <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"class="cl5 hov-cl1 trans-04">
            Cerrar sesión)
        </a>
    </h1>
    <p class="p-tb-20 fs-20" >Desde el panel de control de tu cuenta puedes ver tus 
        <b><a class="hov-cl1 cl5" href="{{ url('profile/orders') }}">pedidos recientes</a></b> 
        y <b><a class="hov-cl1 cl5" href="{{ url('profile/account') }}">editar tu contraseña y los 
            detalles de tu cuenta.</a></b>
    </p>
</section>
@endsection