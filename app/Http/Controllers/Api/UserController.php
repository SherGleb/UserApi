<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> true,'message'=> $e->getMessage()], 401);
        }
        return response()->json(User::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> true,'message'=> $e->getMessage()], 401);
        }

        $rules = [
            "name"=> "required|min:3",
            "email"=> "required|min:5",
            "password"=> "required|min:6",
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $new_user = User::create($request->all());
        return response()->json($new_user,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> true,'message'=> $e->getMessage()], 401);
        }

        $new_user = User::find($id);
        if ($new_user == null) {
            return response()->json(["message"=> "Not found"], 404);
        }
        return response()->json($new_user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> true,'message'=> $e->getMessage()], 401);
        }

        $new_user = User::find($id);
        if ($new_user == null) {
            return response()->json(["message"=> "Not found"],404);
        }
        $new_user->update($request->all());
        return response()->json($new_user,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error'=> true,'message'=> $e->getMessage()], 401);
        }
        
        $new_user = User::find($id);
        if ($new_user == null) {
            return response()->json(["message"=> "Not found"],404);
        }
        $new_user->delete();
        return response()->json('', 204);
    }
}
