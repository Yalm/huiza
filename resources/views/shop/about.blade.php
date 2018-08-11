@extends('layouts.shop')
@section('content')

<div class="container-fluid">
	<div class="row about_page">
		<div class="col-md-7">
			<img width="100%" height="100%" src="{{ asset('images/about2.jpg') }}" alt="">
		</div>
		<div class="col-md-5 p-r-40">
			<h1 class="title">Comercial<br>Huiza</h1>
			<h5 class="sub_title p-b-20">
				<span>-</span>
				<span>Tienda en Linea</span>
			</h5>
			<hr class="separator">
			<div class="row p-t-30">
				<div class="col-md-6">
					<h1 class="mision">Misión</h1>
					<p class="stext-113 cl6 p-t-26">
						Somos una empresa dedicada a la distribución y comercialización de bicicletas y accesorios para bicicletas, apoyados en un equipo humano calificado que con actitud de servicio y honestidad brinda asesoría personalizada y servicio técnico a usuarios de motocicletas en diferentes puntos de ventas ubicados estratégicamente en la ciudad.
					</p>
				</div>
				<div class="col-md-6">
					<h1 class="mision">Visión</h1>
					<p class="stext-113 cl6 p-t-26">
						En el 2020 Comercial Huiza será reconocida como la empresa líder a nivel local en distribución de bicicletas y accesorios de buena calidad contando  con un amplio portafolio de productos y servicio ofrecidos a los ciclistas  en la ciudad.
					</p>
				</div>
			</div>
			<h5 class="thanks">H. Ramos</h5>
		</div>
	</div>
</div>
@endsection
