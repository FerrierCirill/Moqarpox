<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
