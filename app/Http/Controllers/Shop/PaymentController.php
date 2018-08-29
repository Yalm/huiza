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
use Culqi\Culqi;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\OrderRequest;

class PaymentController extends Controller
{
    public function checkout()
    {
        $cart = Cart::content();
        $total = Cart::subtotal(2,'.','');
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
        else if($request->credit_card)
        {
            return $this->creditCard($request);
        }
    }

    public function deposit($request)
    {
        
        $meOrder = $this->createOrder($request,3);    
              
        return view('shop.checkout.success',[
            'order' => $meOrder
        ]);
    }

    public function creditCard($request)
    {
        $total = Cart::subtotal(2,'.','');

		$SECRET_KEY = "sk_test_yRUOhX9NUHbRCFOc";

		$culqi = new Culqi(array('api_key' => $SECRET_KEY));

		$culqi->Charges->create(
			array(
				"amount" => $total * 100,
				"capture" => true,
				"currency_code" => "PEN",
				"description" => "Ventas En Línea Comercial Huiza",
				"email" => Auth('web')->user()->email,
				"installments" => 0,
				"source_id" => $request->token
			  )
           );

        $meOrder = $this->createOrder($request,2); 

        $returnHTML = view('shop.checkout.success_card')->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function createOrder($request,$state)
	{
		        
        $order = Order::create([
            'customer_id' => Auth::user()->id,
            'name' => $request->name,
            'surnames' => $request->surnames,
            'phone' => $request->phone,
            'note_customer' => $request->note_customer,
            'state_id' => $state,
        ]);
        
		$meOrder = Order::find($order->id);
		
		if($request->credit_card)
		{
			foreach(Cart::content() as $product) 
			{
				$productFind = Product::findOrFail($product->id);
				$productFind->stock = $productFind->stock - $product->qty;
				$productFind->save();
				
				$meOrder->products()->attach($product->id,['quantity' => $product->qty]);
			}
		}
		else if($request->deposit)
		{
            $meOrder->sendOrderNotification($meOrder);
            
			foreach(Cart::content() as $product) 
			{
				$meOrder->products()->attach($product->id,['quantity' => $product->qty]);
			}
		}
        
        Cart::destroy(); 	
        
        return $meOrder;
	}

}
