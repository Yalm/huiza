@extends('layouts.shop')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
			Pagar
		</h2>
	</section>
    	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			@if(!$customer->verifiedData())
				<div class="row">
					<div class="col-md-4">
						<h2 class="cl5 font-weight-bold p-b-30">Completa tus Datos</h2> 
					</div>
					@include('shop.checkout.account')
				</div>
			@endif
			@if (session('successCustomer'))
				<div class="alert alert-success col-md-12">
					{{ session('successCustomer') }}
				</div>
   		 	@endif


			<form class="row" method="post" action="{{ url('checkout') }}" id="payment_end">
				@csrf
				<div class="col-md-6">
					@include('shop.checkout.address')
				</div>
                @include('shop.checkout.cart')				
            </form>
        </div>
    </section>
@endsection
@section('myjsfile')
<script src="https://checkout.culqi.com/v2"></script>
<script>
	$(document).on('change','input[type=radio]',function() 
	{
		$('input[type=radio]:checked').not(this).prop('checked', false);
	});

	Culqi.publicKey = 'pk_test_mPKWt3yvjgqcQTXk';

	$(document).on('click','#payment_sucess', function(e) 
	{
		// Abre el formulario con las opciones de Culqi.settings

		$('#payment_sucess').text('Cargando..');
		
		if($('#radioStacked1').is(':checked')) 
		{
			$('#payment_end').submit();            
		}

		
		Culqi.settings({
			title: 'Comercial Huiza',
			currency: 'PEN',
			description: 'Compra Online bicicletas',
			amount: {{ $total }} * 100
		});

			Culqi.open();
			e.preventDefault();
			$('#payment_sucess').text('Finalizar');

	});

	function culqi() 
	{
		$('#payment_sucess').text('Validando..');
		$('#payment_sucess').prop('disabled', true);
		if(Culqi.token) { // ¡Token creado exitosamente!
			// Get the token ID:
			var token = Culqi.token.id;
			
			$.ajax({
				type: 'post',
				url: '/checkout',
				data: $('#payment_end').serialize() +"&token=" + token,
				success: function(data) 
				{

					$('body').html(data.html);
					$('.loader05').remove();
					$('#payment_sucess').prop('disabled', false);
				},
				error: function(data) 
				{
					var error = $.parseJSON(data.responseJSON.message); 
					$('#payment_sucess').prop('disabled', false);
										
					if(error)
					{
						swal({
						type: 'error',
						title: 'Error',
						text: error.user_message,
						confirmButtonClass: 'flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer',
        				buttonsStyling: false,
						});
						$('#payment_sucess').text('Error');

						setTimeout(function () 
						{
							$('#payment_sucess').text('Finalizar');
						}, 1000);
					} 
					console.log(data);           				
				}
			});
		}
		else
		{ // ¡Hubo algún problema!
			// Mostramos JSON de objeto error en consola
			console.log(Culqi.error);
			alert(Culqi.error.user_message);
		}
	};

	$(document).on('click','#addCustomer',function()
	{
		if ($('#addCustomer').is(':checked')) 
		{
			$('#collapseExample').addClass('show');
		}
		else
		{
			$('#collapseExample').removeClass('show');	
		}
	});

</script>
@endsection