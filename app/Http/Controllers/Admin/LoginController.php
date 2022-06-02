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

        if ($request->username == 'admin' || $request->username == 'sang' ) {
                if(!$token = auth()->claims(['roles' => 'admin'])->attempt($creds)){
                    return response()->json(['user'=>'null','token' => 'null','message'=>'Failed'], 401);
                }
        }else{
                if(!$token = auth()->claims(['roles' => 'member'])->attempt($creds)){
                return response()->json(['user'=>'null','token' => 'null','message'=>'Failed'], 401);
                }
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
