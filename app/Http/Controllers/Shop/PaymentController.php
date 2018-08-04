<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Customer;
use Auth;
use App\Order;
use App\Product;

use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    public function checkout()
    {
        $cart = Cart::content();
        $total = Cart::subtotal();
        $customer = Customer::findOrFail(Auth::user()->id);
        return view('shop.checkout.index',[
            'customer' => $customer,
            'cart' => $cart,
            'total' => $total
        ]);
    }
    public function sucess(Request $request)
    {
        if($request->deposit)
        {
            return $this->deposit($request);
        }
        else
        {

        }
    }

    public function deposit($request)
    {
        
        $order = Order::create([
            'customer_id' => Auth::user()->id,
            'name' => $request->name,
            'surnames' => $request->surnames,
            'email' =>$request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'state' => 'falta de pago',
            'total' => Cart::subtotal(2,'.','')
        ]);
        
        $meOrder = Order::find($order->id);
        foreach(Cart::content() as $product) 
        {
            $meOrder->products()->attach($product->id,['quantity' => $product->qty]);
        }

        Cart::destroy();        
        
        return view('shop.checkout.sucess');
    }

}
