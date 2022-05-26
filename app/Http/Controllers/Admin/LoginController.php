<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerJWT;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Auth;

class LoginController extends ControllerJWT
{
    //
    public function login(Request $request)
    {
        $creds = $request->only(['username','password']);

        //$token = auth()->attempt($creds);
        if(!$token = auth()->attempt($creds))
        {
            return response()->json(['error'=> 'incorrect email/password','message'=>'Faile'],401); 
        }else if ($token = auth()->attempt($creds)){
            $user=Auth::user();
            $user->ForceFill(['remember_token'=>$token])->save();
            return response()->json(['token' => $token,'message'=>'Success'], 200);
        }else{
            return response()->json(['message'=>'Success'], 200);
        }

    }

    
    public function userinfo()//public function userinfo($id)
    {    
        // $posts = response()->json(auth()->user());
        // try{
        //     $user=auth()->userOrFail();
        // }catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedExceptions $e){
        //     return response()->json(['error'=>$e->getMessage()]);
        // }
       //return $posts;

       return response()->json(['user' => Auth::user(),]);

    }

    public function logout(Request $request)
    {
        $request->user()->ForceFill(['remember_token'=>null,])->save();  // $user=Auth::user();$user->ForceFill(['remember_token'=>null])->save();//
        Auth::logout();
        return response()->json([
            'message' => 'logged out success',
        ]);
    }

}
