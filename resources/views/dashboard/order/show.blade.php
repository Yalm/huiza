@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Ver pedido</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active">Ver pedidos</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <div id="invoice" class="effect2 card_ch">
                <div id="invoice-top">
                    <div class="invoice-logo rounded-circle"></div>
                    <div class="invoice-info">
                        <h2 class="text-white">{{ $order->customer->name }}</h2>
                        <p class="text-secondary"> {{ $order->customer->email }} <br> {{ $order->customer->phone }}
                        </p>
                    </div>
                    <!--End Info-->
                    <div class="title">
                        <h4 class="text-white text-uppercase">Pedido #{{ $order->id }}</h4>
                        <p>Emitido: {{ $order->created_at->format('F d \,\ Y ')  }}<br> Estado de pago: <b class="text-uppercase">{{ $order->state->name }}</b>
                        </p>
                    </div>
                    <!--End Title-->
                </div>
                <div id="invoice-bot">

                    <div id="invoice-table">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody><tr class="tabletitle">
                                    <td class="table-item">
                                        <h2 class="text-dark">Nombre del producto</h2>
                                    </td>
                                    <td class="Rate">
                                        <h2 class="text-dark">Precio</h2>
                                    </td>
                                    <td class="Hours">
                                        <h2 class="text-dark">Cantidad</h2>
                                    </td>
                                </tr>

                                @foreach ($order->products as $product)
                                <tr class="service">
                                    <td class="tableitem">
                                        <p class="itemtext text-white">{{ $product->name }}</p>
                                    </td>
                                    <td class="tableitem">
                                        <p class="itemtext text-white">S/.{{ $product->price }}</p>
                                    </td>
                                    <td class="tableitem">
                                        <p class="itemtext text-white">{{ $product->pivot->quantity }}</p>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="tabletitle">
                                    <td class="Rate">
                                        <h2 class="text-dark">Total</h2>
                                    </td>
                                    <td></td>
                                    <td class="payment">
                                        <h2 class="text-dark">S/.{{ $order->getTotalPrice() }}</h2>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>

                </div>
                <a href="{{ url('admin/order') }}" class="btn btn-seconday hov_a_ch" >
					<i class="fa fa-hand-o-left" aria-hidden="true"></i>
					Atras
				</a>
                <!--End InvoiceBot-->
            </div>
            <!--End Invoice-->
        </div>
    </div>
    <!-- End PAge Content -->  
</div>
@endsection