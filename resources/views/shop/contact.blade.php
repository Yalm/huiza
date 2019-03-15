@extends('layouts.shop')
@section('content')
  <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ url('images/bg-01.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
			Contáctanos
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					@if (session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif
					<form action="{{ url('/contact') }}"    method="post" >
						@csrf
						<h4 class="mtext-105 cl5 txt-center p-b-30">
							Envía tu mensaje
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input required class=" text-dark  stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Tu Correo">
							<img class="how-pos4 pointer-none" src="{{ asset('images/icons/icon-email.png') }}" alt="ICON">
						</div>

						<div class="bor8 m-b-30 ">
							<textarea required class="stext-111 text-dark cl2 plh3 size-120 p-lr-28 p-tb-25" name="message" placeholder="¿Cómo podemos ayudar?"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Enviar
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl5">
								Dirección
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Huanuco 365, Huancayo
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl5">
                				Hablemos
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								(064) 217092
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl5">
								Soporte de venta
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<a class="cl5 hov-cl1 trans-04" href="mailto:ventas@comercialhuiza.com">ventas@comercialhuiza.com</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
