<?php

namespace App\Http\Middleware;

use App\Table;
use Closure;

use Facade\FlareClient\Time\Time;

class PasswordMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next )
    {
        $table_id= request()->id;
        $table = Table::findOrfail($table_id);
        if($table->password == null)
        return redirect()->route('password')->with('table_id' , $table_id);
        if(!($table->password==null))
        return $next($request);
    }
}
