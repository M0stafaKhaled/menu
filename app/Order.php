<?php

namespace App;

use App\Enums\OrderStatus;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use CastsEnums ;
    use SoftDeletes;
    protected $enumCasts = [
        'status' => OrderStatus::class,
    ];
    public $casts = [
        'status' => 'integer',
    ];
protected  $fillable = ['token' , 'table_id','subTotal' , 'total' , 'status'];


public  function table(){
        return $this->belongsTo(Table::class);
}
public  function orderItem(){
    return $this->hasMany(OrderItem::class);
}

}
