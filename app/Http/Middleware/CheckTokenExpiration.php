<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->tokenCan('*')) {
            $tokenCreatedAt = new Carbon($request->user()->currentAccessToken()->created_at);
            $tokenExpiration = config('sanctum.expiration', 60);

            if (Carbon::now()->diffInMinutes($tokenCreatedAt) > $tokenExpiration) {
                return response()->json(['status' => false, 'message' => 'Token telah kedaluwarsa!'], 401);
            }
        }

        return $next($request);
    }
}
