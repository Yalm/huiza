@extends('dashboard.user.profile.index')

@section('main')
<!-- Nav tabs -->
<ul class="nav nav-tabs profile-tab" role="tablist">
    <li class="nav-item"> 
        <a class="nav-link" href="{{ url('admin/profile') }}" >Configuración</a> 
    </li>
    <li class="nav-item"> 
        <a class="nav-link active" href="{{ url('admin/changePassword') }}" role="tab">Cambiar Contraseña</a> 
    </li>                                
</ul>
@if (session('error'))
    <div class="alert alert-danger my-3">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success my-3">
        {{ session('success') }}
    </div>
@endif
<form class="card-body my-3 " method="POST" action="{{ route('UserChangePassword') }}">
    @csrf
    <div class="form-group">
        <label class="form-label">Contraseña Actual</label>
        <input type="password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}" name="current_password">
        @if ($errors->has('current_password'))
                <span class="form-control-feedback text-danger">
                    <strong>{{ $errors->first('current_password') }}</strong>
                </span>
        @endif
    </div>
    <div class="form-group">
        <label class="form-label">Nueva Contraseña</label>
        <input type="password"  class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}" name="new_password" >
            @if ($errors->has('new_password'))
                <span class="form-control-feedback text-danger">
                    <strong>{{ $errors->first('new_password') }}</strong>
                </span>
        @endif
    </div>
    <div class="form-group">
        <label class="form-label">Confimar Nueva Contraseña</label>
        <input type="password" class="form-control" name="new_password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>                                          
</form>
@endsection