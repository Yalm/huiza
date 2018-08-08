<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Image;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\OrderRequest;

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
        $this->validate($request,[
			'voucher' => 'image',
        ]);
        
        if($request->hasFile('voucher')) 
        {
            $order = Order::findOrFail($id);

            $voucher =$request->file('voucher');
            $voucherHash = $voucher->hashName();
            Image::make($voucher)->save("images/vouchers/$voucherHash");

            $order->voucher = "images/vouchers/$voucherHash";
            $order->state_id = '3';
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
