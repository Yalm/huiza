<?php

namespace App\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cart = Cart::content();
        if($cart->isEmpty())
        {
            return redirect('/cart');
        }
        if(!Auth('web')->user()->verifiedData())
        {
            return redirect('complete_account');
        }

        return $next($request);
    }
}
