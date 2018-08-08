<div class="form-row p-tb-20">
    <div class="col-md-12">
        <h2 class="cl5">DETALLES DE FACTURACIÓN</h2> 
        <h5 class="my-4">Estos datos se usaran para la gestión de su pedido(llamadas y envíos de correo).</h5>   
    </div>
    <input type="hidden" name="id" value="{{ $customer->id }}">
    <div class="form-group col-md-6">
        <label class="cl5 stext-101" for="inputEmail4">NOMBRE</label>
        <input type="text" class="form-control" required name="name"
                id="inputEmail4" placeholder="NOMBRE" 
                value="{{ $customer->name }}">
        @if ($errors->has('name'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label class="cl5 stext-101" for="inputPassword4">APELLIDOS</label>
        <input  type="text" required class="form-control" name="surnames" value="{{ $customer->surnames }}"
                id="inputPassword4" placeholder="APELLIDOS">
    </div>
    <div class="form-group col-md-12 ">
        <label class="cl5 stext-101" for="inputEmail">CORREO ELECTRÓNICO</label>
        <input type="email" class="form-control" required name="email"
                id="inputEmail" 
                value="{{ $customer->email}}">
        @if ($errors->has('email'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-6 ">
        <label class="cl5 stext-101" for="inputPhone">TELEFONO/CELULAR</label>
        <input type="text" class="form-control" required 
                id="inputPhone" name="phone"
                value="{{ $customer->phone}}">
        @if ($errors->has('phone'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
        <div class="form-group col-md-6">
        <label class="cl5 stext-101" for="inputAddress">DIRECCIÓN</label>
        <input type="text" class="form-control" required 
                id="inputAddress" name="address"
                value="{{ $customer->address }}">
        @if ($errors->has('address'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>