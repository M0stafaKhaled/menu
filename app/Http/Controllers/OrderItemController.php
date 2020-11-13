<?php

namespace App\Http\Controllers;

use App\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{



    public function remove($orderItemId){
                $orderItem = OrderItem::find($orderItemId);
                $orderItem->delete();
    }
}
