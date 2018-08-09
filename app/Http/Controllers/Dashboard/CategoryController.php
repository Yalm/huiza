<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.category.index',[
          'categoriesCrud' => $categories,
        ]);
    }

    public function create()
    {

    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create([
          'name' =>$request->name
        ]);

        return response()->json($category);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name =$request->name;
        $category->save();

        return response()->json($category);
    }

    public function destroy($id)
    {
        $cateogry = Category::findOrFail($id);

        if($cateogry->products()->count() > 0)
        {
            return back()->with('error','¡Error!, Su categoría esta relacionada.');
        }

        $cateogry->delete();

        return back()->with('success','Su categoría ha sido eliminada con éxito.');
    }
}
