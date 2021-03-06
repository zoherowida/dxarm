<?php

namespace App\Http\Middleware;

use App\Step;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IfStep
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Step::where('userId',Auth::user()->id)->count() > 0){
            return $next($request);
        }
        return abort(403, 'Access denied.');

    }
}
