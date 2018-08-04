@extends('layouts.app')
@section('content')
  <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ url('images/bg-01.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
			Mi Cuenta
		</h2>
	</section>

    <section>
        <div class="container">
            <div class="row p-tb-100">
                <div class="col-md-3">
                    <ul class="nav flex-column">
                        <li class="p-tb-5">
                            <a class="fs-18 hov-cl1 cl5 p-b-30" href="{{ url('profile') }}">INICIO</a>
                        </li>
                        <li class="p-tb-5">
                            <a class="fs-18 hov-cl1 cl5 p-b-30" href="{{ url('profile/orders') }}">PEDIDOS</a>
                        </li>
                        <li class="p-tb-5">
                            <a class="fs-18  hov-cl1 cl5 p-b-30" href="{{ url('profile/account') }}">DETALLES DE LA CUENTA</a>
                        </li>                        
                        <li class="p-tb-5">
                            <a  class="fs-18  hov-cl1 cl5 p-b-30" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">CERRAR SESIÓN</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    @yield('main')
                </div>                
            <div>
        </div>
    </section>
@endsection