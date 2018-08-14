@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Reportes</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Reportes</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card_ch">
                <div class="row">
                    <small class="col-md-4 text-center"><i class="fa fa-archive f-s-80"></i></small>
                    <div class="col-md-8 p-t-10 text-center">
                        <h4>Top 7 productos más vendidos</h4>
                    </div>
                    <form class="col-md-12" method="post" action="{{ url('admin/report/topProduct') }}">
                    	@csrf
                        <div class="form-group my-3">
							<label >Fecha Inicial</label>
                            <input type="date" class="form-control" required value="{{ date('Y-m-d') }}" name="date_init">
                        </div>
                        <div class="form-group my-3">
							<label >Fecha Final</label>
                            <input type="date" class="form-control" required value="{{ date('Y-m-d') }}" name="date_end">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-eye f-s-20"></i> Ver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
@endsection


