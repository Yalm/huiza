<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;
use Hash;

class CustomerController extends Controller
{
    public function profile()
    {
        $customer = Auth('web')->user();
        return view('profile.welcome',[
            'customer' => $customer
        ]);
    }
    public function account()
    {
        $customer = Auth('web')->user();
        return view('profile.account',[
            'customer' => $customer
        ]);
    }

    public function orders()
    {
        $customer = Auth('web')->user();
        return view('profile.orders.index',[
            'customer' => $customer
        ]);

    }

    public function changeDataCustomer(Request $request)
    {
        $customer = Customer::findOrFail($request->id);
        $customer->name = $request->name;
        $customer->surnames = $request->surnames;
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
