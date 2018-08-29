@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Todos los productos</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Todos los productos</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
@if (session('success'))
    <input type="hidden" id="statusProduct" value="{{ session('success') }}">
@endif
@if (session('error'))
    <input type="hidden" id="errorProduct" value="{{ session('error') }}">
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
										<td>{{ "S/.$product->price" }}</td>
										<td><img src="{{ asset($product->image) }}" width="50"></td>
										<td>{{ $product->stock }}</td>
										<td>{{ $product->category->name }}</td>
										<td class="form-inline">
										    <a href="{{ url("admin/product/$product->id/edit") }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" id="deleteProduct" data-url="{{url("admin/product/$product->id")}}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
<form method="post" role="form" id="deleteProductForm">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
</form>

@endsection
@section('myjsfile')
	<script src="{{ asset('js/lib/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script>
    <script>
        $(doucument).on('click','#deleteProduct', function() 
        {
            var urlSend = $(this).data('url');
            swal({
                title: "¿Estás seguro de eliminar?",
                text: "No podrás recuperar este producto jamas !!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#BED001",
                confirmButtonText: "Sí, eliminarlo !!",
                cancelButtonText: "No, cancelalo !!",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm)
                {
                    if (isConfirm) 
                    {
                        $('#deleteProductForm').attr('action', urlSend);
                        $('#deleteProductForm').trigger('submit');
                    }
                    else 
                    {
                        swal("Cancelado !!", "Oye, tu producto esta seguro !!", "error");
                    }
            });
        });
    </script>
@endsection

