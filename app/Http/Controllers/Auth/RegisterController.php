<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\VerifyCustomer;
use App\Mail\VerifyMail;
use Mail;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $customer =  Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $verifyCustomer = VerifyCustomer::create([
            'customer_id' => $customer->id,
            'token' => str_random(40)
        ]);
 
        Mail::to($customer->email)->send(new VerifyMail($customer));
 
        return $customer;

    }
    public function verifyCustomer($token)
    {
        $verifyCustomer = VerifyCustomer::where('token', $token)->first();
        if(isset($verifyCustomer))
        {
            $customer = $verifyCustomer->customer;
            if(!$customer->verified) 
            {
                $verifyCustomer->customer->verified = 1;
                $verifyCustomer->customer->save();
                $status = "Su correo electrónico esta verificado Ahora puede iniciar sesión.";
            }
            else
            {
                $status = "Su correo electrónico ya está verificado Ahora puede iniciar sesión.";
            }
        }
        else
        {
            return redirect('/login')
                    ->with('warning', "Lo siento, su correo electrónico no puede ser identificado.");
        }
 
        return redirect('/login')->with('status', $status);
    }

    
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')
                ->with('status', 'Le enviamos un código de activación. Verifique su correo electrónico y haga clic en el enlace para verificar.');
    }
}
