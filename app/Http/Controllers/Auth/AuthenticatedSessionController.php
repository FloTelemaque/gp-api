<?php

namespace App\Http\Controllers\Auth;

use Dedoc\Scramble\Attributes\Group;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyAuthenticatedSessionController;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Http\Request;

/**
 * @group Auth
 */
class AuthenticatedSessionController extends FortifyAuthenticatedSessionController
{
    // This controller is intentionally empty.
    // It inherits all the login logic from Fortify's controller
    // but allows us to add the @group directive for Scramble to parse.

    #[Group('Auth', weight: 2)]
    /**
     * User authentication
     *
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return call_user_func_array([parent::class, 'store'], func_get_args());
    }
}
