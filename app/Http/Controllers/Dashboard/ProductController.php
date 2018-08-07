<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Image;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
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
      $imagen =$request->file('image');
      $NombreImagen = $imagen->hashName();
      Image::make($imagen)->resize(1200,1485)->save("images/products/$NombreImagen");

        Product::create([
          'name' =>$request->name,
          'price' =>$request->price,
          'image' =>"images/products/$NombreImagen",
          'stock' =>$request->stock,
          'description' =>$request->description,
          'characteristics' =>$request->characteristics,
          'category_id' =>$request->category
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
          \File::delete($product->image);
          $image =$request->file('image');
          $NombreImagen = $image->hashName();
          Image::make($image)->resize(1200,1485)->save("images/products/$NombreImagen");
          $product->image ="images/products/$NombreImagen";
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
        $product = Product::find($id);
        \File::delete($product->image);
        $product->delete();
        return back()->with('success','Su producto ha sido eliminado con éxito.');
    }
}
