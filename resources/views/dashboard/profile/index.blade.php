@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card card_ch">
                            <div class="card-body">
                                <div class="card-two">
                                    <header>
                                        <div class="avatar">
                                            <img src="{{ asset('images/avatar.png') }}" alt="Allison Walker">
                                        </div>
                                    </header>
                                    <h3 class="text-white">{{ Auth::guard('user')->user()->name }}</h3>
                                    <div class="desc">
                                        Comercial Huiza - Compra Online productos con grandes ofertas.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card card_ch">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Configuración</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Cambiar Contraseña</a> </li>                                
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <form class="card-body my-3">
                                        <div class="form-group">
                                            <label class="form-label">Contraseña Actual</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nueva Contraseña</label>
                                            <input type="password"  class="form-control" name="new_password" >
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Confimar Nueva Contraseña</label>
                                            <input type="password" class="form-control" name="new_password_confirmation">
                                        </div>
                                        <button class="btn btn-primary">Cambiar Contraseña</button>                                          
                                    </form>
                                </div>
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body my-3">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Nombre</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="name" class="form-control form-control-line"  value="{{ Auth::guard('user')->user()->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Correo</label>
                                                <div class="col-md-12">
                                                    <input type="email" class="form-control form-control-line" name="email" id="example-email" value="{{ Auth::guard('user')->user()->email }}">
                                                </div>
                                            </div>     
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-primary">Actualizar Perfil</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <!-- End PAge Content -->
            </div>
@endsection