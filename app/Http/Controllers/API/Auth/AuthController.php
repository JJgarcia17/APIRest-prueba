<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;



class AuthController extends Controller
{
    

    public function register(RegisterRequest $request)
    {
        $request->validated();
        
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'S_nombres'=> isset($request->S_nombres) ?isset($request->S_nombres) : Null,
            'S_apellidos'=> isset($request->S_apellidos) ?isset($request->S_apellidos) : Null,
            'S_apellidos'=> $request->s_activo,
            'verifed' => $request->verifed,
            'verification_token'=> isset($request->verification_token) ?isset($request->verification_token) : Null,
        ];

        $user = User::create($data);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'status' => 201,
            'message' => 'User created successfully',
            'data' => $user,
            'access_token' => $accessToken,
        ],201);
    }

    public function login(LoginRequest $request){
        
        $request->validated();

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(!auth()->attempt($data))
        {
            return response([
                'status' => 401,
                'message'=> 'Invalid Credentials',
            ],401);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response([
            'status' => 200,
            'message' => 'successfully logged in',
            'access_token' => $accessToken,
        ],200);

    }

}
