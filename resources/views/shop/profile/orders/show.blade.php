@extends('shop.profile.layout')
@section('main')
<div class="row">
    <div class="col-md-12">
        <h2 class="p-b-40 cl5 text-uppercase">PEDIDO {{ $order->getIdFormat() }}</h2>    
    </div>
    <div class="col-md-5 cl5 my-3">
        <h5 class="my-3"><b>Cliente</b></h5>
        <div class="media">
            <div class="col-md-4 col-4">
                <img class="img-fluid rounded-circle" src="{{ asset('images/avatar.png') }}" alt="Generic placeholder image">
            </div>
            <div class="media-body">
                <h5 class="mt-0 text-capitalize">{{ $order->customer->name }} <small><i>{{ $order->customer->phone }}</i></small></h5>
                {{ $order->customer->email }}<br>
                {{ $order->customer->address }}
            </div>
        </div>  
        <h5 class="my-4"><b>Datos de facturación</b></h5>
        <h6 class="my-3">Nombre: {{ $order->name }}</h6>
        <h6 class="my-3">Apellidos: {{ $order->surnames }}</h6>
        <h6 class="my-3">Telefono/Celuar: {{ $order->phone }}</h6>
        <h6 class="my-3">Dirección: {{ $order->address }}</h6>                        
    </div> 

    <div class="col-md-7">
        <div class="table-responsive checkout-review-order">
            <table class="table cl5">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                    <tr>
                        <td>{{ $product->name . ' x ' .$product->pivot->quantity }}</td>
                        <td>{{ "S/. $product->price"}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>	
                    <tr class="order-total">
                        <th>Total</th>
                        <td>
                            <span class="amount">
                               S/.{{ $order->getTotalPrice() }}
                            </span>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>   
    </div>
    <a  href="{{ url('profile/orders') }}" class=" p-t-10 p-r-10 fs-18  hov-cl1 cl5 p-b-30">
        <i class="zmdi zmdi-arrow-left"></i> Atras
    </a>
</dvi>
@endsection