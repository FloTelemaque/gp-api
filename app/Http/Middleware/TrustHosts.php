<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string|null>
     */
    public function hosts(): array
    {
        return [
            'gp.local',
            'http://localhost:3000',
            env('APP_URL', 'http://localhost:3000'),
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
