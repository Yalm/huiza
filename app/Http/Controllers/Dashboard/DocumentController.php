<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Document;
use App\Http\Requests\DocumentRequest;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('dashboard.document.index',[
          'documents' => $documents,
        ]);
    }

    public function store(DocumentRequest $request)
    {
        $document = Document::create([
          'name' =>$request->name
        ]);

        return response()->json($document);
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return response()->json($document);
    }

    public function update(DocumentRequest $request, $id)
    {
        $document = Document::findOrFail($id);
        $document->name =$request->name;
        $document->save();

        return response()->json($document);
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        if($document->customers()->count() > 0)
        {
            return back()->with('error','¡Error!, Documento de identidad relacionado.');
        }

        $document->delete();

        return back()->with('success','Su Documento de identidad ha sido eliminado con éxito.');
    }
}
