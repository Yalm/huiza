@extends('layouts.shop')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-40" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">

</section>
    <section class="bg0 p-t-75 p-t-80 p-b-80">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid" src="{{ asset('images/sucess.gif') }}">
                </div>
                <div class="col-md-8 woocommerce">
                    <h1 class="thankyou-order-received">Gracias. Tu pedido ha sido recibido.</h1>
                    <div class="p-t-20">
                        <h2 >Se completo exitosamente su pedido<a class="cl7 hov-cl1 trans-04" href="{{ url('/profile/orders') }}">Ver perfil</a></h2>              
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection