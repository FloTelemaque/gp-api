<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\Users\UserCollection;
use App\Http\Resources\Users\UserResource;


class UserController extends Controller
{

    /**
     * @param Request $request
     *
     * @return User resource
     */
    public function me(Request $request)
    {
        // new UserResource($request->user()))->response();

        $userResource = new UserResource($request->user());

        return response()->api($userResource);
    }
}
