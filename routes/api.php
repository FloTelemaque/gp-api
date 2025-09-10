<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [UserController::class, 'me']);

    Route::post('/auth/logout', [AuthController::class, 'logout'])
        ->name('auth.logout');

    Route::apiResources([
        'users' => UserController::class,
    ], ['only' => ['index', 'update']]);

    // Route::group(['middleware' => ['role:admin']], function () {
        Route::apiResources([
            'companies' => CompanyController::class,
        ], ['only' => ['index', 'store', 'update']]);
    // });
});

Route::prefix('auth')->group(function() {
    Route::post('/register', [AuthController::class, 'register'])
        ->name('auth.register');
    Route::post('/tokens/create', [AuthController::class, 'generateToken'])
        ->name('auth.tokens.create');

    // Login Routes
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('auth.login');
});

Route::post('/user', [UserController::class, 'store']);
