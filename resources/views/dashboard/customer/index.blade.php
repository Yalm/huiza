@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Todos los clientes</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Todos los clientes</li>
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
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Documento de identidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>         
                     			@foreach ($customers as $customer)
									<tr>
										<td>{{ $customer->name }}</td>
										<td>{{ $customer->surnames }}</td>
										<td>{{ $customer->email }}</td>
										<td>{{ $customer->document_number }}</td>
										<td class="form-inline">
										    <a href="{{ url("admin/customer/$customer->id/edit") }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" id="deleteCustomer" data-url="{{url("admin/customer/$customer->id")}}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
<form method="post" role="form" id="deleteCustomerForm">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
</form>

@endsection
@section('myjsfile')
	<script src="{{ asset('js/lib/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script>
    <script>
    $(document).ready(function(){
        $('#deleteCustomer').click(function(event) 
        {
            var urlSend = $(this).data('url');
            swal({
                title: "¿Estás seguro de eliminar?",
                text: "No podrás recuperar este cliente jamas !!",
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
                        $('#deleteCustomerForm').attr('action', urlSend);
                        $('#deleteCustomerForm').trigger('submit');
                    }
                    else 
                    {
                        swal("Cancelado !!", "Oye, tu cliente esta seguro !!", "error");
                    }
                });
        });
    });
    </script>
@endsection

