<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->only(['username', 'password']);
        
        if(!$token = auth()->attempt($creds)){
            return response()->json(['error' => 'Incorrect username/password'], 401);
        }

        return response()->json(['token' => $token]);
    }

    public function logout ()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
