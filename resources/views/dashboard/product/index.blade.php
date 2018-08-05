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
                    <h4 class="card-title"><a  href="{{ url('admin/product/create') }}" class="btn btn-primary">Nuevo Producto</a></h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped ">
                            <thead>
                                <tr>
                                      <th>Nombre</th>
                                  <th>Precio</th>
                                  <th>Imagen</th>
                                  <th>Stock</th>
                                  <th>Categoria</th>
                                  <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>         
                     			@foreach ($products as $product)
									<tr>
										<td>{{ $product->name }}</td>
										<td>{{ $product->price }}</td>
										<td><img src="{{ asset($product->image) }}" alt="" width="50"></td>
										<td>{{ $product->stock }}</td>
										<td>{{ $product->category->name }}</td>
										<td class="form-inline">
										<a href="{{ url("admin/product/$product->id/edit") }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
										<form action="{{url('admin/product/'.$product->id)}}" method="post" role="form">
											{{ csrf_field() }}
											<input name="_method" type="hidden" value="DELETE">
											<button class="btn btn-primary" type="submit">
											    <i class="fa fa-trash-o" aria-hidden="true"></i>
											</button>
										</form>
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
@section('mijsfile')
	<script src="{{ asset('js/lib/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script>
@endsection

