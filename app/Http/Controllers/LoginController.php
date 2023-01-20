<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request){

        $user = $request->user('user');

        if($user != null) {
            return response([
                'only guest user can submit a register form'
            ], 401);
        }

        $fields = $request->validate(User::$rules);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('apitoken')->accessToken;

        $response = [
            'user successful registered' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');

        if (!Auth::guard('web')->attempt($credentials)){
            return response([
                'message' => 'Bad user credentials'
            ], 401);
        }

        $accessToken = Auth::user()->createToken('apitoken')->accessToken;

        return response([
           'user' => Auth::user(),
            'access_token' => $accessToken
        ], 201);
    }

    public function logout(){

        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logged out'
        ], 200);
    }
}
