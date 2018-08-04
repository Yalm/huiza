<div class="col-md-7">
    <div class="form-row p-tb-20">
        <div class="col-md-12">
            <h2 class="p-b-30 cl5">DETALLES DE FACTURACIÓN</h2>    
        </div>
        <input type="hidden" name="id" value="{{ $customer->id }}">
        <div class="form-group col-md-6">
            <label class="cl5 stext-101" for="inputEmail4">NOMBRE</label>
            <input type="text" class="form-control" required name="name"
                    id="inputEmail4" placeholder="NOMBRE" 
                    value="{{ $customer->name }}">
        </div>
        <div class="form-group col-md-6">
            <label class="cl5 stext-101" for="inputPassword4">APELLIDOS</label>
            <input  type="text" class="form-control" name="surnames" value="{{ $customer->surnames }}"
                    id="inputPassword4" placeholder="APELLIDOS">
        </div>
        <div class="form-group col-md-12 ">
            <label class="cl5 stext-101" for="inputEmail">CORREO ELECTRÓNICO</label>
            <input type="text" class="form-control" required name="email"
                    readonly id="inputEmail" 
                    value="{{ $customer->email}}">
        </div>
        <div class="form-group col-md-6 ">
            <label class="cl5 stext-101" for="inputPhone">TELEFONO/CELULAR</label>
            <input type="text" class="form-control" required 
                    id="inputPhone" name="phone"
                    value="{{ $customer->phone}}">
        </div>
                <div class="form-group col-md-6">
            <label class="cl5 stext-101" for="inputAddress">DIRECCIÓN</label>
            <input type="text" class="form-control" required 
                    id="inputAddress" name="address"
                    value="{{ $customer->address }}">
        </div>
    </div>
</div>