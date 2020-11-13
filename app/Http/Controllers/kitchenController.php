<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class kitchenController extends Controller
{
    public  function  index(){
        $p =OrderItem::query();
        $orderID = Order::where('status',1)->pluck('id');
        $ordersItem= $p->whereIn('order_id',$orderID)->get();
        $orders = Order::where('status',1)->orWhere('status', 3)->get();
        return view('kitchen')->with('orders',$orders)->with('item' ,$ordersItem);
   }
   public function cancel($id){
            $order = Order::find($id);
            $order->status = 2;
            $order->save();
            return $order->status;
    }
    public  function processing ($id){
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        return $order->status;
    }
    public  function finish($id){
        $order = Order::find($id);
        $order->status = 4;
        $order->save();
        return $order->status;


    }

}
