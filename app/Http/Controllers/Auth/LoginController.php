<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function authenticated(Request $request, $customer)
    {
        if (!$customer->verified) 
        {
            auth()->logout();
            return back()
                    ->with('warning','Debes confirmar tu cuenta Le hemos enviado un código de activación,
                                    verifique su correo electrónico.');
        }
        if (!$customer->actived) 
        {
            auth()->logout();
            return back()
                    ->with('warning','Lo sentimos, su cuenta a está suspendida.');
        }
        return redirect()->intended($this->redirectPath());
    }

    public function logout()
    {
      Auth::guard('web')->logout();
      return redirect('/');
    }
}
