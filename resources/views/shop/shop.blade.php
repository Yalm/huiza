@extends('layouts.shop')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
			Tienda
		</h2>
	</section>

  <!-- Product -->
	<div class="bg0 m-t-23 p-t-20 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Todos los productos
					</button>
					
          @foreach ($categories as $category)
            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $category->id }}">
             {{ $category->name}}
            </button>
          @endforeach
					
				</div>

				<div class="flex-w flex-c-m m-tb-10">



					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Buscar
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<form action="{{ url('/shop/product') }}">
							<input class="mtext-107 cl5 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Buscar">
						</form>
					</div>
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					</div>
				</div>
			</div>

			<div class="row isotope-grid">
        @foreach ($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product->category->id }}">
            <!-- Block2 -->
            <div class="block2">
              <div class="block2-pic hov-img0" >
                <a href="{{ url("/product/$product->id") }}"><img src="{{ $product->image }}" alt="IMG-PRODUCT"></a>
              </div>

              <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                  <a href="{{ url("/product/$product->id") }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 text_comer_h">
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

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				@if(count($products))
					<div class="mt-2 mx-auto">
							{{ $products->links('
								pagination::bootstrap-4') }}
					</div>
					@endif
			</div>
		</div>
	</div>
@endsection

