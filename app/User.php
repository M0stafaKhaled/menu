<?php
namespace App;

use App\Enums\UserType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use CastsEnums ;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','destination_id' , 'type'
    ];
    protected $enumCasts = [
        'type'=> UserType::class
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'type'=>'integer',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
