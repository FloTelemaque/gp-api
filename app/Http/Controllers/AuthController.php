<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController
{
    /**
     * User registration
     *
     * Use this to generate a user/password couple linked to a company.
     *
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function register(StoreRequest $request)
    {


        $companyUuid = $request->input('company_uuid');
        $company = Company::whereUuid($companyUuid)->first();

        if (is_null($company))   {
            return response()->json(['error' => 'Invalid request'], 401);
        }

        $data = [
            ...($request->except('company_uuid')),
            'password' => Hash::make($request->input('password')),
            'company_id' => $company->id,
        ];

        $user = User::create($data);

        $token = $user->createToken('web')->plainTextToken;

        return response()->api([
            'access_token' => $token,
            'token_name'   => 'web',
            'token_type'   => 'Bearer',
        ]);
    }


    /**
     * Token generation
     *
     * Generate a new token manually
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function generateToken(Request $request) {
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
