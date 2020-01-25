<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function Category() {
        return $this->belongsTo(Category::class);
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }
}
