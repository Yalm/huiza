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

        $pdf = PDF::loadView('dashboard.report.top_product', compact('products'));
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
