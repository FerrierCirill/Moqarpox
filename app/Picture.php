<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
