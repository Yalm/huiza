<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Customer;
use App\Document;
use Auth;
use Hash;

class CustomerController extends Controller
{
    public function profile()
    {
        $customer = Auth('web')->user();
        return view('shop.profile.welcome',[
            'customer' => $customer
        ]);
    }
    public function account()
    {
        $customer = Auth('web')->user();
        $documents = Document::all();
        return view('shop.profile.account',[
            'customer' => $customer,
            'documents' => $documents
        ]);
    }

    public function orders()
    {
        $customer = Auth('web')->user();
        return view('shop.profile.orders.index',[
            'customer' => $customer
        ]);

    }

    public function changeDataCustomer(CustomerRequest $request)
    {
        $customer = Customer::findOrFail(Auth('web')->user()->id);
        $customer->name = $request->name;
        $customer->surnames = $request->surnames;
        $customer->document_id = $request->document_id;
        $customer->document_number = $request->document_number;
        $customer->phone = $request->phone;
        $customer->save();

        return redirect()->back()->with("successCustomer","Información cambiada con éxito!");
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva contraseña no puede ser igual a su contraseña actual. Por favor, elija una contraseña diferente.");
        }
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Contraseña cambiada con éxito !");
 
    }
}
