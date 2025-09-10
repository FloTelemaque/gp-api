<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\Users\UserCollection;
use App\Http\Resources\Users\UserResource;

use App\Models\User;
use App\Models\Company;

use App\Services\ResponseCodeService;


class UserController extends Controller
{

    /**
     * Current user
     *
     * Get the authenticated user.
     *
     * @param Request $request
     *
     * @return User resource
     */
    public function me(Request $request)
    {

        $userResource = new UserResource($request->user());

        return response()->api($userResource);
    }


    /**
     * Display a listing of the user belonging grids resources.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $criteria = [];
        if ($request->filled('company_uuid')) {
            $company = Company::whereUuid($request->input('company_uuid'));

            if (is_null($company)) {
                abort(ResponseCodeService::HTTP_UNAUTHORIZED);
            }

            $criteria = [
                'company_id' => $company->id,
            ];
        }

        $users = User::where($criteria)->get();

        return response()->api(new UserCollection($users));
    }
}
