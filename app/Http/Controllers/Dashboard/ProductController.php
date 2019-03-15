<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Image;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $products->each(function($product){
            $product->image = Storage::disk('s3')->url($product->image);
        });
        return view('dashboard.product.index',[
          'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.product.create', [
          'categories' => $categories,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $image = $request->file('image');
        $name = $image->hashName();
        $image_thumb = Image::make($image)->resize(1200,1485)->stream();
        $path = Storage::disk('s3')->put("ik9e3iowcy4l/products/$name", $image_thumb->__toString(),'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => "products/$name",
            'stock' => $request->stock,
            'description' => $request->description,
            'characteristics' => $request->characteristics,
            'category_id' => $request->category
        ]);
        return redirect('admin/product')->with('success','Su producto ha sido creado con éxito.');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('dashboard.product.edit',[
          'product' => $product,
          'categories' => $categories
        ]);
    }


    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        if($request->hasFile('image'))
        {
            Storage::disk('s3')->delete($product->image);
            $image_thumb = Image::make($image)->resize(1200,1485)->stream();
            $product->image = Storage::disk('s3')->put('products', $image_thumb->__toString());
        }
        $product->name =$request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->characteristics = $request->characteristics;
        $product->stock = $request->stock;
        $product->category_id = $request->category;

        $product->save();

        return redirect('admin/product')->with('success','Su producto ha sido actualizado con éxito.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if($product->orders()->count() > 0)
        {
            return back()->with('error','¡Error!, Su producto esta relacionado.');
        }
        Storage::disk('s3')->delete($product->image);
        $product->delete();
        return back()->with('success','Su producto ha sido eliminado con éxito.');
    }
}
