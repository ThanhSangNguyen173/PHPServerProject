<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $hello = 'hello thuận';

        try {
            $user = auth()->userOrFail(); 
        } catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
            return response()->json(['error'=>$e->getMessage()]);
        }

        return $hello;
    }
}
