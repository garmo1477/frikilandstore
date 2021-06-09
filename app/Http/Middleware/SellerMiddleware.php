<?php

namespace App\Http\Middleware;

use Closure;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = redirect(route('welcome'));
        if(!auth()->check() || !auth()->user()->isSeller()){
            return $route;
        } 
        return $next($request);
    }
}
