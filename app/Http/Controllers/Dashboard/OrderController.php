<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\State;

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
    public function update(Request $request,$id)
    {
        $order = Order::findOrFail($id);

        $order->products()->sync($request->products);

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;

        if($request->state == 2)
        {
            foreach($order->products as $product)
            {
                if($product->pivot->quantity > $product->stock)
                {
                    return redirect()->back()->with('error',"Producto $product->name sobrepaso el stock");
                }
            }
            foreach($order->products as $product)
            {
                $productUpdate = Product::find($product->id);
                $productUpdate->stock -= $product->pivot->quantity;
                $product->save();
            }
        }

        $order->state_id = $request->states;
        $order->save();

        return redirect('admin/order');
    }
}
