<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAdminToken
{
    public function handle(Request $request, Closure $next)
    {
        $adminToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoyfQ.Lw_mI3534GtjxzIdK9diH1-sbjfZAdQy8fqfXH0cL0I'; // Token yang Anda berikan

        // Mengambil token dari header Authorization
        $token = $request->bearerToken();

        // Cek apakah token sesuai dengan token yang valid
        if ($token !== $adminToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}

