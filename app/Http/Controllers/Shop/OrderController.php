<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Image;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $customer = Auth('web')->user();
        $orders = Order::where('customer_id',$customer->id)->paginate(4);

        return view('shop.profile.orders.index',[
            'orders' => $orders
        ]);
    }

    public function showUpload($id)
    {
        $order = Order::find($id);
        return view('shop.profile.orders.upload',[
            'order' => $order
        ]);
    }
    public function canceled($id)
    {
        $order = Order::findOrfail($id);
        $order->state_id = '1';
        $order->save();

        return back()->with('success','Pedido Cancelado');
    }

    public function upload(Request $request,$id)
    {
        if($request->hasFile('voucher')) 
        {
            $order = Order::find($id);

            $voucher =$request->file('voucher');
            $voucherHash = $voucher->hashName();
            Image::make($voucher)->save("images/bouchers/$voucherHash");

            $order->voucher = "images/bouchers/$voucherHash";
            $order->state_id = '4';
            $order->save();

            return back()->with('success', 'Comprobante de pago subido con extio!');
        }
        return back();
    }
    
    public function show($id)
    {
        $order = Order::find($id);
        return view('shop.profile.orders.show',[
            'order' => $order,
        ]);
    }
}
