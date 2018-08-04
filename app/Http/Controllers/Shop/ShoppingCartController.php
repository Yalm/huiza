<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

class ShoppingCartController extends Controller
{
    public function index() 
    {
		$products = Cart::content();
		$total = Cart::subtotal();
		
		return view('shop.shopping_cart',[
			'products' => $products,
			'total' => $total,
		]);

	}
	
    public function store(Request $request)
    {
		$qty =  (!$request->qty) ? 1 : $request->qty; 
		$product = Product::findOrFail($request->product_id);
		$cart = Cart::content()->where('id', $request->product_id)->first();
		
		$itemQty = (!$cart) ? null : $cart->qty; 

		/* message error stock */
		$stockError = new \stdClass();
		$stockError->message = 'Producto agotado';
		$stockError->image = url('images/stockError.jpg');

		/* sold out validatopn */
		if($product->stock <= 0)
		{
			return response()->json($stockError);
		}
		
		if(!empty($itemQty))
		{
			if($itemQty + $qty > $product->stock)
			{
				$stockError->message = 'Stock superado';
				return response()->json($stockError);
			}
		}
      
		Cart::add( $product->id , $product->name ,$qty, $product->price,['img' => $product->image,'stock' => $product->stock] );
		$count_cart = Cart::count();

      	return response()->json(['product' => $product, 'count_cart' => $count_cart]);
	}
	
    public function destroy($id)
    {
		Cart::remove($id);
		$total = Cart::subtotal();
		$count_cart = Cart::count();
		return response()->json(['total' => $total, 'count_cart' => $count_cart]);
	}
	
    public function editCart(Request $request)
    {
		foreach($request->rowId as $index => $id) 
		{
			$qty = isset($request->qty[$index]) ? $request->qty[$index] : null;
			Cart::update($id, $qty);      
		}
		return back();
    }
}
