<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OrderItems;
use App\Models\Products;

class AdminOrderItemsController extends Controller
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
        $order_item = OrderItems::all();
        return response()->json($order_item);
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
        $products = Products::findOrFail($request->products_id);
        $price = $products->price;
        $order_item = OrderItems::create([
            'products_id'=>$request->products_id,
            'quantity'=>$request->quantity,
            'bill_id'=>$request->bill_id,
            'total'=>$price*$request->quantity,]);
        return response()->json($order_item, 201);
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
        $order_item = OrderItems::findOrFail($id);
        return response()->json($order_item);
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
        $order_item = OrderItems::findOrFail($id);
        $order_item->update($request->all());
        $order_item->save();

        return response()->json($OrderItems);
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
        $order_item = OrderItems::findOrFail($id);
        $order_item->delete();

        return response()->json($order_item);
    }
}
