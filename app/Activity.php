<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function compagny() {
        return $this->belongsTo(Compagny::class);
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }

    public function activitiesOrders() {
        return $this->hasMany(ActivityOrder::class);
    }

    public function pictures() {
        return $this->hasMany(Picture::class);
    }
}
