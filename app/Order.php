<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function activityOrder() {
        return $this->hasMany(ActivityOrder::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
