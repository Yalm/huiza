@extends('shop.profile.layout')
@section('main')
<div class="row">
    <div class="col-md-12">
        <h1 class="p-b-40 cl5"> MI PEDIDO</h1>    
    </div>
    <div class="col-5 cl5 p-t-20">
        <div class="row">
            <div class="col-6 p-b-10">
                <h5 class="p-r-10"><b>Nombre:</b>{{ $order->name}}</h5> 
            </div>
            <div class="col-6 p-b-10">
                <h5 class="p-r-10"><b>Apellidos:</b>{{ $order->surnames }}</h5>
            </div>
            <div class="col-6 p-b-10">
                <h5><b>Telefono\Celular:</b>{{ $order->phone}}</h5> 
            </div>
            <div class="col-6 p-b-10">
                <h5 ><b>Dirección:</b>{{ $order->address }}</h5>
            </div>
            <div clas="col-6 p-b-10">
                <h5><b>Correo Electronico:</b>{{ $order->email }}</h5>     
            </div>
        </div>
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
                                {{ "S/. $order->total"}}
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