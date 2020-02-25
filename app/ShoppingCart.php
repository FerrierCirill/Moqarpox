<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}
