<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = auth()->userOrFail(); 
        } catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
        $users = Users::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        try {
            $user = auth()->userOrFail(); 
        } catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
        $users = Users::create([
            'full_name'=>$request->full_name,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'DOB'=>$request->DOB,]);
        $users_list =  Users::all();
        return response()->json(['User_list' => $users_list, 'message'=>'Resigen Success'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = auth()->userOrFail(); 
        } catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
        $users=Users::findOrFail($id);
        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = auth()->userOrFail(); 
        } catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
        $users=Users::findOrFail($id);
        $users->update([  
            'full_name'=>$request->full_name,
            'username'=>$request->username,
            'email'=>$request->email,
            'DOB'=>$request->DOB,]);
            if($request->password!=null){
             $users->update(['password'=>bcrypt($request->password)]);
            }
            
        $users->save();
        return response()->json($users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = auth()->userOrFail(); 
        } catch(\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
        $users = Users::findOrFail($id);
        $users->delete();
        return response()->json($users);
    }

    // public function login(Request $request)
    // {
    //     $arr=['username'=>$request->username,'password'=>$request->password];
    //     $user=$request['user'];
    //     $password=$request['password'];

    //     if(Auth::attempt($arr)){
    //         $info = Auth::user();
    //         return response()->json(['user'=>$info,'message'=>'Success'], 200);
    //     }else{
    //         $info = Auth::user();
    //         return response()->json(['user'=>$info,'message'=>'Failed'], 200);
    //     }
        
    // }
}
