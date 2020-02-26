<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const CLIENT = 0;
    const PROVIDER = 1;
    const ADMIN = 1;

    /**
     * The attributes that are mass assignable.
     * On liste ce que l'on veut envoyer à la bdd
     * @var array
     */
    protected $fillable = [
        'first_name','second_name','phone','civility', 'email', 'password','facebook_api_token','provider','provider_id','email_verified_at'
    ];
    /**
     * inverse fillable
     * @var array
     */
//    protected $guarded = ['id'];

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
    ];

    public function companies() {
        return $this->hasMany(Company::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function shoppingCarts() {
        return $this->hasMany(ShoppingCarts::class);
    }
}
