@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card card_ch">
                <div class="card-body">
                    <div class="card-two">
                        <header>
                            <div class="avatar">
                                <img src="{{ asset('images/avatar.png') }}" alt="Allison Walker">
                            </div>
                        </header>
                        <h3 class="text-white">{{ Auth::guard('user')->user()->name }}</h3>
                        <div class="desc">
                            Comercial Huiza - Compra Online productos con grandes ofertas.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card card_ch">
                @yield('main')
            </div>
        </div>
        <!-- Column -->
    </div>
<!-- End PAge Content -->
</div>
@endsection