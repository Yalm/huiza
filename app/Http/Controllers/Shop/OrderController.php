<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

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
        $data = Crypt::decrypt($id);
        $order = Order::findOrFail($data['id']);

        return view('shop.profile.orders.upload',[
            'order' => $order
        ]);
    }
    public function canceled($id)
    {
        $data = Crypt::decrypt($id);
        $order = Order::findOrFail($data['id']);
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

            $voucher = $request->file('voucher');
            Storage::disk('s3')->put('ik9e3iowcy4l/vouchers', $voucher,'public');

            $order->voucher = 'vouchers/'.$voucher->hashName();
            $order->state_id = '4';
            $order->save();

            return back()->with('success', 'Comprobante de pago subido con extio!');
        }
        return back();
    }

    public function show($id)
    {
        $data = Crypt::decrypt($id);
        $order = Order::findOrFail($data['id']);
        $note = $order->notes()->latest()->take(1)->first();

        return view('shop.profile.orders.show',[
            'order' => $order,
            'note' => $note
        ]);
    }
}
