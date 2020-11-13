<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = ['body','destination_id'];

    protected $appends = ['selfMessage'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSelfMessageAttribute()
    {
        return $this->id=== auth()->user()->id;
    }
    
    // public function table()
    // {
    // return $this->belongsTo(Table::class);

    // }

}
