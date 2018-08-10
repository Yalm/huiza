@extends('dashboard.user.profile.index')

@section('main')
<!-- Nav tabs -->
<ul class="nav nav-tabs profile-tab" role="tablist">
    <li class="nav-item"> 
        <a class="nav-link active" href="{{ url('admin/profile') }}" >Configuración</a> 
    </li>
    <li class="nav-item"> 
        <a class="nav-link" href="{{ url('admin/changePassword') }}" role="tab">Cambiar Contraseña</a> 
    </li>                                
</ul>
<div class="card-body my-3">
    <form class="form-row" action="{{ url("admin/user/$user->id") }}" method="post">
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="form-group col-md-6">
            <label class="control-label">Nombre</label>
            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ old('name', $user->name) }}">
            @if ($errors->has('name'))
                <span class="form-control-feedback text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-md-6">
            <label class="control-label">Apellidos</label>
            <input class="form-control {{ $errors->has('surnames') ? 'is-invalid' : '' }}" type="text" name="surnames" value="{{ old('surnames', $user->surnames) }}">
            @if ($errors->has('surnames'))
                <span class="form-control-feedback text-danger">
                    <strong>{{ $errors->first('surnames') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group col-md-12">
            <label class="control-label">Correo</label>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" value="{{ old('email', $user->email) }}">
            @if ($errors->has('email'))
                <span class="form-control-feedback text-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <input name="_method" type="hidden" value="PUT">
        <button class="btn btn-primary col-md-2" type="submit" name="">
                <i class="fa fa-check"></i>
                Actualizar
        </button>
    </form>
</div>
@endsection