<?php

namespace App\Http\Middleware;

use App\Models\Apikey;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apikey = $request->header('X-API-KEY');

        if (!$apikey || !Apikey::where('key', $apikey)->exists()) {
            return response()->json(['message' => 'Unautorized'], 401);
        }

        return $next($request);
    }
}
