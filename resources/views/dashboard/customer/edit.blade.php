@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Actualizar pedido</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active">Actualizar pedidos</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<div class="container-fluid">
    <form class="row" action="{{ url("admin/customer/$customer->id") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="card card_ch">
                <div class="card-body">
                    <h3 class="card-title">Datos del cliente</h3>
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $customer->id }}">
                        <div class="form-group col-md-12">
							<label class="control-label">Nombre</label>
							<input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ old('name', $customer->name) }}">
							@if ($errors->has('name'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>

                        <div class="form-group col-md-12">
							<label class="control-label">Apellidos</label>
							<input class="form-control {{ $errors->has('surnames') ? 'is-invalid' : '' }}" type="text" name="surnames" value="{{ old('surnames', $customer->surnames) }}">
							@if ($errors->has('surnames'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('surnames') }}</strong>
								</span>
							@endif
						</div>

                        <div class="form-group col-md-6">
							<label class="control-label">Celular/Telefono</label>
							<input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" value="{{ old('phone', $customer->phone) }}">
							@if ($errors->has('phone'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('phone') }}</strong>
								</span>
							@endif
						</div>

                        <div class="form-group col-md-6">
							<label class="control-label">Correo</label>
							<input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" value="{{ old('email', $customer->email) }}">
							@if ($errors->has('email'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>

                        <div class="form-group col-md-6">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Estado de pedido</label>
                            <select class="form-control text-uppercase" name="document_id">
                                <option value="">seleccione una opción</option>                                                                        
                                @foreach ($documents as $document)
                                    @if ($customer->document_id == $document->id)
                                        <option selected="true" value="{{ $document->id }}">{{ $document->name}}</option>
                                    @else
                                        <option value="{{ $document->id }}">{{ $document->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
							<label class="control-label">Numero de documento</label>
							<input class="form-control {{ $errors->has('document_number') ? 'is-invalid' : '' }}" type="text" name="document_number" value="{{ old('document_number', $customer->document_number) }}">
							@if ($errors->has('document_number'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('document_number') }}</strong>
								</span>
							@endif
						</div>
                        
                        <div class="form-group col-md-12">
							<label class="control-label">Dirección</label>
							<input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" value="{{ old('address', $customer->address) }}">
							@if ($errors->has('address'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('address') }}</strong>
								</span>
							@endif
						</div>

                    </div>
                </div>
            </div>
            <div class="card card_ch">
                <div class="card-body">
                    <h4 class="card-title"><b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Actualización de cliente</b></h4>
                    <p> ¿Estás seguro de actualizar?, No podrás recuperar 
                        los datos cambiados jamas.
                    </p>
                    <a href="{{ url('admin/customer') }}" class="btn btn-seconday hov_a_ch" >
							<i class="fa fa-times-circle" aria-hidden="true"></i>
							 Cancelar
					</a>
                   <input name="_method" type="hidden" value="PUT">
						<button class="btn btn-primary" type="submit" name="">
							<i class="fa fa-exclamation-triangle"></i>
							Actualizar
					</button>
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="card card_ch">
                <div class="card-body">
                    <h4 class="card-title">Pedidos</h4>
                    <div class="table-responsive">
                        <table id="customerOrder"class="table table-striped my-3">
                            <thead>
                            <tr>
                                <th>Numero Pedido</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="text-uppercase">
                                        <a class="hov_a_ch" href="{{ url("admin/order/$order->id/edit") }}">
                                            {{ $order->getIdFormat() }}
                                        </a>
                                    </td>
                                    <td>S/.{{ $order->getTotalPrice() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card_ch">
                <div class="card-body">
                    <h4 class="card-title">Estado de cliente</h4>
                    <div class="row">
                        <div class="form-group col-md-6 my-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Estado de cliente</label>
                            <select class="form-control text-uppercase" name="actived">
                                @if($customer->actived == 1)
                                    <option value="1">activo</option>
                                    <option value="0">desactivado</option> 
                                @else
                                    <option value="0">desactivado</option>                                 
                                    <option value="1">activo</option>
                                @endif                                      
                            </select>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>   
    </form>        
</div>
@endsection
@section('myjsfile')
	<script src="{{ asset('js/lib/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script>
@endsection
