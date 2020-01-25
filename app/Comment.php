<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function activityOrder() {
        return $this->belongsTo(ActivityOrder::class);
    }
}
