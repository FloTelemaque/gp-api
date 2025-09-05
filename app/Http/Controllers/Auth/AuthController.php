<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Users\StoreRequest;
use App\Models\Company;
use App\Models\User;

use App\Services\ResponseCodeService;

use Dedoc\Scramble\Attributes\Group;

#[Group('Auth')]
class AuthController
{

    #[Group(weight: 1)]
    /**
     * User registration
     *
     * Use this to generate a user/password couple linked to a company.
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     *  @status 200
     *  @response array{
     *      "access_token": "2|t4jzwe2WVU9vDBZP66TIwPVVheSpOqfAQZmBzP9Rdaa5ddd3",
     *      "token_name": "web",
     *      "token_type": "Bearer"
     *  }
     */
    public function register(StoreRequest $request)
    {

        $companyUuid = $request->input('company_uuid');
        $company = Company::whereUuid($companyUuid)->first();

        if (is_null($company))   {
            abort(ResponseCodeService::HTTP_UNAUTHORIZED);
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


    #[Group(weight: 4)]
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
