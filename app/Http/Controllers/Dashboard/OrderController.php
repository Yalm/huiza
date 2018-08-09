<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\State;
use App\Product;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.order.index',[
            'orders' => $orders
        ]);
    }
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        
        if($order->voucher)
        {
            $order->voucher = url($order->voucher);        
        }

        $states = State::all();
        
        return view('dashboard.order.edit',[
            'order' => $order,
            'states' => $states
            
        ]);
    }
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('dashboard.order.show',[
            'order' => $order
        ]);
    }
    public function update(OrderRequest $request,$id)
    {
        $order = Order::findOrFail($id);

        $order->products()->sync($request->products);

        $order->name = $request->name;
        $order->surnames = $request->surnames;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;

        if($order->state_id != 2)
        {
            if($request->states == 2)
            {
                foreach($order->products as $product)
                {
                    if($product->pivot->quantity > $product->stock)
                    {
                        return redirect()->back()
                                        ->with('error',"Producto: $product->name (stock:$product->stock) sobrepaso su stock");
                    }
                }
                foreach($order->products as $product)
                {
                    $productUpdate = Product::findOrFail($product->id);
                    $productUpdate->stock = $productUpdate->stock - $product->pivot->quantity;
                    $productUpdate->save();
                }
            }
        }
        

        $order->state_id = $request->states;
        $order->save();

        return redirect('admin/order')->with('success','Su pedido ha sido actualizado con éxito.');
    }
}
