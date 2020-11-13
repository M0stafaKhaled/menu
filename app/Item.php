<?php

namespace App;

use App\Policies\ItemPolicy;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];
    // protected $policies = [
    //     // 'App\Model' => 'App\Policies\ModelPolicy',
    //     ItemPolicy::class => ItemPolicy::class,
    // ];
    public  function category(){

        return $this->belongsTo(Category::class);
    }
}
