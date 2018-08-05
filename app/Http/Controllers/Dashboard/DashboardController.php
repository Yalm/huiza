<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Order;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_count = Product::all()->count();
        $order_count = Order::all()->count();
        $customer_count = Customer::all()->count();
        return view('dashboard.index',[
            'product_count' => $product_count,
            'order_count' => $order_count,
            'customer_count' => $customer_count
        ]);
    }
}
