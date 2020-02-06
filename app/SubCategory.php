<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }
}
