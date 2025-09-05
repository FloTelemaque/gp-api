<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceJsonResponse
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        $response = $next($request);

        $originalContent = $response->getOriginalContent();

        if ($request->wantsJson()) {
            if (!is_array($originalContent)) {
                // mail('fmanas@gmail.com', 'GP - Error', __CLASS__);
                $content = response()->api(['message' => $originalContent], false, 500);
            } elseif (empty($originalContent['query']) || empty($originalContent['response'])) {
                if (empty($originalContent['message'])) {
                    $originalContent['message'] = $response->statusText();
                }

                $content = response()->api($originalContent, !!preg_match('/^2/', $response->status()), $response->status());
            }

            return $content ?? $response;
        }

        return $response;
    }
}
