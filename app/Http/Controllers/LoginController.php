<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials, $request->get('remember'))) {
            $request->session()->regenerate();
            $user = Auth::guard('web')->user();
            return response([
                'authenticated' => true,
                'user' => $user->toArray()
            ], 200);
        }

        return response([
            'authenticated' => false,
            'user' => []
        ], 401);
    }

    public function logout (Request $request)
    {
        Auth::guard('web')->logout();

        return response(null, 204);
    }
}
