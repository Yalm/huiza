@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Añadir nuevo producto</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active">Añadir nuevo producto</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card card_ch">
                <div class="card-body">
					<form action="{{ url('admin/product') }}" class="form-row"    method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group col-md-12">
							<label class="control-label">Nombre</label>
							<input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" placeholder="Nombre del producto" value="{{ old('name') }}">
							@if ($errors->has('name'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group col-md-6">
							<input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price"  placeholder="Precio" value="{{ old('price') }}">
							@if ($errors->has('price'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('price') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group col-md-6">
							<input class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" type="text" name="stock" placeholder="Stock" value="{{ old('stock') }}">
							@if ($errors->has('stock'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('stock') }}</strong>
								</span>
							@endif
						</div>
						<div class="form-group col-md-12">
							<label for="exampleTextarea">Caracteristicas</label>
							<textarea class="form-control {{ $errors->has('characteristics') ? 'is-invalid' : '' }}" name="characteristics" rows="3">{{ old('characteristics') }}</textarea>
							@if ($errors->has('characteristics'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('characteristics') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group col-md-12">
							<label for="exampleTextarea">Descripcion</label>
							<textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" rows="3">{{ old('description') }}</textarea>
							@if ($errors->has('description'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('description') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group col-md-12">
							<label class="mr-sm-2" for="inlineFormCustomSelect">Categoria</label>
							<select class="form-control" name="category">
								@foreach ($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group col-md-12">
							<label class="control-label">Imagen</label>
							<input class="form-control" name="image" type="file">
							@if ($errors->has('image'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('image') }}</strong>
								</span>
							@endif
						</div>

						<a href="{{ url('admin/product') }}" class="btn btn-seconday hov_a_ch" >
							<i class="fa fa-hand-o-left" aria-hidden="true"></i>
							Atras
						</a>

						<button class="btn btn-primary" type="submit" name="">
							<i class="fa fa-fw fa-lg fa-check-circle"></i>
							Insertar
						</button>

        			</form>

				</div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
@endsection
