@extends('layouts.shop')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" 
		style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
	<h2 class="ltext-105 cl0 txt-center">
		Iniciar sesión
	</h2>
</section>

<section class="bgwhite p-t-60 p-b-105 cl5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><b>Ingrese o Crea una cuenta</b></h1><br><br>
			</div>
			<div class="col-md-6 p-b-30">
				<h4><b>Nuevos Clientes</b></h4>
				<hr>
				<p>Al crear una cuenta en nuestra tienda, podrá avanzar más 
				rápidamente en el proceso de compra, almacenar múltiples
					direcciones de envío, ver y rastrear sus pedidos en su cuenta 
					y más.</p>
				<hr>
				<a href=" {{ url('/register') }}" 
					class="flex-c-m stext-101 cl0 size-121 bg3 bor1 
					hov-btn3 p-lr-15 trans-04 pointer">Crea una cuenta</a>
			</div>

			<div class="col-md-6 p-b-30">
				<h4>
					<b>Clientes Registrados</b>
				</h4>
				<hr>
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
				@if (session('warning'))
					<div class="alert alert-warning">
						{{ session('warning') }}
					</div>
				@endif
					<h6>Si tiene una cuenta con nosotros, 
					por favor inicie sesión.</h6><br>
				<form class="form-horizontal" role="form" 
						method="POST" action="{{ route('login') }}">
					@csrf
					<div class="col-sm-12 p-b-5">
						<label class="stext-102 cl5" for="email">
							Dirección de correo electrónico
						</label>
						<input class="size-111 bor8 stext-102 cl5 p-lr-20" 
								id="email" type="text" name="email" 
								value="{{ old('email') }}" required autofocus>
						@if ($errors->has('email'))
							<span class="help-block text-danger">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
					<div class="clearfix">
						<a class="hov-cl1 cl5 float-right" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
					</div>
					<div class="col-sm-12 p-b-5">
						<label class="stext-102 cl5" for="password">
							Contraseña
						</label>
						<input class="size-111 bor8 stext-102 cl5 p-lr-20" 
								id="password" type="password" 
								name="password" required>
						@if ($errors->has('password'))
							<span class="help-block text-danger">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
					<hr>
					<div class="row">
						<!-- Button -->
						<button class="col-5 stext-101 cl0 size-121 bg3 bor1 
										hov-btn3 p-lr-15 trans-04 pointer" 
										type="submit">
							Iniciar sesión
						</button>
						<div class="col-7">
							<p>¿Aún no recibiste el correo electrónico 
							de confirmación?
								<b>
									<a class="cl5 hov-cl1" 
										href="{{ url('resend') }}"> 
										Reenvíe el correo electrónico
									</a>
								</b>
							</p>  
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
