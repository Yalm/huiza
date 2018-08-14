<form class="row" method="post" action="{{ route('changeDataCustomer') }}">
@csrf
     @if (session('successCustomer'))
        <div class="alert alert-success col-md-12">
            {{ session('successCustomer') }}
        </div>
    @endif
    <input type="hidden" name="id" value="{{ $customer->id }}">
    <input type="hidden" name="email" value="{{ $customer->email }}">
    <div class="form-group col-md-6">
        <label class="cl5 stext-101" for="inputEmail4">NOMBRE*</label>
        <input type="text" class="form-control" required name="name"
                id="inputEmail4" placeholder="NOMBRE" 
                value="{{ old('name', $customer->name) }}">
        @if ($errors->has('name'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label class="cl5 stext-101" for="inputPassword4">APELLIDOS*</label>
        <input  type="text" required class="form-control" name="surnames" value="{{ old('surnames', $customer->surnames) }}"
                id="inputPassword4" placeholder="APELLIDOS">
        @if ($errors->has('surnames'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group col-md-12">
        <label class="cl5 stext-101" for="inputPhone">TELEFONO/CELULAR*</label>
        <input type="text" class="form-control" required 
                id="inputPhone" name="phone"
                value="{{ old('phone', $customer->phone) }}">
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
                value="{{ old('document_number', $customer->document_number) }}">
        @if ($errors->has('document_number'))
            <span class="help-block text-danger">
                <strong>{{ $errors->first('document_number') }}</strong>
            </span>
        @endif
    </div>
    <input name="_method" type="hidden" value="PUT">
    <button type="submit" 
            class="col-md-3 flex-c-m stext-101 cl0 size-121 bg3 bor1 
            hov-btn3 p-lr-15 trans-04 pointer">
            Actualizar datos
    </button>
</form>