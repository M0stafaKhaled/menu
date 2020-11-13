<?php

namespace App\Http\Middleware;

use App\Table;
use Closure;

class ChceckMiddleware
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
      
        
       
        return $next($request);
    }
}
