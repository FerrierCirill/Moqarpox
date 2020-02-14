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

    public function subcategory(){
        return $this->hasOne(SubCategory::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
