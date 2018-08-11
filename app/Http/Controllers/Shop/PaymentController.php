<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Customer;
use Auth;
use App\Order;
use App\Product;
use App\Document;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\OrderRequest;

class PaymentController extends Controller
{
    public function checkout()
    {
        $cart = Cart::content();
        $total = Cart::subtotal();
        $customer = Customer::findOrFail(Auth::user()->id);
        $documents = Document::all();

        return view('shop.checkout.index',[
            'customer' => $customer,
            'cart' => $cart,
            'total' => $total,
            'documents' => $documents
        ]);
    }
    public function sucess(OrderRequest $request)
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
            'document_id' => $request->document_id,
            'document_number' => $request->document_number,
            'phone' => $request->phone,
            'note_customer' => $request->note_customer,
            'state_id' => '3',
        ]);
        
        $meOrder = Order::find($order->id);
        foreach(Cart::content() as $product) 
        {
            $meOrder->products()->attach($product->id,['quantity' => $product->qty]);
        }

        Cart::destroy();        
        
        return view('shop.checkout.success',[
            'order' => $meOrder
        ]);
    }

}
