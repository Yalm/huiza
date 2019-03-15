<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::where('stock', '>', 0)->latest()->take(8)->get();
        $categories = Category::latest()->take(6)->get();

        $products->each(function($product)
        {
            $product->image = Storage::disk('s3')->url($product->image);
        });

        return view('shop.welcome',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product->image = Storage::disk('s3')->url($product->image);

        return view('shop.show_product',
        [
            'product' => $product,
        ]);
    }

    public function shop()
    {
        $products = Product::where('stock', '>', 0)->latest()->paginate(12);
        $categories = Category::all();

        $products->each(function($product)
        {
            $product->image = Storage::disk('s3')->url($product->image);
        });

        return view('shop.shop',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function about()
    {
        return view('shop.about');
    }

    public function contact()
    {
        return view('shop.contact');
    }

    public function terms()
    {
        return view('shop.terms_and_conditions');
    }

    public function sendContact(Request $request)
    {
        Mail::send('emails.contact-us',
        [
            'email' => $request->email,
            'user_message' => $request->message,
        ], function($message) use($request)
        {
            $message->from($request->email);
            $message->to('i2917724@continental.edu.pe', 'Admin')->subject('Mensaje de Contáctanos');
        });
        return back()->with('success', '¡Gracias por contactarnos!');

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::with('category')->where('name' ,'LIKE', "%$query%")->paginate(10);

        $products->each(function($product)
        {
            $product->image = Storage::disk('s3')->url($product->image);
        });

        return view('shop.shop',[
            'products' => $products,
        ]);
    }

    public function searchCategory($name)
    {
        $category = Category::SearchCategory($name)->first();
        $products = $category->products()->paginate(12);

        $products->each(function($product)
        {
            $product->image = Storage::disk('s3')->url($product->image);
        });

        $categories = Category::all();

        return view('shop.shop',[
            'products' => $products,
            'categories' => $categories
        ]);
    }

}
