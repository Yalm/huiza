@extends('layouts.shop')
@section('content')
  	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ url('images/bg-01.jpg') }}');">
		<h2 class="ltext-105 cl0 txt-center">
			 
		</h2>
	</section>

    <section class="sec-product-detail bg0 p-t-20">
  <div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
      <a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
        Inicio
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
      </a>

      <a href="#" class="stext-109 cl8 hov-cl1 trans-04">
        {{ $product->category->name }}
        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
      </a>

      <span class="stext-109 cl5">
        {{ $product->name }}
      </span>
    </div>
  </div>
</section>
  <section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-7 p-b-30">
          <div class="p-l-25 p-r-30 p-lr-0-lg">
            <div class="wrap-slick3 flex-sb flex-w">
              <div class="wrap-slick3-dots"></div>
              <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

              <div class="slick3 gallery-lb">

                <div class="item-slick3" data-thumb="{{ asset("admin/$product->image") }}">
                  <div class="wrap-pic-w pos-relative">
                    <img src="{{ asset("admin/$product->image") }}" alt="IMG-PRODUCT">

                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset("admin/$product->image") }}">
                      <i class="fa fa-expand"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-5 p-b-30">
          <div class="p-r-50 p-t-5 p-lr-0-lg">
            <h4 class="mtext-105 cl5 js-name-detail p-b-14">
              {{ $product->name }}
            </h4>

            <span class="mtext-106 cl5">
              S/.{{ $product->price }}
            </span>

            <p class="stext-102 cl3 p-t-23">
              {{ $product->characteristics }}
            </p>

            <!--  -->




              <div class=" p-b-10">
                <div class="size-204 flex-w flex-m respon6-next">
                  <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                      <i class="fs-16 zmdi zmdi-minus"></i>
                    </div>

                    <input class="mtext-104 cl3 txt-center num-product" readonly  min="1" max="{{ $product->stock }}" type="number" name="num-product" value="1" id="num-product">

                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                      <i class="fs-16 zmdi zmdi-plus"></i>
                    </div>
                  </div>

                  <button id="addCartProductDetail" data-id="{{ $product->id }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                    Agregar al carrito
                  </button>
                </div>
              </div>
            </div>

            <!--  -->

          </div>
        </div>
      </div>

      <div class="bor10 m-t-50 p-t-43 p-b-40">
        <!-- Tab01 -->
        <div class="tab01">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item p-b-10">
              <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Descripcion</a>
            </li>



          </ul>

          <!-- Tab panes -->
          <div class="tab-content p-t-43">
            <!-- - -->
            <div class="tab-pane fade show active" id="description" role="tabpanel">
              <div class="how-pos2 p-lr-15-md">
                <p class="stext-102 cl6">
                  {{ $product->description }}
                </p>
              </div>
            </div>

            <!-- - -->
 

            <!-- - -->
          </div>
        </div>
      </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
      <span class="stext-107 cl6 p-lr-25">
        COD: CH-{{ $product->id }}
      </span>

      <span class="stext-107 cl6 p-lr-25">
        Categoria: {{ $product->category->name }}
      </span>
    </div>
  </section>

@endsection
@section('myjsfile')
  <script type="text/javascript">
  $("#addCartProductDetail").on('click',function()  
  {
    var id = $(this).data('id');
    var qty = $('#num-product').val();
    $.ajax({
      type: 'post',
      url: '/cart',
      data: {
        '_token': $('input[name=_token]').val(),
        'product_id': id,
        'qty': qty,
      },
      success: function(data) 
      {
        if(!data.message)
        {
          swal(data.product.name, "Se agrego al carrito !", "success");
          $('.count_cart_a').attr('data-notify',data.count_cart);
        }
        else
        {
          swal('Error', data.message, "error");
        }
      },
      error: function(data) 
      {
        console.log(data);
      },

    });
  });
  </script>
@endsection
