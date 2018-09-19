@extends('shop.profile.layout')
@section('mycssfile')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/dropify/dropify.min.css')}}">
@endsection

@section('main')
<form class="row" method="post" enctype="multipart/form-data" action="{{ url("profile/order/$order->id/upload") }}">
    @csrf
    <div class="col-md-12">
        <h1 class="cl5"><i class="zmdi zmdi-upload"></i> SUBIR COMPROBANTE DE PAGO</h1>
        <h4 class="my-3">
            <a class="hov-cl1 cl6" href="javascript:void(0)" id="numVoucher">Numero de cuenta bancaria</a>
        </h4>    
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-md-12 p-b-20"> 
        @if($order->voucher)
            <input type="file" name="voucher" class="dropify" data-default-file="{{ url($order->voucher) }}" />    
        @else
            <input type="file" name="voucher" class="dropify"/>            
        @endif
        @if ($errors->has('voucher'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('voucher') }}</strong>
            </span>
        @endif
    </div>
    <a  href="{{ url('profile/orders') }}" class=" p-t-10 p-r-10 fs-18  hov-cl1 cl5 p-b-30">
            <i class="zmdi zmdi-arrow-left"></i> Atras
    </a>
    <button type="submit" 
            class="col-md-3 stext-101 cl0 size-121 bg3 bor1 
            hov-btn3 p-lr-15 trans-04 pointer">
            <i class="zmdi zmdi-upload"></i> Subir
    </button>
</form>
@endsection

@section('myjsfile')
<script src="{{ asset('vendor/dropify/dropify.min.js') }}"></script>
<script>

    $('.dropify').dropify({
        messages: {
            'default': 'Arrastra y suelta un archivo aquí o haz clic',
            'replace': 'Arrastra y suelta o haz clic para reemplazar',
            'remove':  'Retirar',
            'error':   'Ooops, sucedió algo mal.'
        }
    });

    $('#numVoucher').on('click',function()
    {
        swal({
        title: '<strong class="my-2" >Cuentas de deposito </strong>',
        html:
            "<div class='row'>\
                <div class='col-md-12'>\
                    <img class='img-fluid' src='{{ url('images/interbank.png') }}'>\
                    <h5 class='my-3'>Numero: <b>5153108966975</b></h5>\
                </div>\
            </div>",
        confirmButtonClass: 'flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer',
        buttonsStyling: false,
        });
    });
</script>
@endsection