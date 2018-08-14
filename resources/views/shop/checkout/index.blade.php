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


			<form class="row" method="post" action="{{ url('checkout') }}">
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
<script>
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