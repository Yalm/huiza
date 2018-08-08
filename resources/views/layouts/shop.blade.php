<!DOCTYPE html>
<html lang="en">
<head>
	<title>Comercial Huiza</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
<!--===============================================================================================-->
	@yield('mycssfile')
</head>
<body class="animsition">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="{{ url('/') }}" class="logo">
						<img src="{{ asset('images/icons/logo-01.png') }}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="{{ Request::path() == '/' ? 'active-menu' : '' }}">
								<a href="{{ url('/') }}">Inicio</a>
							</li>

                            <li class="{{ Request::path() == 'about' ? 'active-menu' : '' }}">
                                <a href="{{ url('about') }}">Nosotros</a>
                            </li>

							<li class="{{ Request::path() == 'shop' ? 'active-menu' : '' }}">
								<a href="{{ url('shop') }}">Tienda</a>
							</li>

							<li class="{{ Request::path() == 'contact' ? 'active-menu' : '' }}" >
								<a href="{{ url('contact') }}">Contáctanos</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						<a class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti count_cart_a"  data-notify="{{ $count_cart }}" href="{{ url('/cart') }}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</a>

						@if (Auth::guest('web'))
							<a class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" href="{{ url('login') }}">
								<i class="fa fa-user-circle-o"></i>
							</a>
						@else
							<div class="js-show-cart icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
								<i class="fa fa-user-circle-o"></i>
							</div>
						@endif
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="{{ url('/') }}"><img src="{{ asset('images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">


				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				<a href="{{ url('/cart') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11">
					<i class="zmdi zmdi-shopping-cart"></i>
				</a>
				@if (Auth::guest('web'))
					<a href="{{ url('/login') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
						<i class="fa fa-user-circle-o"></i>
					</a>
				@else
					<div class="js-show-cart icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
						<i class="fa fa-user-circle-o"></i>
					</div>
				@endif
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
				<li>
					<a href="{{ url('/') }}">Inicio</a>
				</li>

				<li>
					<a href="{{	url('/about') }}">Nosotros</a>
				</li>

				<li>
					<a href="{{	url('/shop') }}">Tienda</a>
				</li>

				<li>
					<a href="{{	url('/contact') }}">Contáctanos</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{ asset('images/icons/icon-close2.png') }}" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" action="{{ url('/shop/product') }}">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="query" placeholder="Buscar...">
				</form>
			</div>
		</div>
	</header>

	<!-- Sidebar -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>


		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl3">
					Tu Cuenta
				</span>

				<div class="fs-35 lh-10 cl3 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="p-b-13">
						<a href="{{ url('profile') }}" class="stext-102 cl5 hov-cl1 trans-04">Inicio</a>
					</li>
					<li class="p-b-13">
						<a href="{{ url('profile/orders') }}" class="stext-102 cl5 hov-cl1 trans-04">Mis pedidos</a>
					</li>
					<li class="p-b-13">
						<a href="{{ url('profile/account') }}" class="stext-102 cl5 hov-cl1 trans-04">Detalles de mi cuenta</a>
					</li>
					<li class="p-b-13">
						<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
													document.getElementById('logout-form').submit();"class="stext-102 cl5 hov-cl1 trans-04">
							Salir
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</div>	
		</div>
		

	</div>
	@csrf
	@yield('content')



  <!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categorías
					</h4>

					<ul>
					@foreach ($categories as $category)
						<li class="p-b-10">
							<a href="{{ url("/shop/$category->name") }}" class="stext-107 cl7 hov-cl1 trans-04">
								{{ $category->name }}
							</a>
						</li>
					@endforeach
					</ul>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Ayuda
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Pedidos
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Devoluciones
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Envio
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Estar en contacto
					</h4>

					<p class="stext-107 cl7 size-201">
						Huanuco 365, Huancayo
					</p>

					<div class="p-t-27">
						<a href="https://www.facebook.com/Comercial-huiza-556620077843675/" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>


<!--===============================================================================================-->
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
	<script src="{{ asset('js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/sweetalert/sweetalert.min.js')  }}"></script>
	<script>
		$(document).on('click','.addCartProduct',function(ev)  
		{
			var id = $(this).data('id');
			$.ajax({
			type: 'post',
			url: '/cart',
			data: 
			{
				'_token': $('input[name=_token]').val(),
				'product_id': id
			},
			success: function(data) 
			{
				if(!data.message)
				{
					swal({
						type: 'success',
						title: data.product.name,
						text: 'Se agrego al carrito !',
						confirmButtonClass: 'flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer',
        				buttonsStyling: false,
					});

					$('.count_cart_a').attr('data-notify',data.count_cart);
				}
				else
				{
					swal({
						type: 'error',
						title: 'Error',
						text: data.message,
						confirmButtonClass: 'flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer',
        				buttonsStyling: false,
					});
				}
			},
			error: function(data) 
			{
				console.log(data);
			},

			});
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js') }}"></script>
	@yield('myjsfile')
</body>
</html>
