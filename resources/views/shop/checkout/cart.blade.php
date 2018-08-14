<div class="col-md-6 p-tb-20">
    <div class="table-responsive checkout-review-order">
        <table class="table_ch cl5">
            <thead>
                <tr>
                    <th>PRODUCTO</th>
                    <th class="text-right">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $product)
                <tr class="cart_items">
                    <td class="text_comer_h">{{ "$product->name x $product->qty" }}</td>
                    <td class="text-right">{{ "S/. $product->price"}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="cart-subtotal">
                    <th>SUBTOTAL</th>
                    <td>
                        <b class="amount">
                            {{ "S/.$total"}}
                        </b>
                    </td>
                </tr>		
                <tr class="order-total">
                    <th>TOTAL</th>
                    <td>
                        <span class="amount">
                            {{ "S/.$total"}}
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>
        <div class="form-check">
            <label class="custom-control custom-radio">
                <input id="radioStacked1" name="deposit" type="radio" checked class="custom-control-input">
                <span class="custom-control-indicator" style="background-color: #212529;"></span>
                <span class="custom-control-description cl5 font-weight-bold">Transferencia Bancaria Directa</span>
            </label>
            <p class="p-l-25">Realiza tu pago directamente en nuestra cuenta bancaria. Por favor usa 
                la referencia del pedido como referencia de pago. Tu pedido no será procesado 
                hasta que el importe haya sido recibido en nuestra cuenta.</p>
            <hr>
        </div>
        
        <div class="custom-control custom-checkbox font-weight-bold cl5 p-b-10">
            <input type="checkbox" class="custom-control-input" required id="customControlAutosizing">
            <span class="custom-control-indicator"></span>
            <label class="custom-control-label" for="customControlAutosizing">
            He leído y estoy de acuerdo con los <a href="#" class="hover_ch">términos y condiciones</a> de la web
            </label>
        </div>
        <button type="submit" {{ $customer->verifiedData() ? '' : 'disabled' }}
            class="flex-c-m stext-101 cl0 size-121 bg3 bor1 
            hov-btn3 p-lr-15 trans-04 pointer btn_ch">
            REALIZAR PEDIDO
        </button>
    </div>   
</div>