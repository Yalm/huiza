@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Todos los productos</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active">Todos los productos</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
@if (session('success'))
    <input type="hidden" id="statusProduct" value="{{ session('success') }}">
@endif
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card card_ch">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Codigo Orden</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>         
                     			@foreach ($orders as $order)
									<tr>
                                        <td>{{ $order->customer->name }}</td>
										<td>{{ $order->getIdFormat() }}</td>
										<td>S/.{{ $order->getTotalPrice() }}</td>
										<td>{{ $order->state->name }}</td>                                                                                
										<td class="form-inline">
										    <a href="{{ url("admin/order/$order->id") }}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{url("admin/order/$order->id/edit")}}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
										</td>
									</tr>
                            	@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
@endsection
@section('myjsfile')
	<script src="{{ asset('js/lib/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script>
@endsection

