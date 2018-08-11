@extends('layouts.shop')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Carrito
	</h2>
</section>

<div class="cl5 {{ $count_cart ? 'hidden' : 'bg0 p-t-60 p-b-85' }}  cart_empty text-center">
	<i class="zmdi zmdi-shopping-cart"></i>
	<p>Tu carrito está vacío.</p>
	<a class="wc-backward" href="{{ url('/shop') }}">Volver a la tienda</a>
</div>

<div class="container-fluid p-t-50 p-b-85  {{ $count_cart ? '' : 'hidden' }} cart-form">
	<div class="row">
		<div class="col-xl-8">
			<form class="wrap-table-shopping-cart" id="#padreTable" action="{{ url('/cartEdit') }}"  method="post">
					<table class="table-shopping-cart">
						@csrf				
						@foreach ($products as $product)
						<tr class="table_row" id="trProductCart{{ $product->rowId }}">
							<td class="column-1">
								<div class="how-itemcart1" data-id="{{$product->rowId}}" id="DeleteProductCart" >
									<img src="{{ asset($product->options->img)  }}" alt="IMG">
								</div>
							</td>
							<input type="hidden" name="rowId[]" value="{{$product->rowId}}">
							<td class="column-2 text_comer_h">{{  $product->name }}</td>
							<td class="column-3">S/.{{ $product->price }}</td>
							<td class="column-4">
								<div class="wrap-num-product flex-w m-l-auto m-r-0">
									<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
									<i class="fs-16 zmdi zmdi-minus"></i>
									</div>

									<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty[]" min="1" max="{{$product->options->stock}}" readonly value="{{ $product->qty }}">

									<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
									<i class="fs-16 zmdi zmdi-plus"></i>
									</div>
								</div>
							</td>
							<td class="column-5">S/.{{ $product->price * $product->qty }}</td>
						</tr>
						@endforeach		
					</table>
				<div class="flex-w flex-sb-m p-b-15 p-lr-40 p-lr-15-sm">
					<input name="_method" type="hidden" value="PUT">
					<button type="submit" class="text-dark flex-c-m stext-101 cl2   p-lr-15 trans-04 pointer m-tb-10">
						Actualizar carrito
					</button>
				</div>
			</form> 
		</div>
		
		<div class="col-xl-4 p-tb-20">
			<div class="checkout-review-order">
				<table class="table_ch cl5">
					<tfoot>
						<tr class="title">
							<th>TOTAL DEL CARRITO</th>
						</tr>

						<tr class="cart-subtotal">
							<th>Subtotal</th>
							<td>
								<b class="amount">
									{{ "S/.$total"}}
								</b>
							</td>
						</tr>		
						<tr class="order-total order_total_1">
							<th>Total</th>
							<td>
								<span class="amount">
									{{ "S/.$total"}}
								</span>
							</td>
						</tr>
					</tfoot>
				</table>
				<a  href="{{ url('checkout')}}"
					class="flex-c-m stext-101 cl0 size-121 bg3 bor1 
					hov-btn3 p-lr-15 trans-04 pointer">
					FINALIZAR COMPRA
				</a>
			</div>   
		</div>

	</div>
</div>


@endsection
@section('myjsfile')
<script type="text/javascript">
	$(document).on('click','#DeleteProductCart',function() 
	{
		var id = $(this).data('id');
		$.ajax({
		type: 'delete',
		url: '{{ url('/cart') }}/'+ id,
		data:
		{
			'_token': $('input[name=_token]').val(),
		},
		success: function(data) 
		{
			if(data.count_cart <= 0)  
			{
				$('.cart-form').addClass('hidden');
				$('.cart_empty').removeClass('hidden');
				$('.cart_empty').addClass('bg0 p-t-150 p-b-85');     
			}
			$('#trProductCart'+ id).remove();
			$('.amount').text('S/.'+data.total);
			$('.amount').text('S/.'+data.total);
			$('.count_cart_a').attr('data-notify',data.count_cart);
		},
		error: function(data) 
		{
			console.log(data);
		},
		});
  	});
</script>
@endsection
