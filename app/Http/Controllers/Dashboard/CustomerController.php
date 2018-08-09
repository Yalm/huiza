<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('dashboard.customer.index',[
            'customers' => $customers
        ]);
    }
}
