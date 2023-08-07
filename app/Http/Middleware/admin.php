<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (auth()->check()) {
        //     if (auth()->user()->roles->name === 'Admin') {
        //     }
        // }
        if (!auth()->check() || auth()->user()->roles->name !== 'Admin') {
            return abort(403);
        }
        return $next($request);
    }
}