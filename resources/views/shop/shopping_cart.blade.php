@extends('layouts.shop')
@section('content')
  <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Carrito
		</h2>
	</section>
  <div class="cl5 {{ $count_cart ? 'hidden' : 'bg0 p-t-150 p-b-85' }}  compra-articulos text-center">
    <h1>Compra articulos</h1>
    <a class="hov-cl1 cl5" href="{{ url('/shop') }}"><i class="zmdi zmdi-arrow-left"></i> Ir a la tienda</a>
  </div>
  <div class="bg0 p-t-150 p-b-85  {{ $count_cart ? '' : 'hidden' }} cart-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
          <div class="m-l-25 m-r--38 m-lr-0-xl">
            <div class="wrap-table-shopping-cart" id="#padreTable">
            <form action="{{ url('/cartEdit') }}"    method="post">
              <table class="table-shopping-cart">
                <tr class="table_head">
                  <th class="column-1">Producto</th>
                  <th class="column-2"></th>
                  <th class="column-3">Precio</th>
                  <th class="column-4">Cantidad</th>
                  <th class="column-5">Total</th>
                </tr>
                @csrf
                
                @foreach ($products as $product)
                  <tr class="table_row" id="trProductCart{{ $product->rowId }}">
                    <td class="column-1">
                      <div class="how-itemcart1" data-id="{{$product->rowId}}" id="DeleteProductCart" >
                        <img src="{{ asset('/admin/'.$product->options->img)  }}" alt="IMG">
                      </div>
                    </td>
                    <input type="hidden" name="rowId[]" value="{{$product->rowId}}">
                    <td class="column-2">{{  $product->name }}</td>
                    <td class="column-3">S/.{{ $product->price }}</td>
                    <td class="column-4">
                      <div class="wrap-num-product flex-w m-l-auto m-r-0">
                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                          <i class="fs-16 zmdi zmdi-minus"></i>
                        </div>

                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="qty[]" min="1" max="{{$product->options->stock}}" readonly value="{{ $product->qty }}">

                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                          <i class="fs-16 zmdi zmdi-plus"></i>
                        </div>
                      </div>
                    </td>
                    <td class="column-5">S/.{{ $product->price * $product->qty }}</td>
                  </tr>
                @endforeach
                
              </table>
            </div>
            
            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
              <input name="_method" type="hidden" value="PUT">
              <button type="submit" class="text-dark flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                Actualizar carrito
              </button>
            </div>
            </form>
           
          </div>
        </div>

        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
          <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
            <h4 class="mtext-109 cl5 p-b-30">
              Carrito Total
            </h4>

            <div class="flex-w flex-t bor12 p-b-13">
              <div class="size-208">
                <span class="stext-110 cl5">
                  Subtotal:
                </span>
              </div>

              <div class="size-209">
                <span class="mtext-110 cl5 subtotal">
                  {{ $total }}
                </span>
              </div>
            </div>
            <div class="flex-w flex-t p-t-27 p-b-33">
              <div class="size-208">
                <span class="mtext-101 cl5">
                  Total:
                </span>
              </div>

              <div class="size-209 p-t-1">
                <span class="mtext-110 cl5 total">
                  {{ $total }}
                </span>
              </div>
            </div>
              <a href="{{ url('checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                Proceder a Pagar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('myjsfile')
  <script type="text/javascript">
  $(document).on('click','#DeleteProductCart',function() 
  {
    var id = $(this).data('id');
    $.ajax({
      type: 'delete',
      url: '{{ url('/cart') }}/'+ id,
      data:
      {
        '_token': $('input[name=_token]').val(),
      },
      success: function(data) 
      {
        if(data.count_cart <= 0)  
        {
          $('.cart-form').addClass('hidden');
          $('.compra-articulos').removeClass('hidden');
          $('.compra-articulos').addClass('bg0 p-t-150 p-b-85');     
        }
        $('#trProductCart'+ id).remove();
        $('.subtotal').text(data.total);
        $('.total').text(data.total);
        $('.count_cart_a').attr('data-notify',data.count_cart);
      },
      error: function(data) 
      {
        console.log(data);
      },

    });
  });
  </script>
@endsection
