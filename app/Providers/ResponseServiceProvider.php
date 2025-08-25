<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('api', function (mixed $data = null, $status = true, int $httpStatusCode = 200) {

            $requestUid = Str::uuid()->toString();

            return Response::json([
                'query' => [
                    'url'    => request()->url(),
                    'status' => !preg_match('/^5/', $httpStatusCode),
                    'time'   => round((microtime(true) - LARAVEL_START) * 1000),
                    'uid'    => $requestUid,
                ],
                'response' => [
                    'status' => $status, // true or false
                    'data'   => $data ?? [] // if status is true, this will contain the data, otherwise it will contains the error
                ]
            ], $httpStatusCode);
        });
    }
}
