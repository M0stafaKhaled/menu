<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    protected  $guarded =[];
    public  function  category(){
        return $this->belongsTo(Category::class);
    }
    public  function  order(){
        return $this->belongsTo(Order::class);
    }
    public  function item(){
        return $this->belongsTo(Item::class);
    }

}
