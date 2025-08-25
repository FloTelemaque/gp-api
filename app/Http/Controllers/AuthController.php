<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function register(Request $request) {

        $data = $request->validate([
            'first_name'   => ['required', 'string', 'max:64'],
            'last_name'    => ['required', 'string', 'max:64'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'     => ['required', 'string', 'min:8'],
            'phone_number' => ['nullable', 'min:8', 'max:16'],
        ]);

        $user = User::create([
            ...$data,
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('web')->plainTextToken;

        return response()->api([
            'access_token' => $token,
            'token_name'   => 'web',
            'token_type'   => 'Bearer',
        ]);
    }


    /**
     * @param EmailVerificationRequest $request
     *
     * @return JsonResponse
     */
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return response()->api(['verified' => true]);
    }
}
