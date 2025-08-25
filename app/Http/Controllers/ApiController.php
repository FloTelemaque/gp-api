<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController
{

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createToken(Request $request) {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken($request->token_name);

            return response()->api(['token' => $token->plainTextToken]);
        }

        return response()->api([
            'email' => 'The provided credentials do not match our records.',
        ], 401);
    }
}
