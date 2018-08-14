<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserLoginController extends Controller
{
    public function __construct() 
    {
        $this->middleware('guest:user',['except' => ['logout']]);
    }

	public function showLoginForm() 
	{
    	return view('auth.user_login');
    }

    public function login(Request $request)
    {
		$this->validate($request,[
			'email' => 'required|email',
			'password' => ' required|min:6'
		]);
		if (Auth::guard('user')->attempt([
			'email' => $request->email, 
			'password' => $request->password],
			$request->remember)) 
		{
			if (!Auth::guard('user')->user()->actived) 
			{
				Auth::guard('user')->logout();
				return back()
						->with('error','Lo sentimos, su cuenta a está suspendida.');
			}

			return redirect()->intended(route('user.dashboard'));
		}
		else 
		{
			return redirect()->back()->withInput($request->only('email','remember'));
		}
    }

    public function logout()
    {
		Auth::guard('user')->logout();
		return redirect('/');
    }
}
