<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        if (!auth()->check()) {
            return redirect()->route('user.login');
        }

        if (auth()->user()->role !== 'user') {
            auth()->logout();

            return redirect()
                ->route('user.login')
                ->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}