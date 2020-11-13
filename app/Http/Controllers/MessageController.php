<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Events\MessageCreated;
use Illuminate\Support\Facades\Auth;
use App\User;
class MessageController extends Controller
{
    public function index(){
     $messages = Message::with(['user'])
     ->where('destination_id' ,'=', null)
     ->get();
        return response()->json($messages);
    }
    public function store(Request $request)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body,
            'destination_id'=>null
        ]);
        if($message->destination_id == null ){
        broadcast(new MessageCreated($message))->toOthers();
        return response()->json($message);
        }

    }
    public function single($id , Request $request){
        $user = User::find($id);
         $messages= Message::with(['user'])
        ->where(['user_id'=> auth()->user()->id, 'destination_id'=> $id])
        ->orWhere(function($query) use($user){
            $query->where(['user_id' => $user->id, 'destination_id' => auth()->user()->id]);
        })->get();
    //   $messages=  $q->where('destination_id',$id)->get();
          //    $q->orwhere('destination_id', auth()->user()->id);
        //   $qs = Message::query();
        //   $qs->where('user_id' ,$id);
        //   $send = $qs->where('destination_id',auth()->user()->id )->get() ;
    //   $messages = Message::with(['user'])->where([
    //     'destination_id' => $id,
    //     'user_id'=>auth()->user()->id,
    //   ])->where([
    //     'destination_id' => auth()->user()->id,
    //     // 'user_id'=>$id
    //   ])->get();
       // return response()->json($messages);
        return response()->json($messages);
        // dd($request->user);
    // $messages = Message::user('user_id',$id);
    // dd($messages);
    }
    public function singleStore($id,Request $request)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body,
            'destination_id'=> $request->id
        ]);
        broadcast(new MessageCreated($message))->toOthers();
        return response()->json($message);
    }
}
