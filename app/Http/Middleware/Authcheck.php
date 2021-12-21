<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authcheck
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
        return $next($request);

        if (!session()->has('Auth::id') && ($request->path() !='login' && $request->path() !='register' )) {

            return redirect('login')->with('message','Cant access the page, Login first');
            // code...
        }

        if (session()->has('Auth::id') && ($request->path()=='login') || ($request->path()=='register')) {

            return back();
            // code...
        }
    }
}
