@extends('layouts.shop')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-40" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">

	</section>
    <section class="bg0 p-t-75 p-t-150 p-b-40">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-fluid" src="{{ asset('images/sucess.gif') }}">
                </div>
                <div class="col-md-7">
                    <h1 class="cl5 p-b-20">¡Su pedido se realizó exitosamente!</h1>
                    <h4>Mire el estado de su pedido en su <a class="cl5 hov-cl1" href="{{ url('profile/orders') }}">perfil</a>.</h4>
                </div>
            </div>
        </div>
    </section>
@endsection