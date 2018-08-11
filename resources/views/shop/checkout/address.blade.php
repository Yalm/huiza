<div class="form-row p-tb-20">
    <div class="col-md-12">
        <h2 class="cl5 font-weight-bold p-b-30">DETALLES DE FACTURACIÓN</h2> 
    </div>
    <input type="hidden" name="id" value="{{ $customer->id }}">
    <div class="form-group col-md-6">
        <label class="cl5 stext-101" for="inputEmail4">NOMBRE*</label>
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
        <label class="cl5 stext-101" for="inputPassword4">APELLIDOS*</label>
        <input  type="text" required class="form-control" name="surnames" value="{{ $customer->surnames }}"
                id="inputPassword4" placeholder="APELLIDOS">
    </div>
    <div class="form-group col-md-6 ">
        <label class="cl5 stext-101" for="inputEmail">CORREO ELECTRÓNICO*</label>
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
        <label class="cl5 stext-101" for="inputPhone">TELEFONO/CELULAR*</label>
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
        <label class="cl5 stext-101" for="exampleFormControlSelect1">Documento de identidad*</label>
        <select class="form-control" id="exampleFormControlSelect1" name="document_id">
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
        <label class="cl5 stext-101" for="document_number">Numero de documento*</label>
        <input type="text" class="form-control" required 
                id="document_number" name="document_number"
                value="{{ $customer->address }}">
        @if ($errors->has('document_number'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('document_number') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12 p-t-30">
        <label class="cl5 stext-101" for="exampleFormControlTextarea1">NOTAS DEL PEDIDO (OPCIONAL)</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note_customer">{{ old('note') }}</textarea>
    </div>
</div>