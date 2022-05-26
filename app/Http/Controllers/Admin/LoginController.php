<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $creds = $request->only(['username', 'password']);
        
        if(!$token = auth()->attempt($creds)){
            return response()->json(['user'=>null,'token' => 'None','message'=>'Failed'], 401);
        }
        
        $info = Auth::user();
        return response()->json(['user'=>$info,'token' => $token, 'message'=>'Success'], 200);
    }

    public function logout ()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
