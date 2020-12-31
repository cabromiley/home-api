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
                'user' => [
                    'name' => $user->name
                ]
            ], 200);
        }

        return response([
            'authenticated' => false,
            'user' => []
        ], 401);
    }
}
