@extends('shop.profile.layout')
@section('main')
<div class="form-row p-tb-10">
    @if($orders->isEmpty())
    <a href="{{ url('shop') }}" 
            class="col-md-3 flex-c-m stext-101 cl0 size-121 bg3 bor1 
            hov-btn3 p-lr-15 trans-04 pointer">
            IR A LA TIENDA
    </a>
    <h2 class="col-md-9 stext-101 p-t-10">No se ha hecho ningún pedido todavía.</h2>
    @else
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Pedido #</th>
                    <th scope="col">Fecha de Pedido</th>
                    <th scope="col">Estado de su pedido</th>
                    <th scope="col">Monto de su Pedido</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th scope="row" class="text-uppercase text-truncate" style="max-width: 280px;">{{ $order->getIdFormat() }}</th>
                    <td>{{ $order->created_at->format('F d \,\ Y ')  }}</td>
                    <td class="text-capitalize {{ $order->getColorState() }}">{{ $order->state->name }}</td>
                    <td>S/.{{ $order->getTotalPrice() }}</td>
                    <td>
                    @if($order->state->name == 'cancelado' || $order->state->name == 'cerrado' || $order->state->name == 'aprobado' || $order->state->name == 'denegado')
                        <a href="{{ url("profile/order/$order->id") }}" class="fs-20 hov-cl1 cl5 p-r-5"> 
                            <i class="zmdi zmdi-eye"></i>
                        </a>
                    @elseif($order->state->name == 'falta de pago' || $order->state->name == 'pendiente de revisión')
                        <a href="{{ url("profile/order/$order->id/canceled") }}" class="fs-20 hov-cl1 cl5 p-r-5"> 
                            <i class="zmdi zmdi-close"></i>
                        </a>
                        <a href="{{ url("profile/order/$order->id") }}" class="fs-20 hov-cl1 cl5 p-r-5"> 
                            <i class="zmdi zmdi-eye"></i>
                        </a>
                        <a href="{{ url("profile/order/$order->id/upload ") }}" class="fs-20 hov-cl1 cl5">
                            <i class="zmdi zmdi-upload"></i>
                        </a> 
                    @endif                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    			<div class="flex-c-m flex-w w-full p-t-45">
				@if(count($orders))
					<div class="mt-2 mx-auto">
							{{ $orders->links('
								pagination::bootstrap-4') }}
					</div>
					@endif
			</div>
</div>
@endsection
@section('myjsfile')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection