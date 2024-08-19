<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and has the 'admin' role
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return $next($request);
        }

        // If the user does not have the 'admin' role, redirect or return an error
        // Redirect to the home page as an example
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
