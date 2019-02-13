<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $table = 'od_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'enabled', 'expire_at', 'locked', 'roles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'uuid',
    ];


// gerer le remember_token
    public function getRememberToken(){
        return $this->uuid;
    }
    public function setRememberToken($value){
        $this->uuid = $value;
    }
    public function getRememberTokenName(){
        return 'uuid';
    }
}
