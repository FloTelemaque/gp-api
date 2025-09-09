<?php

namespace App\Http\Controllers;

use App\Http\Requests\Companies\StoreRequest;
use App\Http\Resources\Companies\CompanyResource;
use App\Models\Company;

use Illuminate\Http\Request;

use App\Enums\CompanyStatus;

use Exception;
use Throwable;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::whereIn('status', [CompanyStatus::CREATED, CompanyStatus::ACTIVE])->orderBy('id', 'ASC')->get();

        return response()->api($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {
            $company = Company::create($request->validated());

        } catch (Exception $e) {
            return response()->api(['error' => $e->getMessage()], false, 500);
        } catch (Throwable $e) {
            return response()->api(['error' => 'Company creation failed due to server configuration'], false, 500);
        }

        return response()->api(new CompanyResource($company));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
