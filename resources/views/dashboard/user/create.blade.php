@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Añadir nuevo usuario</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="{{ url('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a class="hov_a_ch" href="{{ url('admin/user') }}">Todos los usuarios</a></li>
            <li class="breadcrumb-item active">Añadir nuevo usuario</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<div class="container-fluid">
    <form class="row" action="{{ url('admin/user') }}" method="post">
        @csrf
        <div class="col-md-6">
            <div class="card card_ch">
                <div class="card-body">
                    <h3 class="card-title">Datos del cliente</h3>
                    <div class="form-row">
                        <div class="form-group col-md-6">
							<label class="control-label">Nombre</label>
							<input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}">
							@if ($errors->has('name'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>

                        <div class="form-group col-md-6">
							<label class="control-label">Apellidos</label>
							<input class="form-control {{ $errors->has('surnames') ? 'is-invalid' : '' }}" type="text" name="surnames" value="{{ old('surnames') }}">
							@if ($errors->has('surnames'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('surnames') }}</strong>
								</span>
							@endif
						</div>

                        <div class="form-group col-md-12">
							<label class="control-label">Correo</label>
							<input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" value="{{ old('email') }}">
							@if ($errors->has('email'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
                        
                        <div class="form-group col-md-12">
							<label class="control-label">Contraseña</label>
							<input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" value="{{ old('password') }}">
							@if ($errors->has('password'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>

                        <div class="form-group col-md-12">
							<label class="control-label">Confirmar Contraseña</label>
							<input class="form-control" type="password" name="password_confirmation">
						</div>

                    </div>
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="card card_ch">
                <div class="card-body">
                    <h4 class="card-title">Estado de Usuario</h4>
                    <div class="row">
                        <div class="form-group col-md-6 my-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Estado de Usuario</label>
                            <select class="form-control text-uppercase" name="actived">
                                <option value="1">activo</option>
                                <option value="0">desactivado</option>                                      
                            </select>
                        </div>                    
                    </div>
                </div>
            </div>
            <div class="card card_ch">
                <div class="card-body">
                    <h4 class="card-title"><b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Añadir nuevo usuario</b></h4>
                    <p> ¿Estás seguro de esto?
                    </p>
                    <a href="{{ url('admin/user') }}" class="btn btn-seconday hov_a_ch" >
							<i class="fa fa-times-circle" aria-hidden="true"></i>
							 Cancelar
					</a>
					<button class="btn btn-primary" type="submit" name="">
							<i class="fa fa-check"></i>
							Añadir nuevo usuario
					</button>
                </div>
            </div>
        </div>   
    </form>        
</div>
@endsection

