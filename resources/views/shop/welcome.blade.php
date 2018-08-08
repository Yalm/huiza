@extends('layouts.shop')
@section('content')
  <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url({{ asset('images/slide-01.jpg') }} );">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h1 class="ltext-151 cl2 p-t-19 p-b-5 respon1">
                                     Lorem ipsum dolor sit amet
                                </h1>
                             </div>
                            <div class="layer-slick1 animated visible-false m-tb-15" data-appear="fadeInDown" data-delay="1000">
                                <p class="ltext-80 cl2   respon2">
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br>eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                </p>
                            </div>
                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{ url('/shop') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Comprar ahora
                                </a>
                            </div>
                         </div>
                    </div>
                </div>
        
                <div class="item-slick1" style="background-image: url({{ asset('images/slide-02.jpg') }} );">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    Men New-Season
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    Jackets & Coats
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="{{ url('/shop') }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Comprar ahora
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src=" {{ asset('images/banner-01.jpg') }}" alt="IMG-BANNER">
						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Lorem ipsum 
								</span>
								<span class="block1-info stext-102 trans-04">
									Lorem ipsum dolor sit amet
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Comprar
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src=" {{ asset('images/banner-02.jpg') }}" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Lorem
								</span>

								<span class="block1-info stext-102 trans-04">
									Lorem ipsum dolor sit amet
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Comprar
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src=" {{ asset('images/banner-03.jpg') }}" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Lorem
								</span>

								<span class="block1-info stext-102 trans-04">
									Lorem ipsum dolor sit amet
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Comprar
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Productos nuevos por Categoría
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-10">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Todos los Productos
					</button>
            
           @foreach ($categories as $category)
             <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $category->id }}">
              {{ $category->name}}
             </button>
           @endforeach
				</div>           
			</div>

			<div class="row isotope-grid">     
        @foreach ($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product->category->id }}">
            <!-- Block2 -->
            <div class="block2">
              <div class="block2-pic hov-img0" >
                <img src="{{ $product->image }}" alt="IMG-PRODUCT">
              </div>

              <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                  <a href="{{ url("/product/$product->id") }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{ $product->name }}
                  </a>
                   <span class="stext-105 cl3">
                     S/. {{ $product->price }}
                  </span>
                </div>
                <div class="block2-txt-child2 flex-r p-t-3">
                  <a href="javascript:void(0)" class="hov-cl1 cl7 addCartProduct" data-id="{{ $product->id }}">
                    <i class="zmdi zmdi-shopping-cart fs-25"></i>
                  </a>
                </div>
              </div>

            </div>
          </div>
        @endforeach       
			</div>

		</div>
	</section>
@endsection

