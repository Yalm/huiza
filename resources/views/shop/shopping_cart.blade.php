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
			<div class="wrap-table-shopping-cart" id="#padreTable">
					<table class="table-shopping-cart">
						@csrf				
						@foreach ($products as $product)
						<tr class="table_row" id="trProductCart{{ $product->rowId }}">						
							<td class="column-1">
								<div class="how-itemcart1" data-id="{{$product->rowId}}" id="DeleteProductCart" >
									<img src="{{ asset($product->options->img)  }}" alt="IMG">
								</div>
							</td>
							<td class="column-2 text_comer_h"><a class="cl5 hov-cl1 " href="{{ url("product/$product->id") }}">{{  $product->name }}</a></td>
							<td class="column-3">S/.{{ $product->price }}</td>
							<td class="column-4">
								<div class="wrap-num-product flex-w m-l-auto m-r-0">
									<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" data-id="{{ $product->rowId }}">
										<i class="fs-16 zmdi zmdi-minus"></i>
									</div>

									<input class="mtext-104 cl3 txt-center num-product"  type="number" min="1" max="{{$product->options->stock}}" readonly value="{{ $product->qty }}">

									<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" data-id="{{ $product->rowId }}">
										<i class="fs-16 zmdi zmdi-plus"></i>
									</div>
								</div>
							</td>
							<td class="column-5">S/.{{ $product->price * $product->qty }}</td>
						</tr>
						@endforeach		
					</table>
			</div> 
		</div>
		
		<div class="col-xl-4 p-tb-20">

			<div class="checkout-review-order">
				<div id="loader" class=""></div>
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
	
	$(document).on('click','.btn-num-product-up',function() 
	{
		var id = $(this).data('id');
		var numProduct = Number($(this).prev().val());
		var max = Number($(this).prev().attr('max'));
		var button = $(this);

		if(numProduct <= max)
		{
			console.log(true);			
			$.ajax({
				type: 'put',
				url: '{{ url('/cartEdit') }}',
				data:
				{
					'_token': $('input[name=_token]').val(),
					'id': id,
					'qty': numProduct
				},
				beforeSend: function() 
				{
					button.attr("disabled", true);
					$('#loader').addClass('loader');
					$('.checkout-review-order').addClass('loader_div');
				},
				success: function(data) 
				{
					$('#loader').removeClass('loader');
					$('.checkout-review-order').removeClass('loader_div');

					button.attr("disabled", false);
					$('.amount').text('S/.'+data);
					$('.amount').text('S/.'+data);
				},
				error: function(data) 
				{
					button.attr("disabled", false);
					$('#loader').removeClass('loader');
					$('.checkout-review-order').removeClass('loader_div');					
					console.log(data);
				},
			});
		}		
  	});
	$(document).on('click','.btn-num-product-down',function() 
	{
		var id = $(this).data('id');
		var numProduct =  Number($(this).next().val());
		var min = Number($(this).next().attr('min'));
		var button = $(this);
	
		$.ajax({
			type: 'put',
			url: '{{ url('/cartEdit') }}',
			data:
			{
				'_token': $('input[name=_token]').val(),
				'id': id,
				'qty': numProduct
			},
			beforeSend: function() 
			{
				button.attr("disabled", true);
				$('#loader').addClass('loader');
				$('.checkout-review-order').addClass('loader_div');
			},
			success: function(data) 
			{
				$('#loader').removeClass('loader');
				$('.checkout-review-order').removeClass('loader_div');

				button.attr("disabled", false);
				$('.amount').text('S/.'+data);
				$('.amount').text('S/.'+data);
			},
			error: function(data) 
			{
				button.attr("disabled", false);
				$('#loader').removeClass('loader');
				$('.checkout-review-order').removeClass('loader_div');					
				console.log(data);
			},
		});
  	});
</script>
@endsection
