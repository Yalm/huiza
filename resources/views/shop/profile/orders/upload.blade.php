@extends('profile.layout')
@section('mycssfile')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/dropify/dropify.min.css')}}">
@endsection

@section('main')
<form class="row" method="post" enctype="multipart/form-data" action="{{ url("profile/order/$order->id/upload") }}">
    @csrf
    <div class="col-md-12">
        <h1 class="p-b-40 cl5"><i class="zmdi zmdi-upload"></i> SUBIR COMPROBANTE DE PAGO</h1>    
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-md-12 p-b-20"> 
        @if($order->boucher)
            <input type="file" name="boucher" class="dropify" data-default-file="{{ url($order->boucher) }}" />    
        @else
            <input type="file" name="boucher" class="dropify"/>            
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
</script>
@endsection