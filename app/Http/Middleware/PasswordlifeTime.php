<?php

namespace App\Http\Middleware;

use App\Table;
use Closure;
use DateTime;
use Illuminate\Support\Facades\Auth;

class PasswordlifeTime
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
        $table_id= request()->id;
        $table = Table::findOrfail($table_id);
        $dt = new DateTime();
        $s = $dt->format('Y-m-d H:i');
        $update = date('Y-m-d H:i',strtotime( $table->updated_at));       
       $datetime1 = strtotime($update);
       $datetime2 = strtotime($s);
       $secs = $datetime2 - $datetime1;// == <seconds between the two times>
       $minutes =(int) $secs / 60 ;
    
            if($minutes>=10)
        {
            $table->password = null;
            $table->save();
            Auth::logout();
            return redirect()->route('password')->with('table_id' , $table_id);
        }            
        return $next($request);
    }
}
