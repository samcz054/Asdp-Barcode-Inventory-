<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $validateUser = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $login = request(['username','password']);

        if(!Auth::attempt($login)){
            return response()->json([
                'error' => 'Login gagal. Harap periksa user'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('AccessToken');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token'  => $tokenResult->accessToken,
            'token_id'      => $token->id,
            'user_id'       => $user->id,
            'username'      => $user->username,
            'name'          => $user->name,
            'email'         => $user->email,
        ],200);

    }

}
