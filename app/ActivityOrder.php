<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityOrder extends Model
{
    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
