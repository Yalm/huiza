<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
       /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = Auth::guard('api')->attempt($credentials)) 
        {
            return response()->json(['error' => 'No autorizado'], 401);
        }
        else if(!Auth::guard('api')->user()->verified)
        {
            Auth::guard('api')->logout();
            return response()->json(['error' => 'Debes confirmar tu cuenta Le hemos enviado un código de activación, verifique su correo electrónico.'], 401);
        }
        else if(!Auth::guard('api')->user()->actived)
        {
            Auth::guard('api')->logout();
            return response()->json(['error' => 'Lo sentimos, su cuenta a está suspendida'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::guard('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    public function register(Request $request)
    {
        $customer = Customer::create([
        	'name' => $request->name,
        	'email' => $request->email,
        	'password' => Hash::make($request->password),
        ]);
        
        $verifyCustomer = VerifyCustomer::create([
            'customer_id' => $customer->id,
            'token' => str_random(40)
        ]);
 
        Mail::to($customer->email)->send(new VerifyMail($customer));
        
        return response()->json(['error' => 'Se le envio un correo de confirmacion, por favor revise su correo.']);
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
