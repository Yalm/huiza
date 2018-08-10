<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::guard('user')->user();
        return view('dashboard.user.profile.data',[
            'user' => $user
        ]);
    }

    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index',[
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(UserRequest $request)
    {   
        User::create([
            'name' => $request->name,
            'surnames' => $request->surnames,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('admin/user')->with('success','Su usuario ha sido añadido con éxito.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.user.edit',[
          'user' => $user
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
 
        $user->name =$request->name;
        $user->surnames = $request->surnames;
        $user->email = $request->email;
        $user->actived = $request->actived;
        
        if($request->password)
        {
            $user->password = Hash::make($request->password);            
        }

        $user->save();

        return redirect('admin/user')->with('success','Su Usuario ha sido actualizado con éxito.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();

        return back()->with('success','Su Usuario ha sido eliminado con éxito.');
    }

    public function showchangePassword()
    {
        return view('dashboard.user.profile.password');
    }
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
 
        if (!(Hash::check($request->current_password, Auth::guard('user')->user()->password))) 
        {
            // The passwords matches
            return redirect()->back()->with("error","Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.");
        }
 
        if(strcmp($request->current_password, $request->new_password) == 0)
        {
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva contraseña no puede ser igual a su contraseña actual. Por favor, elija una contraseña diferente.");
        }
 
        //Change Password
        $user = Auth::guard('user')->user();
        $user->password = bcrypt($request->new_password);
        $user->save();
 
        return redirect()->back()->with("success","Contraseña cambiada con éxito !");
 
    }

}
