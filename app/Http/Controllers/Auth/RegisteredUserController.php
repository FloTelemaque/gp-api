<?php

namespace App\Http\Controllers\Auth;

use Laravel\Fortify\Http\Controllers\RegisteredUserController as FortifyRegisteredUserController;

/**
 * @group Authentication
 */
class RegisteredUserController extends FortifyRegisteredUserController
{
    // Intentionally empty to inherit Fortify's registration logic.
}
