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
        $products->each(function($product)
        {
            $product->category;
            $product->image = url($product->image);
        });
        return   $products;
    }
}

