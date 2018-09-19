<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Order;
use App\Product;

class ReportController extends Controller
{
    public function index()
    {
        return view('dashboard.report.index');
    }

    public function topProduct(Request $request)
    {
        $products = Product::top7Product($request->date_init,$request->date_end);

        $pdf = PDF::loadView('dashboard.report.top_product',[
            'products' =>$products,
            'date_init' => $request->date_init,
            'date_end' => $request->date_end
        ]);
        return $pdf->stream('listado.pdf');
    }

    public function topCustomer(Request $request)
    {
        $customers = Order::topCustomer($request->date_init,$request->date_end);

        $pdf = PDF::loadView('dashboard.report.top_customer',[
            'customers' =>$customers,
            'date_init' => $request->date_init,
            'date_end' => $request->date_end
        ]);
        return $pdf->stream('listado.pdf');
    }

    public function purchases(Request $request)
    {
        $orders = Order::purchases($request->date_init,$request->date_end);

        $orders->each(function($orders)
        {
            if($orders->state_id == 2 && $orders->voucher == null)
            {
                $orders->method = 'Tarjeta de credio';
            }
            else
            {
                $orders->method = 'Deposito bancario';
            }
            $orders->total = $orders->getTotalPrice();

        });

        $total = $orders->sum('total');

        $pdf = PDF::loadView('dashboard.report.purchases',[
            'orders' =>$orders,
            'date_init' => $request->date_init,
            'date_end' => $request->date_end,
            'total' => $total
        ]);
        return $pdf->stream('listado.pdf');
    }

    public function topProductDownload()
    {
        $products = Product::top7Product();

        $pdf = PDF::loadView('dashboard.report.top_product', compact('products'));
        return $pdf->download('listado.pdf');
    }

    public function orders()
    {

    }
    
}
