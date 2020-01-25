<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function activityOrder() {
        return $this->belongsTo(ActivityOrder::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
