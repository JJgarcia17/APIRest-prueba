<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function forgot(ForgotPasswordRequest $request)
    {
        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT 
            ? response([
                'status'=> 200,
                'message' => __($status)
            ],200)
                : response([
                    'status' => 404,
                    'email' => __($status)
                ],404);
    }

    public function reset(ResetPasswordRequest $request)
    {
        $credentials = $request->validated();

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ]);

                $user->save();
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? response([
                        'status' => 200,
                        'message'=> __($status)
                    ],200)
                    : response([
                        'status' =>400,
                        'email' => [__($status)]
                    ],400);
    }
}
