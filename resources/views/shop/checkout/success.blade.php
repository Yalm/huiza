@extends('layouts.shop')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-40" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">

</section>
    <section class="bg0 p-t-75 p-t-80 p-b-80">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid" src="{{ asset('images/sucess.gif') }}">
                    <p class="cl5 font-weight-bold p-b-20">Tu pedido no será procesado 
                         hasta que el importe haya sido recibido en nuestra cuenta.</p>
                </div>
                <div class="col-md-8 woocommerce">
                    <h1 class="thankyou-order-received">Gracias. Tu pedido ha sido recibido.</h1>
                
                    <ul class="row order_details">
                        <li class="col-md-4 col-sm-6" ><b>Número de pedido:</b>
                        <small class="text-uppercase">{{ $order->getIdFormat() }}</small></li>
                        <li class="col-md-2 col-sm-6"><b>Fecha:</b><br>{{ $order->created_at->format('F d \,\ Y ')  }}</li>
                        <li class="col-md-4 col-sm-6"><b>Email:</b><br>{{ $order->email }}</li> 
                        <li class="col-md-2 col-sm-6"><b>Total:</b><br>S/.{{ $order->getTotalPrice() }}</li>
                    </ul>
                    <h2 class="wc-bacs-bank-details-heading">Nuestros detalles bancarios</h2>
                    
                    <ul class="row order_details_payment">
                        <li class="col-sm-2 col-5"><img width="50" src="{{ asset('images/interbank.png') }}"></li>
                        <li class="col-sm-3 col-7"><b>Banco:</b><br>Interbank</li>
                        <li class="col-sm-5 col-12"><b>Número de cuenta:</b><br>2626156156161651</li>
                    </ul>

                
                </div>
                
            </div>
        </div>
    </section>
@endsection