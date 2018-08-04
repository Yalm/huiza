@extends('layouts.shop')
@section('content')
  <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
			Nosotros
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
	
            <h4 class="cl5 p-b-16">
              Misión
            </h4>

						<p class="stext-113 cl6 p-b-26">
              Somos una empresa dedicada a la distribución y comercialización de bicicletas y accesorios para bicicletas, apoyados en un equipo humano calificado que con actitud de servicio y honestidad brinda asesoría personalizada y servicio técnico a usuarios de motocicletas en diferentes puntos de ventas ubicados estratégicamente en la ciudad.
						</p>

            <h4 class="cl5 p-b-16">
              Visión
            </h4>

						<p class="stext-113 cl6 p-b-26">
							En el 2020 Comercial Huiza será reconocida como la empresa líder a nivel local en distribución de bicicletas y accesorios de buena calidad contando  con un amplio portafolio de productos y servicio ofrecidos a los ciclistas  en la ciudad.
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{ asset('images/about-01.jpg') }}" alt="IMG">
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
@endsection
