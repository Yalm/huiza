@extends('layouts.app')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
			Pagar
		</h2>
	</section>
    	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<form class="row" method="post" action="{{ url('checkout') }}">
				@csrf
                @include('checkout.address')
                @include('checkout.cart')
                @include('checkout.method')
            </form>
        </div>
    </section>
@endsection