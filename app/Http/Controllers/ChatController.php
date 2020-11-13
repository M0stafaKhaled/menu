<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;
class ChatController extends Controller
{
    public function __construct()
    {
     return $this->middleware('auth');
    }
    public function index()
    {
        return view('chat');
    }
    public function single($id){
        $q = Message::query();
       $q->where('user_id' ,auth()->user()->id);
       $messages= $q->where('destination_id', $id)->get();
           //    $q->orwhere('destination_id', auth()->user()->id);
           $qs = Message::query();
           $qs->where('user_id' ,$id);
           $send = $qs->where('destination_id' , auth()->user()->id)->get();
        return view('ChatHome')->with('messages',$messages)->with('send',$send) ;
    }
    public  function  test(){
       dd( Hashids::encode(4815162342));
    }
    // public function message($id)
    // {
    //     $q = Message::where('user_id',Auth::user()->id)->get();
    //     return view('ChatHome')->with('messages',$q);
    // }

}
