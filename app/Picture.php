<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function compagny() {
        return $this->belongsTo(Compagny::class);
    }
}
