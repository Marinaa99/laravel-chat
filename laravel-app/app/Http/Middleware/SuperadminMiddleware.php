<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperadminMiddleware
{
    public function handle($request, Closure $next)
    {

     if (!auth()->check() || !auth()->user()->is_admin){

         abort(403);
     }
     return $next($request);
    }

}
