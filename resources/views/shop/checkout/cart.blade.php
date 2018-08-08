<div class="col-md-5 p-tb-20">
    <div class="table-responsive checkout-review-order">
        <table class="table cl5">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $product)
                <tr>
                    <td>{{ "$product->name x $product->qty" }}</td>
                    <td>{{ "S/. $product->price"}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="cart-subtotal">
                    <th>Subtotal</th>
                    <td>
                        <b class="amount">
                            {{ "S/.$total"}}
                        </b>
                    </td>
                </tr>		
                <tr class="order-total">
                    <th>Total</th>
                    <td>
                        <span class="amount">
                            {{ "S/.$total"}}
                        </span>
                    </td>
                </tr>
            </tfoot>
        </table>
        <button type="submit" 
            class="flex-c-m stext-101 cl0 size-121 bg3 bor1 
            hov-btn3 p-lr-15 trans-04 pointer">
            REALIZAR PEDIDO
        </button>
    </div>   
</div>