<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Image;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $customer = Auth('web')->user();
        $orders = Order::where('customer_id',$customer->id)->paginate(4);

        return view('profile.orders.index',[
            'orders' => $orders
        ]);
    }

    public function showUpload($id)
    {
        $order = Order::find($id);
        return view('profile.orders.upload',[
            'order' => $order
        ]);
    }
    public function canceled($id)
    {
        $order = Order::findOrfail($id);
        $order->state = 'cancelado';
        $order->save();

        return back()->with('success','Pedido Cancelado');
    }

    public function upload(Request $request,$id)
    {
        if($request->hasFile('boucher')) 
        {
            $order = Order::find($id);

            $boucher =$request->file('boucher');
            $boucherHash = $boucher->hashName();
            Image::make($boucher)->save("images/bouchers/$boucherHash");

            $order->boucher = "images/bouchers/$boucherHash";
            $order->state = 'pendiente de revisión';
            $order->save();

            return back()->with('success', 'Comprobante de pago subido con extio!');
        }
        return back();
    }
    public function show($id)
    {
        $order = Order::find($id);
        return view('profile.orders.show',[
            'order' => $order,
        ]);
    }
}
