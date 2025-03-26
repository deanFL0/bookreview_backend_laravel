<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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
