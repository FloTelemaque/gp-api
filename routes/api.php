<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function() {
    Route::post('/register', [AuthController::class, 'register'])->name('users.user_registration');
    Route::post('/tokens/create', [AuthController::class, 'generateToken']);
});

Route::post('/user', [UserController::class, 'store']);


// Route::group(['middleware' => ['role:admin']], function () {
    Route::apiResources([
        'companies' => CompanyController::class,
    ], ['only' => ['store', 'update']]);

// });
