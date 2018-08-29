<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products->each(function($products)
        {
            $products->category;
            $products->image = url($products->image);
        });
        return   $products;     
    }
}

