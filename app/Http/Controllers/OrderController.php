<?php

namespace App\Http\Controllers;
use App\Item;
use App\Order;
use App\OrderItem;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\UserSystemInfoHelper;
use App\Http\Resources\Table as ResourcesTable;
use DateTime;
class OrderController extends Controller
{

    public function check($id){
        $table = Table::findOrfail((int)$id);
        if(!$table->password == null){
         return true;
        }
    }
    public  function  index(Request $reques ,$id){
       
        $table = Table::findOrfail((int)$id);
            // if($table->password == null)
            // {
            //     // return redirect()->route('go')->with('table_id' , $id);
            //          return redirect()->route('password')->with('table_id' , $id);
            // }
        $r =Str::random(12);
        $order= Order::create(["token"=>$r ,"table_id"=>(int)$id]);
        return  response()->json(['token' => $order->token,"table"=>$order->table_id ,]);
    }
    public  function createOrderItem (Request $request){
        $orderId =  Order::where("token" , $request->get('token'))->pluck('id')->first();
              $p = OrderItem::query();
                $p->where('order_id' ,$orderId);
                $v = $p->where('item_id' , $request->get('item_id'));
                   if($v->first()){
                   $id= $v->value('id');
                  $order=  OrderItem::find($id);
                       $order->quantity =$order->quantity +1;
                       $order->save();
                  return  response()->json([$order] , 200);
                   }
                   else {
                      $order=  OrderItem::create(["order_id" => $orderId,  "quantity" => 1 , "unit_price" =>$request->get('unit_price'),'item_id'=>$request->get('item_id') ]);
                       return  response()->json([$order] , 200);
                   } }
                public  function order(Request $request , $token){
                    $orderId= Order::where('token',$token )->value('id');
                    $item= OrderItem::where('order_id',$orderId)->get();
                       $subTotal =0;
                       foreach ($item as $ite){
                           $itemPrice = $ite->unit_price;
                           $itemQ = $ite->quantity;
                           $subTotal += $itemPrice * $itemQ ;
                       }
                         $order =Order::find($orderId);
                       $order->sub_total = $subTotal;
                       $order->total = $order->service + $order->sub_total + $order->tax;
                       $order->save();
                       return view('Cart')->with("items",$item )->with("order" ,$order)->with('id' , $order->table->id);
                }
                public  function submitOrder($id){
                        $order = Order::find($id);
                        if($order->OrderItem->count()==0)
                        {
                            return response()->json(['message'=>"please select items "] , 404);
                        }
                        if($order->status->value ==1) {
                        return response()->json(["message" => "order is already submitted"], 402);
                        }
                        else {
                            $order->status = 1;
                            $order->save();
                            event(new \App\Http\Events\FormSubmited());
                            return response()->json(["message" => "success"], 200);
                        }
                }
                public  function get_order($token){
                        $orderId = Order::where('token' , $token)->value('id');
                        $order = Order::find($orderId);
                        return response()->json([$order->orderItem] );
                }
                public function getOrderItem($token){
                    $orderId = Order::where('token' , $token)->value('id');
                    $order = OrderItem::where('order_id',$orderId)->get();
                    return $order;
                }
                public  function updateQuantity($token){
//                    $orderId = Order::where('token' , $token)->value('id');
                    $order = OrderItem::find($token);
                    $order->quantity= $order->quantity+1;
                    $order->save();
                    return $order->quantity;
                }
                public  function  decreaseQuantity($token){
//                    $orderId = Order::where('token' , $token)->value('id');
                    $order = OrderItem::find($token);
                    if($order->quantity >= 1){
                        $order->quantity= $order->quantity-1;
                        $order->save();
                    }
                    return  $order->quantity;
                }
                public function myOrder($token){
                    
                        $order_table = Order::where('token', $token)->pluck('table_id')->first();
                        $orders = Order::where('table_id' , $order_table)->get();
                        $orders_id = Order::where('table_id' , $order_table)->where('status',1)->orWhere('status',3)->pluck('id');
                        $items =  OrderItem::with('order')->whereIn('order_id', $orders_id)->get();
                         return view('MyOrder')->with('order',$orders)->with('items', $items)->with('table_id' , $order_table)->with('id', $order_table);
                }
                public function TableHasOrder($table_id){
                         $order = Order::query();
                        $count =  $order->where('table_id',$table_id)->where('status',1)->orWhere('status',3)->pluck('id')->count();
                        if(!$count==0)
                            return true;
                }
                public function time(Request $request){
                    $dt = new DateTime(); 
                    $s = $dt->format('Y-m-d H:i');
                    $order_id =$request->get('order_id');
                    $time = $request->get('time');
                    $order = Order::find($order_id);
                    $order->estimate_time =date('Y-m-d H:i', strtotime($s. ' +' .$time .'minute' . '2 hour' . '20 seconds')) ;
                    $order->save();
                    event(new \App\Http\Events\KitTime($order->estimate_time));
                    return  response()->json([$order->estimate_time] , 200) ;
                }

                public function tes($token){

                            //return response()->json("mostafa",200);
                        $table =Order::query();
                        $table->where('token' , $token)->get();
                       $orderTime =$table->pluck('created_at')->first();
                       $dt = new DateTime();
                       $s = $dt->format('Y-m-d H:i');
                       $timestamp=strtotime($orderTime);
                       $update = date('Y-m-d H:i:s',$timestamp);       
                      $datetime1 = strtotime($update);
                      $datetime2 = strtotime($s);
                      $secs = $datetime2-$datetime1;
                      $minutes =(int) $secs/ 60;
                    return response()->json($orderTime,200);
                    //  if($minutes>=10){
                          
                    //     return response()->json($orderTime);
                    //   }
                    //   else{
                          
                    //       return $orderTime;
                         
                    //   }
                    



                }
}
