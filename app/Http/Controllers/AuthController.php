<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json(['message'=>'User created successfully'], 201);
    }

    public function token(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message'=>'Unauthorized'], 401);
        }
        $user = Auth::user();

        $token = $request->user()->createToken('access');
        return [
            'access_token'=>$token->plainTextToken,
            'token_type' => 'Bearer'
        ];
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message'=>'Logged out successfully']);
    }
}
