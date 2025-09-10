<?php

namespace App\Exceptions;

use App\Services\ResponseCodeService;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException; // <-- Make sure to import this class
use Spatie\Permission\Exceptions\UnauthorizedException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });


        $this->renderable(function (UnauthorizedException $e, $request) {
            return response()->json([
                'message' => 'You do not have the required authorization.',
            ], ResponseCodeService::HTTP_FORBIDDEN);
        });
    }


    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // For an API-only application, we always want to return a JSON response.
        // This method overrides the default redirection behavior.
        return response()->api(['message' => 'Unauthenticated.'], ResponseCodeService::HTTP_UNAUTHORIZED);
    }
}
