<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }

    public function activityOrder() {
        return $this->belongsTo(ActivityOrder::class);
    }

}
