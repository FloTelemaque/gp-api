<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $requestId = Str::uuid()->toString();

        $request->headers->add([
            'request_uid' => $requestId,

            'start_time' => microtime(true),
        ]);

        Log::shareContext([
            'request_id' => $requestId
        ]);

        Log::info('API request', [
            'request_id' => $requestId,

            'from' => $request->getClientIp(),
            'path' => $request->path(),
            'type' => $request->getRealMethod(),
            'body' => $request->all(),
        ]);

        return $next($request);
    }

    /**
     * @param Request  $request
     * @param $response
     */
    public function terminate($request, $response): void
    {
        $requestUid = $request->header('request_uid');

        Log::info('API Response', [
            'request_uid' => $requestUid,

            'status_code' => $response->getStatusCode(),
            'response'    => $response->getOriginalContent(),
        ]);
    }
}
