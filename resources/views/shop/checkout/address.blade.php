<div class="form-row my-3">
    <div class="col-md-12">
        <h2 class="cl5 font-weight-bold p-b-30">DETALLES DEl PEDIDO</h2> 
    </div>
    <div class="custom-control custom-checkbox font-weight-bold cl5 p-b-10 fs-18 text-uppercase">
            <input type="checkbox" {{ $errors->any() ? 'checked' : '' }} class="custom-control-input" name="other_person" id="addCustomer">
            <span class="custom-control-indicator"></span>
            <label class="custom-control-label" for="addCustomer">
                Quiero que otra persona lo recoja por mi
            </label>
    </div>

    <div class="collapse col-md-12 {{ $errors->any() ? 'show' : '' }}" id="collapseExample">
        <h5 class="cl5 my-3">Datos de la persona</h5> 
        <div class="form-group ">
            <label class="cl5 stext-101" for="inputEmail4">NOMBRE*</label>
            <input type="text" class="form-control" name="name"
                    id="inputEmail4" placeholder="NOMBRE" 
                    value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="cl5 stext-101" for="inputPassword4">APELLIDOS*</label>
            <input  type="text" class="form-control" name="surnames" value="{{ old('surnames') }}"
                    id="inputPassword4" placeholder="APELLIDOS">
            @if ($errors->has('surnames'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="cl5 stext-101" for="inputPhone">TELEFONO/CELULAR*</label>
            <input type="text" class="form-control"  
                    id="inputPhone" name="phone"
                    value="{{ old('phone') }}">
            @if ($errors->has('phone'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    <div class="form-group col-md-12">
        <label class="cl5 stext-101" for="exampleFormControlTextarea1">NOTAS DEL PEDIDO (OPCIONAL)</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note_customer">{{ old('note') }}</textarea>
    </div>
</div>