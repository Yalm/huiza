<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Customer;
use App\Document;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        $customers->each(function($customers)
        {
            if($customers->document_number)
            {
                $customers->document_number = $customers->document['name'] .':'.$customers->document_number;                
            }
        });

        return view('dashboard.customer.index',[
            'customers' => $customers
        ]);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $documents = Document::all();
        $orders = $customer->orders;

        return view('dashboard.customer.edit',[
          'customer' => $customer,
          'documents' => $documents,
          'orders' => $orders
        ]);
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
 
        $customer->name =$request->name;
        $customer->surnames = $request->surnames;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->document_id = $request->document_id;
        $customer->document_number = $request->document_number;
        $customer->actived = $request->actived;

        $customer->save();

        return redirect('admin/customer')->with('success','Su cliente ha sido actualizado con éxito.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        if($customer->orders()->count() > 0)
        {
            return back()->with('error','¡Error!, Su Cliente esta relacionado.');
        }

        $customer->delete();

        return back()->with('success','Su Cliente ha sido eliminada con éxito.');
    }

}
