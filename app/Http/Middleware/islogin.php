<?php

namespace App\Http\Middleware;

use Closure;

class islogin
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
        $islogin = auth()->user();
        if(!$islogin){
            return redirect('dj');
        }
        return $next($request);
    }
}
