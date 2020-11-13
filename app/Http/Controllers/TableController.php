<?php

namespace App\Http\Controllers;

use App\Nova\User;
use App\Table;
use App\User as AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TableController extends Controller
{
    public function hasPassword($table_id){
            $table = Table::find($table_id);
            if($table->password == null)
                 return false;
         else
            return true;
    }
    public function  password($table_id){
        $table = Table::findOrfail($table_id);
        if($table->password == null)
        return redirect()->route('password');
        else
        return response()->json(['Table has password'], 401);
    }
    public function checkPassword(Request $request){
           
            $password = $request->get('password');
            $table_id = $request->get('table_id');
            $table = Table::find($table_id);
            if($table->password ==$password)
            return "done";
            else
            return response()->json(["password worong"],404 );
    }
    public function savePassword(Request $request){
                     //Auth::logout();
                $r = Str::random(10);
                 $table_id = $request->get('table_id');
                 $table = Table::find($table_id);
                 $password = $request->get('password');
                  $table->password = $password;
                
                  $table->save();
                // $user = new \App\User;
                // $user->name = 'table_'.$table_id;
                // $user->email= $r.'@'.$table_id ;
                // $user->password =Hash::make($password); 
                // $user->save()
                return "bam";

    }
            public function tos (Request $request){
                Auth::logout();
                $r = Str::random(10);
                $table_id = $request->get('table_id');
                $password = $request->get('password');
                $user = new \App\User;
                $user->name = 'table_'.$table_id;
                $user->email= $r.'@'.$table_id;
                $user->password =Hash::make($password); 
                $user->save();
                $credentials  = ['email' =>  $r.'@'.$table_id ,'password'=>$password];
                if (auth()->attempt($credentials))
                { //this if validate if the user is on the database line 1
                    return response(['sucess']);
                    //this redirect if user is the db line 2
                }
                else
                return response()->json(["ds"] , 404);
                
            }    
   
}
