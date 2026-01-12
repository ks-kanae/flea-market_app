<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfProfileIncomplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $exclude = [
        route('profile.edit'),
        route('login'),
        route('logout'),
        ];

        if (auth()->check()
        && !auth()->user()->profile_completed
        && !in_array($request->url(), $exclude)) {
        return redirect('mypage/profile');
        }

        return $next($request);
    }
}
